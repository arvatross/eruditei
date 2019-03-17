<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class NoteController extends Controller
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
        return view('notes.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
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
            'title' => 'required',
            'content' => 'required',
            'photo' => 'image|nullable|max:1999|mimes:jpeg,jpg,png',
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

            $note = new Note;
            $note->title = title_case($request->title);
            $note->content = $request->content;
            $note->cover_url = $fileNameToStore;
            $note->user_id = Auth::id();
            $note->save();

            return redirect()->route('notes.show', [$note])->with('success', 'Note created successfully!');

        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
