@extends('layouts.app')

@section('title', $note->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
                </div>
            @endif
            @if(session()->has('updated'))
                <div class="alert alert-success">
                    {{ session()->get('updated') }}
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
            <div class="card bg-white mb-4 border-0 shadow">
                <div class="card-body">
                    <img src="/storage/images/{{ $note->cover_url }}" class="img-fluid" alt="Course Image">
                    <hr/>
                    <h3>{{ $note->title }}</h3>
                    {!! $note->content !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <h4>Actions</h4>
                    <hr/>
                    <button class="btn btn-outline-primary btn-block">Edit</button>
                    <button class="btn btn-outline-danger btn-block">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection