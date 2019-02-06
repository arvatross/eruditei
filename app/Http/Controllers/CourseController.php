<?php

namespace App\Http\Controllers;

use App\Course;
use App\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('user_id', Auth::id())->get();
        return view('course.all', compact('courses'));
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
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required',
            'category' => 'required',
            // nullable == optional
            // apache max upload 2mb
            'photo' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
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
        
        $course = new Course();
        $course->cover_url = $fileNameToStore;
        $course->name = title_case($request->name);
        $course->description = $request->description;
        $course->category = $request->category;
        $course->slug = str_slug($request->name, '-');
        $course->code = str_random(7);
        $course->user_id = Auth::id();
        $course->save();

        return redirect()->route('courses.show', [$course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $curricula = Curriculum::where('course_id', $course->id)->get();
        return view('course.single', compact('course', 'curricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
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
        //
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
}
