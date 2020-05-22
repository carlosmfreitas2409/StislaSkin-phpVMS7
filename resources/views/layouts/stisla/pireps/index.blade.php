@extends('app')
@section('title', trans_choice('common.pirep', 2))

@section('content')
    <div class="section-header">
        <h1>{{ trans_choice('pireps.pilotreport', 2) }}</h1>
        <div class="section-header-button">
            <a href="{{ route('frontend.pireps.create') }}" class="btn btn-primary">@lang('pireps.filenewpirep')</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">{{ trans_choice('pireps.pilotreport', 2) }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            @include('flash::message')
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ trans_choice('pireps.pilotreport', 2) }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('frontend.pireps.create') }}" class="btn btn-primary">@lang('pireps.filenewpirep')</a>
                    </div>
                </div>
                <div class="card-body">
                    @include('pireps.table')
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            {{ $pireps->links('pagination.default') }}
        </div>
    </div>
@endsection
