@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-white shadow border-0 mb-4">
                <img src="{{ asset('images/default-user.png')}}" alt="..." class="card-img-top bg-eruditei">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }} ({{ $user->account_type }})</h5>
                    <h6 class="card-subtitle mb-4 text-muted"><?php echo '@' ?>{{ $user->username}}</h6>
                    <p class="card-text">Hi! I'm the Admin of Eruditei!</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary btn-block">
                    SORT BY CATEGORY
                </button>
            </div>
            <div class="col-md-4">
            <button class="btn btn-primary btn-block">
            SORT BY DATE
                </button>
            </div>
            <div class="col-md-4">
            <button class="btn btn-primary btn-block">
            SORT BY STATUS
                </button>
            </div>
            </div>
            <div class="card-columns">
                <div class="card bg-white shadow border-0 mb-4">
                    <img src="{{ asset('images/default-user.png')}}" alt="..." class="card-img-top bg-eruditei">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} ({{ $user->account_type }})</h5>
                        <h6 class="card-subtitle mb-4 text-muted"><?php echo '@' ?>{{ $user->username}}</h6>
                        <p class="card-text">Hi! I'm the Admin of Eruditei!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection