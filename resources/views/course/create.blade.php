@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('courses.store') }}" class="container" enctype="multipart/form-data">
    @csrf
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
                        <input type="text" class="form-control" name="name" placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="category">
                            <option>Category</option>
                            <option>Software Development</option>
                            <option>Business</option>
                            <option>Photography</option>
                            <option>Literature</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Course Description" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover Photo</label>
                        <input type="file" class="form-control-file" id="photo" name="photo">
                        <small class="form-text text-muted">Recommended image size: 1280x720 or High Definition Photo</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">You can add sections, quizzes, and materials after creating the course.</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Publish</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection