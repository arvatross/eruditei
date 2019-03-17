@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('courses.store') }}" class="container" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            @foreach($errors->all as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Create Course</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">Course Details</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Course Name" required>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="category" required>
                            <option>Category</option>
                            <option>Software Development</option>
                            <option>Business</option>
                            <option>Photography</option>
                            <option>Literature</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Course Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover Photo</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        <small class="form-text text-muted">Recommended image size: 1280x720. Must be on .jpeg, .jpg, or .png format.</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <h5>Guidelines</h5>
                    <ul class="no">
                        <li>Name must be understable.</li>
                        <li>The category must match the lesson's contents.</li>
                        <li>A detailed yet concise summary of the course description.</li>
                        <li>Photo must be of highest quality.</li>
                    </ul>
                </div>
            </div>
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p>You can add sections, quizzes, and materials after creating the course.</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection