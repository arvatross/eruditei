@extends('layouts.app')

@section('title', 'Create Content')

@section('content')
<form method="POST" action="{{ route('curricula.store') }}" class="container">
    @csrf
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Create Content</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">Content Details</p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="cid" value="{{ $course->id }}">
                        <input type="text" class="form-control" name="name" placeholder="Content Name">
                    </div>
                    <div class="form-group">
                        <textarea id="editor" name="description" placeholder="Content Description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <p>You are creating a content for your course entitled <b>{{ $course->name }}</b></p>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Publish</button>
                </div>
            </div>

            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <p class="card-text">Done creating course contents? You can go back to the course with a click of a button</p>
                    <a href="{{ route('courses.show', ['course' => $course->slug]) }}" class="btn btn-secondary btn-block mt-4">Return</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection