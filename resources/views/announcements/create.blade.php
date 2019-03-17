@extends('layouts.app')

@section('title', 'Create an Announcement')

@section('content')
<form method="POST" action="{{ route('updates.store') }}" class="container">
    @csrf
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Create Announcement</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">Announcement Details</p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Announcement Title">
                        <input type="hidden" name="cid" value="{{ $course->id }}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control editor" id="editor" name="description" placeholder="Announcement Description" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <p class="lead">Be reminded that users will see the latest announcement on the course page.</p>
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