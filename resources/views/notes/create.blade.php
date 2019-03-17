@extends('layouts.app')

@section('title', 'Create a Course')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Create Notes</h3>
            <div class="card bg-white shadow-sm border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Note title" required>
                        </div>
                        <div class="form-group">
                            <textarea id="editor" name="content" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Cover Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                            <small class="form-text text-muted">Recommended image size: 1280x720. Must be on .jpeg, .jpg, or .png format.</small>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection