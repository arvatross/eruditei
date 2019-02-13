@extends('layouts.app')

@section('title', $courses->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/storage/images/{{ $courses->cover_url }}" class="img-fluid" alt="Course Image">
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title mt-3">{{ $courses->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $courses->category }}</h6>
                            <p class="card-text">{{ $courses->description }}</p>
                            @if(Auth::user()->account_type === 'Instructor')
                                COURSE CODE: <b>{{ $courses->code }}</b>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <h4 class="pl-2">Announcements</h4>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    No announcements recently published...
                </div>
            </div>
            <h4 class="mt-4 pl-2">Attachments</h4>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    No files have been uploaded to this course...
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-4">
            <h4 class="pl-2">Lessons</h4>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    @if(Auth::user()->account_type === 'Instructor')
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#contentModal">Add a Content</button>
                    @endif
                    <div class="courseContent" id="courseContent">
                        @foreach($curricula as $curriculum)
                            <div class="card my-2">
                                <h5 class="card-header text-primary" style="cursor:pointer;" id="heading{{ $curriculum->id }}" data-toggle="collapse" data-target="#collapsibleItem{{ $curriculum->id }}" aria-expanded="true" aria-controls="collapse{{ $curriculum->id }}">{{ $curriculum->title }}</h5>
                                <div id="collapsibleItem{{ $curriculum->id }}" class="collapse" aria-labelledby="heading{{ $curriculum->id }}" data-parent="#courseContent">
                                    <div class="card-body">
                                        {!! $curriculum->content !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <h4 class="mt-4 pl-2">Quizzes</h4>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    This course has no available quizzes...
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
@if(Auth::user()->account_type === 'Instructor')
    <div class="zoom">
        <a class="text-white zoom-fab zoom-btn-large" id="zoomBtn"><i class="fas fa-plus fa-lg"></i></a>
        <ul class="zoom-menu">
            <li><a href="{{ route('curricula.create', ['course_id' => $courses->id]) }}" class="text-white zoom-fab zoom-btn-sm zoom-btn-person scale-transition scale-out" data-toggle="tooltip" title="Text/Lesson"><i class="fas fa-font"></i></a></li>
            <li><a class="zoom-fab zoom-btn-sm zoom-btn-doc scale-transition scale-out" data-toggle="tooltip" title="File/Attachment"><i class="fas fa-paperclip"></i></a></li>
            <li><a class="text-white zoom-fab zoom-btn-sm zoom-btn-tangram scale-transition scale-out" data-toggle="tooltip" title="Quizzes"><i class="fas fa-question-circle"></i></a></li>
            <li><a class="text-white zoom-fab zoom-btn-sm zoom-btn-report scale-transition scale-out" data-toggle="tooltip" title="Announcements"><i class="fas fa-bullhorn"></i></a></li>
        </ul>
    </div>
@endif
@endsection
