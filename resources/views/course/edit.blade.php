@extends('layouts.app')

@section('title', $course->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                </div>
            @endif
            @if(session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
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
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $course->name }}</h4>
                        <h6 class="text-muted">{{ $course->status }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-4">
           <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update', [$course]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Course Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Course Name</label>
                                    <textarea id="editor" class="form-control" name="description" required>{{ $course->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">Course Category</label>
                                    <select class="custom-select" name="category" required>
                                        @foreach($categories as $category)         
                                            <option value="{{ $category->name }}" {{ ($category->name == $course->category) ? 'selected' : ''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="courseImage">Course Image</label>
                                    <img src="/storage/images/{{ $course->cover_url }}" class="img-fluid mb-3" alt="Course Image">
                                    <label for="photo">Change Cover Photo</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                    <small class="form-text text-muted">Recommended image size: 1280x720. Must be on .jpeg, .jpg, or .png format.</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="courseUpdate">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <h5>Settings</h5>
                    @if($course->status === 'PUBLISHED')
                        <a class="btn btn-outline-danger btn-block" href="{{ route('courses.unpublish', [$course]) }}"
                            onclick="event.preventDefault();
                            document.getElementById('unpublish').submit();">
                            {{ __('UNPUBLISH') }}
                        </a>
                        <form id="unpublish" action="{{ route('courses.unpublish', [$course]) }}" method="POST">
                            @csrf
                            @method('PUT')
                        </form>
                    @else
                        <a class="btn btn-outline-success btn-block" href="{{ route('courses.publish', [$course]) }}"
                            onclick="event.preventDefault();
                            document.getElementById('publish').submit();">
                            {{ __('PUBLISH') }}
                        </a>
                        <form id="publish" action="{{ route('courses.publish', [$course]) }}" method="POST">
                            @csrf
                            @method('PUT')
                        </form>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection