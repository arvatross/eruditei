<?php

namespace App\Http\Controllers;

use App\Resource;
use App\Course;
use App\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
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
        $resources = Resource::all();
        return view('resources.index', compact('resources'));
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
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $name = $file->getClientOriginalName();
        $size = $file->getSize();
        $fileNameToStore = time().'.'.$extension;
        $path = $file->storeAs('public/uploads', $fileNameToStore);
        
        if($path) {
            $resource = new Resource;
            $resource->file_name = $name;
            $resource->file_url = $fileNameToStore;
            $resource->file_type = $extension;
            $resource->file_size = $size;
            $resource->user_id = Auth::id();
            $resource->course_id = $request->rid;
            $resource->save();

            return response()->json(['success' => 200]);
        } else {
            return response()->json(['error' => 400]);
        }
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
        Resource::find($resource->id)->delete();

        return redirect()->back()->with('success', 'Removed file successfully');

    }
}
