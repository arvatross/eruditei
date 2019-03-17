@extends('layouts.app')

@section('title', 'Document Viewer')

@section('content')
<div class="contaier">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-white border-0 shadow">
                <div class="card-body">
                <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ urlencode($url) }}" frameborder="0" style="width:100%;min-height:800px;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection