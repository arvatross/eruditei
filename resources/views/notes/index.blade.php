@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <h3>Notes</h3>
        </div>
    </div>
    <div class="row">
       <div class="col-md-4 mb-3">
            <form class="form-block">
                <input class="form-control border-0 shadow-sm" type="search" placeholder="Search my notes" aria-label="Search">
            </form>
       </div>
       <div class="col-md-4 mb-3">
            <select class="custom-select border-0 shadow-sm">
                <option selected>Sort by</option>
                <option value="1">Recently Published</option>
                <option value="2">Most Comments</option>
            </select>
       </div>
       <div class="col-md-4 mb-3">
            <button class="btn btn-block btn-success shadow-sm">New Note</button>
       </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 card-columns">
            <div class="card shadow border-0 mb-4">
                <img src="{{ asset('images/default-course-banner.png') }}" class="card-img-top bg-eruditei" alt="defaul">
                <div class="card-body">
                    <h5 class="card-title">Card title that wraps to a new line</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card shadow border-0 mb-4">
                <img src="{{ asset('images/default-course-banner.png') }}" class="card-img-top bg-eruditei" alt="defaul">
                <div class="card-body">
                    <h5 class="card-title">Card title that wraps to a new line</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card shadow border-0 mb-4">
                <img src="{{ asset('images/default-course-banner.png') }}" class="card-img-top bg-eruditei" alt="defaul">
                <div class="card-body">
                    <h5 class="card-title">Card title that wraps to a new line</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection