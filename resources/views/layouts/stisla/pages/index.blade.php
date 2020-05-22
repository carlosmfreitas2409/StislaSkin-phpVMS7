@extends('app')
@section('title', $page->name)

@section('content')
    <div class="section-header">
        <h1>{{ $page->name }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">{{ $page->name }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $page->name }}</h4>
                </div>
                <div class="card-body">
                    {!! $page->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection
