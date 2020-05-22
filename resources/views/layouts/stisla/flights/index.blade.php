@extends('app')
@section('title', trans_choice('common.flight', 2))

@section('content')
    <div class="section-header">
        <h1>{{ trans_choice('common.flight', 2) }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">{{ trans_choice('common.flight', 2) }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @include('flash::message')
            @include('flights.table')
        </div>
        <div class="col-md-4">
            @include('flights.nav')
            @include('flights.search')
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            {{ $flights->links('pagination.default') }}
        </div>
    </div>
@endsection

@include('flights.scripts')
