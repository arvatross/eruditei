@extends('layouts.app')

@section('title', 'Upload Files')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Upload Files</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="post" action="{{ route('resources.store') }}" class="dropzone mb-4" id="dropzone" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="rid" value="{{ $course->id }}">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                    <p>You are uploading files for your course entitled <b>{{ $course->name }}</b></p>
                    <a href="{{ route('courses.show', ['course' => $course->slug]) }}" class="btn btn-primary btn-block mt-4">Publish</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.doc,.docx,.pdf,.xls,.xlsx,.ppt,.pptx",
        timeout: 5000,
        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
            return false;
        }
    };
</script>
@endsection