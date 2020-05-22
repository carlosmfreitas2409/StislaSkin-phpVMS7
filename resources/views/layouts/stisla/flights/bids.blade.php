@extends('app')
@section('title', __('flights.mybid'))

@section('content')
    <div class="section-header">
        <h1>{{ __('flights.mybid') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item"><a href="{{ route('frontend.flights.index') }}">{{ trans_choice('common.flight', 2) }}</a></div>
            <div class="breadcrumb-item">{{ __('flights.mybid') }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('flash::message')
            @if (Auth::user()->bids == "[]")
                <div class="alert alert-primary">
                    @lang('flights.none')
                </div>
            @else
                @include('flights.table')

            @endif
        </div>
    </div>
@endsection

@include('flights.scripts')
