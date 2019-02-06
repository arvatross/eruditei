@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Dashboard</h3>
        </div>
    </div>
    @if(Auth::user()->account_type === 'Student')
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('courses.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-book fa-4x float-left" style="color:#49DC7F; width:60px;"></i>
                            <span class="h2 pl-3">103</span><br/>
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
                            <span class="h2 pl-3">328</span><br/>
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
                            <span class="h2 pl-3">421</span><br/>
                            <span class="h6 pl-3">Notes Published</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-header">
                    Recent Comments
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">myfile.docx</a>
                    <a href="#" class="list-group-item list-group-item-action">notes.text</a>
                    <a href="#" class="list-group-item list-group-item-action">samplepowerpoint.pptx</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Recent Courses</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Recent Files</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Recent Notes</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Courses</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Files</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Notes</div>
                    </div>
                </div>
            </div>
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
                            <span class="h2 pl-3">103</span><br/>
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
                            <span class="h2 pl-3">328</span><br/>
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
                            <span class="h2 pl-3">421</span><br/>
                            <span class="h6 pl-3">Notes Published</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="{{ route('courses.index') }}" class="text-secondary card-link">
                <div class="card bg-white border-0 shadow">
                    <div class="card-body">
                        <span class="d-block">
                            <i class="fas fa-book fa-4x float-left" style="color:#49DC7F; width:60px;"></i>
                            <span class="h2 pl-3">103</span><br/>
                            <span class="h6 pl-3">Enrolled Students</span>
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
                            <span class="h2 pl-3">328</span><br/>
                            <span class="h6 pl-3">Total Views</span>
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
                            <span class="h2 pl-3">421</span><br/>
                            <span class="h6 pl-3">Total Downloads</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-header">
                    Recent Comments
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">myfile.docx</a>
                    <a href="#" class="list-group-item list-group-item-action">notes.text</a>
                    <a href="#" class="list-group-item list-group-item-action">samplepowerpoint.pptx</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Recent Courses</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Recent Files</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Recent Notes</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Courses</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Files</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Notes</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
