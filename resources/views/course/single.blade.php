@extends('layouts.app')

@section('title', $course->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/storage/images/{{ $course->cover_url }}" class="img-fluid" alt="Course Image">
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title mt-3">{{ $course->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $course->user->name }} &bull; {{ $course->category }}</h6>
                            <p class="card-text">{{ $course->description }}</p>
                            @if(Auth::user()->account_type === 'Instructor')
                                COURSE CODE: <b>{{ $course->code }}</b>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-white border-0 shadow">
            <div class="list-group list-group-flush" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#android" role="tab"><i class="fas fa-book fa-lg align-middle"></i><span class="align-middle"> Materials</span></a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#laravel" role="tab"><i class="fas fa-folder fa-lg align-middle"></i><span class="align-middle"> Updates</span></a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#php" role="tab"><i class="fas fa-question-circle fa-lg align-middle"></i><span class="align-middle"> Quizzes</span></a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#java" role="tab"><i class="fas fa-user-edit fa-lg align-middle"></i><span class="align-middle"> Scores</span></a>
            </div>
            </div>
        </div>
        <div class="col-md-9 mb-4">
            <h4>Course Contents</h4>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    @if(Auth::user()->account_type === 'Instructor')
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#contentModal">Add a Section</button>
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
            <h4 class="mt-4">Attachments</h4>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    No files have been uploaded to this course...
                </div>
            </div>
        </div>
    </div>
</div>

<!-- For the modal content -->
<div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="contentModalLabel" aria-hiddent="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Content Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 my-2 text-center">
                            <a href="{{ route('curricula.create', ['course_id' => $course->id]) }}" class="card-link">
                                <div class="card bg-primary border-0 shadow" style="height:100px;">
                                    <h5 class="text-white my-auto">TEXT</h5>
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-4 my-2 text-center">
                            <a href="" class="card-link">
                                <div class="card bg-primary border-0 shadow" style="height:100px;">
                                    <h5 class="text-white my-auto">FILE</h5>
                                </div>
                            </a>  
                        </div>
                        <div class="col-md-4 my-2 text-center">
                            <a href="" class="card-link">
                                <div class="card bg-primary border-0 shadow" style="height:100px;">
                                    <h5 class="text-white my-auto">QUIZ</h5>
                                </div>
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                             
</div>
@endsection