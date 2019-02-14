<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Course;
use Illuminate\Http\Request;

class ResourceController extends Controller
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
        return view('resources.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        $course = Course::find($course_id);
        return view('resources.create', compact('course'));
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
            'file' => 'required|max:10000|mimes:doc,docx,pdf,jpeg,jpg,png,gif,xls,xlsx,ppt,pptx'
        ]);
        // Get filename with extension            
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        // Get just ext
        $extension = $request->file('file')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        // Upload Image
        $path = $request->file('file')->storeAs('public/uploads', $fileNameToStore);

        $resource = new Resource;
        $resource->file_name = $filename;
        $resource->file_url = $filenameWithExt;
        $resource->file_type = $extension;
        $resource->file_size = $file->getSize();
        $resource->user_id = Auth::id();
        $resource->course_id = $request->rid;
        $resource->save();
	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
