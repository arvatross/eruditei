<?php

namespace App\Http\Controllers;

use App\Curriculum;
use App\Course;
use Illuminate\Http\Request;
use Validator;

class CurriculumController extends Controller
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
        $curriculum = Curriculum::all();
        return view('course.single', compact('curriculum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        $course = Course::find($course_id);
        return view('curricula.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);

        } else {
            $curriculum = new Curriculum();
            $curriculum->title = $request->name;
            $curriculum->content = $request->description;
            $curriculum->course_id = $request->cid;
            $curriculum->save();

            return redirect()->back()->with('success', 'Added a lesson to course successfully!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculum $curriculum)
    {
        return view('curricula.show', compact('curriculum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculum $curriculum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        $curr = Curriculum::find($curriculum->id);
        $curr->title = $request->name;
        $curr->content = $request->description;
        $curr->save();

        return redirect()->route('courses.show', [$request->slug])->with('updated', 'Lesson updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculum $curriculum)
    {
        Curriculum::find($curriculum->id)->delete();
        return redirect()->back()->with('danger', 'Lesson deleted!');
    }
}
