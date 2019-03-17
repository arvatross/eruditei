<?php

namespace App\Http\Controllers;

use App\User;
use App\Update;
use App\Resource;
use App\Quiz;
use App\Course;
use App\Curriculum;
use App\Exam;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        return view('course.all', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'image|nullable|max:99999|mimes:jpeg,jpg,png',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        
        } else {

            if($request->hasFile('photo')) {
                // Get filename with extension            
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
               // Get just ext
                $extension = $request->file('photo')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
              // Upload Image
                $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);
            } else {
                $fileNameToStore = 'default-course-banner.png';
            }

            $course = new Course;
            $course->cover_url = $fileNameToStore;
            $course->name = title_case($request->name);
            $course->description = $request->description;
            $course->category = $request->category;
            $course->slug = str_slug($request->name, '-');
            $course->code = str_random(7);
            $course->status = 'PUBLISHED';
            $course->save();

            $user = User::find(Auth::id());
            $user->course()->attach($course);

            return redirect()->route('courses.show', [$course]);

        }            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $user = User::find(Auth::id());
        if($course->status == 'PUBLISHED') {
            return view('course.single', compact('course'));
        } elseif ($user->role_id == 2) {
            return view('course.single', compact('course'));
        } 
        else {
            return abort(404);
        }
    }

    public function join(Request $request) {
        if(Course::where('code', $request->code)->first()) {
            $user = User::find(Auth::id());
            $course = Course::where('code', $request->code)->first();
            $user->course()->attach($course);
            return redirect()->back()->with('success', "You've joined the course succesfully!");
        } else {
            return redirect()->back()->with('failed', "Incorrect code or the course doesn't exist!");
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('course.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'image|nullable|max:9999|mimes:jpeg,jpg,png',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        
        } else {

            if($request->hasFile('photo')) {
                // Get filename with extension            
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
               // Get just ext
                $extension = $request->file('photo')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
              // Upload Image
                $path = $request->file('photo')->storeAs('public/images', $fileNameToStore);
            } else {
                $fileNameToStore = $course->cover_url;
            }
            $curr = Course::find($course->id)->first();
            $curr->name = $request->name;
            $curr->description = $request->description;
            $curr->cover_url = $fileNameToStore;
            $curr->category = $request->category;
            $curr->slug = str_slug($request->name, '-');
            $curr->save();

            return redirect()->route('courses.show', [$course])->with('success', 'Course Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function unpublish(Course $course) {
        $course = Course::find($course->id)->first();
        $course->status = 'UNPUBLISHED';
        $course->save();

        return redirect()->back()->with('danger', 'Course has been unpublished!');
    }

    public function publish(Course $course) {
        $course = Course::find($course->id)->first();
        $course->status = 'PUBLISHED';
        $course->save();

        return redirect()->back()->with('success', 'Course has been published!');
    }

    public function board(Course $course) {
        return view('course.single', compact('course'));
    }
}
