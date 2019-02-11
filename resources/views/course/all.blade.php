@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
            </div>
            @endif
            @if(session()->has('failed'))
            <div class="alert alert-danger">
                {{ session()->get('failed') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
            </div>
            @endif
            <h3>Courses</h3>
        </div>
    </div>
    <div class="row">
       <div class="col-md-4 mb-3">
            <form class="form-block">
                <input class="form-control border-0 shadow-sm" type="search" placeholder="Search my courses" aria-label="Search">
            </form>
       </div>
       <div class="col-md-4 mb-3">
            <select class="custom-select border-0 shadow-sm">
                <option selected>Sort by</option>
                <option value="1">Recently Accessed</option>
                <option value="2">Recently Joined</option>
            </select>
       </div>
       <div class="col-md-4 mb-3">
            @if(Auth::user()->account_type === 'Student')
            <button class="btn btn-block btn-success shadow-sm" data-toggle="modal" data-target="#courseModal">Join a course</button>
            <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Join a course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="background-color: #EBF5FB;">
                            <form method="POST" action="{{ route('courses.join')}}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 shadow-sm" name="code" placeholder="Enter course code">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary shadow-sm">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <small class="help">Enter code correctly</small>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <a href="{{ route('courses.create') }}" class="btn btn-block btn-success">Create a course</a>
            @endif
       </div>
    </div>
    <div class="row mt-3">
        @foreach($user->course as $course)
            <div class="col-md-4">
                <a href="/course/{{ $course->slug }}" class="text-secondary card-link">
                    <div class="card border-0 shadow mb-4">
                        <img class="card-img-top" src="/storage/images/{{ $course->cover_url }}" alt="{{ $course->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection