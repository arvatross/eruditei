@extends('layouts.app')

@section('title', 'Edit Profile')

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
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <h3>Edit Profile</h3>
                    <hr/>
                    <form method="POST" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="courseImage">Profile Photo</label>
                                    <img src="/storage/uploads/{{ $user->img_filename }}" class="img-fluid mb-3" alt="Course Image">
                                    <label for="photo">Change Profile Photo</label>
                                    <input type="file" class="form-control-file" name="file">
                                    <small class="form-text text-muted">Recommended image size: 300x300 up. Must be on .jpeg, .jpg, or .png format.</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" name="website" value="{{ $user->website }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea id="editor" class="form-control" name="about" required>{{ $user->about }}</textarea>
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
    </div>
</div>
@endsection
