@extends('layouts.app')

@section('title', 'Notes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 my-3">
            <h3>Notes</h3>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('notes.create') }}" class="btn btn-block btn-success shadow-sm">New Note</a>
       </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 card-columns">
            @forelse($user->note as $note)
                <a href="/notes/show/{{ $note->id }}" class="text-secondary card-link">
                    <div class="card border-0 shadow mb-4">
                        <img class="card-img-top" src="/storage/images/{{ $note->cover_url }}" alt="{{ $note->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <p class="card-text">{!! str_limit($note->content, 50, '...'); !!}</p>
                        </div>
                    </div>
                </a>
            @empty
                No records found...
            @endforelse
        </div>
    </div>
</div>
@endsection