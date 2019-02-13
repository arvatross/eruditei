@extends('layouts.app')

@section('title', 'Upload a File')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('resources.store') }}">
    </form>
    <div class="row">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection