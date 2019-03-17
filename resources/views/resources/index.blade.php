@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Resources</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="list-group list-group-flush">
                @forelse($resources as $resource)
                                    <a href="/download/{{ $resource->file_url }}" class="list-group-item list-group-item-action" id="uploadedItem">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $resource->file_name }}</h6>
                                            <small>{{ FormatBytes::formatBytes($resource->file_size) }}</small>
                                        </div>
                                        <small>Uploaded {{ $resource->created_at->diffForHumans() }}</small>
                                            <a class="ml-auto text-danger" href="{{ route('resources.destroy', [$resource->id])}}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('resource-delete').submit();">
                                                <small>{{ __('Remove') }}</small>
                                            </a>
                                            <form id="resource-delete" action="{{ route('resources.destroy', [$resource->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                    </a>
                                @empty
                                    No files have been recently uploaded to this course.
                                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection