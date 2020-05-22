@extends('app')
@section('title', trans_choice('common.pilot', 2))

@section('content')
    <div class="section-header">
        <h1>{{ trans_choice('common.pilot', 2) }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">{{ trans_choice('common.pilot', 2) }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ trans_choice('common.pilot', 2) }}</h4>
                </div>
                <div class="card-body">
                    @include('users.table')
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            {{ $users->links('pagination.default') }}
        </div>
    </div>
@endsection
