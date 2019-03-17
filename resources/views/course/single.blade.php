@extends('layouts.app')

@section('title', $course->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                </div>
            @endif
            @if(session()->has('updated'))
                <div class="alert alert-success">
                    {{ session()->get('updated') }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/storage/images/{{ $course->cover_url }}" class="img-fluid" alt="Course Image">
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title mt-3">{{ $course->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course->category }}</h6>
                            <p class="card-text">{!! $course->description !!}</p>
                            @if(Auth::user()->role_id == '2')
                                COURSE CODE: <b>{{ $course->code }}</b>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            @if(Auth::user()->role_id == '2')
            <a href="{{ route('courses.edit', [$course]) }}" class="btn btn-primary float-right"><i class="fas fa-cog"></i> Edit Course</a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#materials" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-folder"></i> Content</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-classroom" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-chalkboard"></i> Updates</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-users"></i> People</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="materials" role="tabpanel" aria-labelledby="v-pills-home-tab">
                         
                        <div class="d-flex justify-content-between">
                        <h3 class="mt-1">Course Content</h3>   
                        <div class="d-flex justify-content-end">
                                @if(Auth::user()->role_id == '2')
                                <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#uploadModal">
                                    <i class="fas fa-upload"></i> Upload File
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#articleModal">
                                    <i class="fas fa-newspaper"></i> Add Lesson
                                </button>
                                @endif
                            </div>
                        </div>
                            <hr/>
                            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">File Upload</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('resources.store') }}" class="dropzone mb-4" id="dropzone" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="rid" value="{{ $course->id }}">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" id="closeUploadModal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Lesson</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('curricula.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="cid" value="{{ $course->id }}">
                                                    <input type="text" class="form-control" name="name" placeholder="Lesson Title - eg. Lesson 1 - Introduction">
                                                </div>
                                                <div class="form-group">
                                                    <textarea id="editor" name="description" placeholder="Content Description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary float-right" value="Create Lesson">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5><b>Lessons</b></h5>
                            <div class="lessons" id="accordion">
                                @forelse($course->curriculum as $curriculum)
                                <div class="card mb-2">
                                    <div class="card-header" id="{{ $curriculum->id }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $curriculum->id }}" aria-expanded="true" aria-controls="collapseOne">
                                                {{ $curriculum->title }}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $curriculum->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! $curriculum->content !!}
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('curricula.show', $curriculum->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                                <a href="{{ route('curricula.destroy', $curriculum->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    No lessons found...
                                @endforelse
                            </div>
                            <h5 class="mt-3"><b>Downloadable Files</b></h5>
                            <div class="list-group" id="uploaded">
                                @forelse($course->resource as $resource)
                                    <a href="/download/{{ $resource->file_url }}" class="list-group-item list-group-item-action" id="uploadedItem">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $resource->file_name }}</h6>
                                            <small>{{ FormatBytes::formatBytes($resource->file_size) }}</small>
                                        </div>
                                        <small>Uploaded {{ $resource->created_at->diffForHumans() }}</small>
                                        <div class="d-inline">
                                        <a href="{{ route('document.preview', $resource->id) }}" class="text-primary"><small>Preview</small></a>
                                        @if(Auth::user()->role_id == '2')
                                            <a class="ml-auto text-danger" href="{{ route('resources.destroy', [$resource->id])}}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('resource-delete').submit();">
                                                <small>{{ __('Remove') }}</small>
                                            </a>
                                            <form id="resource-delete" action="{{ route('resources.destroy', [$resource->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                        </div>
                                    </a>
                                @empty
                                    No files are available for download.
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-classroom" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="d-flex justify-content-between">
                                <h3>Updates</h3>
                                @if(Auth::user()->role_id == 2)
                                <a href="{{ route('updates.create', $course->id) }}" class="btn btn-primary mr-2">Create Update</a>
                                @endif
                            </div>
                            <hr/>
                            <div class="blackboard" id="blackboard">
                                @forelse($course->announcement as $announcement)
                                    <div class="card my-2">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5>{{ $announcement->title }}</h5>
                                            <small>Posted {{ $announcement->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div class="card-body">
                                            {!! $announcement->content !!}
                                        </div>    
                                    </div>
                                @empty
                                    No updates has been published so far...
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <h3>People</h3>
                            <hr/>
                            @foreach($course->user as $user)
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h5>{{ $user->name }}</h5>
                                        <p>{{ $user->role->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
