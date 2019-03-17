@extends('layouts.app')

@section('title', $curriculum->title)

@section('content')
<form method="POST" action="{{ route('curricula.update', [$curriculum->id]) }}" class="container">
    @csrf
    @method('PUT')
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
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">Lesson Details</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Content Name" value="{{ $curriculum->title }}">
                        <input type="hidden" value="{{ $curriculum->course->slug }}" name="slug">
                    </div>
                    <div class="form-group">
                        <textarea id="editor" name="description" placeholder="Content Description">{!! $curriculum->content !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <p>You are currently editing a course content of your course entitled <strong>{{ $curriculum->course->name }}</strong>.</p>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Publish</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection