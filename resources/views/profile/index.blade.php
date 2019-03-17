@extends('layouts.app')

@section('title', $user->name.' (Public Profile)')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-white shadow border-0 mb-4">
                <img src="/storage/uploads/{{ $user->img_filename }}" alt="..." class="card-img-top bg-eruditei">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <h6 class="card-subtitle mb-4 text-muted">{{ $user->role->name }}</h6>
                    <p class="card-text">{!! $user->about !!}</p>
                    <p class="card-text">{!! $user->website !!}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @forelse($user->note as $note)
                    <div class="col-md-4">
                        <a href="/notes/show/{{ $note->id }}" class="text-secondary card-link">
                            <div class="card border-0 shadow mb-4">
                                <img class="card-img-top" src="/storage/images/{{ $note->cover_url }}" alt="{{ $note->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $note->title }}</h5>
                                    <p class="card-text">{!! str_limit($note->content, 50, '...') !!}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    This user has yet to create a note...
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection