@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Dashboard</h3>
        </div>
    </div>
    @if(Auth::user()->role_id == 3)
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('courses.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-book fa-4x float-left" style="color:#49DC7F; width:60px;"></i>
                            <span class="h2 pl-3">{{ Auth::user()->course->count() }}</span><br/>
                            <span class="h6 pl-3">Courses Joined</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('resources.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-folder-open fa-4x float-left" style="color:#36D1DC; width:60px;"></i>
                            <span class="h2 pl-3">{{ Auth::user()->resource->count() }}</span><br/>
                            <span class="h6 pl-3">Files Uploaded</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('notes.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-file-alt fa-4x float-left" style="color:#5B86E5; width:60px"></i>
                            <span class="h2 pl-3">{{ Auth::user()->note->count() }}</span><br/>
                            <span class="h6 pl-3">Notes Published</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('courses.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-book fa-4x float-left" style="color:#49DC7F; width:60px;"></i>
                            <span class="h2 pl-3">{{ Auth::user()->course->count() }}</span><br/>
                            <span class="h6 pl-3">Courses Created</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('resources.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-folder-open fa-4x float-left" style="color:#36D1DC; width:60px;"></i>
                            <span class="h2 pl-3">{{ Auth::user()->resource->count() }}</span><br/>
                            <span class="h6 pl-3">Files Uploaded</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="{{ route('notes.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-file-alt fa-4x float-left" style="color:#5B86E5; width:60px"></i>
                            <span class="h2 pl-3">{{ Auth::user()->note->count() }}</span><br/>
                            <span class="h6 pl-3">Notes Published</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
