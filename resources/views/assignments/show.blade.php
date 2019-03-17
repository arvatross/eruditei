@extends('layouts.app')

@section('title', 'Assignments')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
            <div class="card bg-white border-0 shadow mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $assignment->title }}</h4>
                        <h6 class="text-muted">Posted {{ $assignment->created_at->diffForHumans() }}</h6>
                    </div>
                    <p>{{ $assignment->content }}</p>
                    <p>By {{ $assignment->user->name }}</p>
                </div>
            </div>
            @if($assignment->submission->count() <= 0)
                <div class="card bg-white border-0 shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('submissions.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea id="editor" name="content"></textarea>
                                <input type="hidden" name="aid" value="{{ $assignment->id }}"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card bg-white border-0 shadow mb-4">
                    <div class="card-body">
                        <h4>Submission</h4>

                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection