@extends('app')
@section('title', __('pireps.editflightreport'))

@section('content')
    <div class="section-header">
        <h1>@lang('pireps.newflightreport')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item"><a href="{{ route('frontend.pireps.index') }}">{{ trans_choice('pireps.pilotreport', 2) }}</a></div>
            <div class="breadcrumb-item">@lang('pireps.editflightreport')</div>
        </div>
    </div>

    {{ Form::model($pirep, [
        'route' => ['frontend.pireps.update', $pirep->id],
        'class' => 'form-group',
        'method' => 'patch'])
    }}

    <div class="row">
        @include('flash::message')
        @include('pireps.fields')
    </div>

    {{ Form::close() }}
@endsection
@include('pireps.scripts')
