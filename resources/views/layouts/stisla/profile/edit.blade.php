@extends('app')
@section('title', __('profile.editprofile'))

@section('content')
    <div class="section-header">
        <h1>@lang('profile.edityourprofile')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item"><a href="{{ route('frontend.profile.index') }}">@lang('common.profile')</a></div>
            <div class="breadcrumb-item">@lang('profile.edityourprofile')</div>
        </div>
    </div>

    {{ Form::model($user, ['route' => ['frontend.profile.update', $user->id], 'files' => true, 'method' => 'patch']) }}

    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            @include('flash::message')
            <div class="card">
                <div class="card-body">
                    @include("profile.fields")
                </div>
            </div>
        </div>
    </div>

    {{ Form::close() }}
@endsection
