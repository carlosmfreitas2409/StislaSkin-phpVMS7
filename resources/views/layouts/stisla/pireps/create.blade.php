@extends('app')
@section('title', __('pireps.fileflightreport'))

@section('content')
    <div class="section-header">
        <h1>@lang('pireps.newflightreport')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item"><a href="{{ route('frontend.pireps.index') }}">{{ trans_choice('pireps.pilotreport', 2) }}</a></div>
            <div class="breadcrumb-item">@lang('pireps.newflightreport')</div>
        </div>
    </div>

    @if(!empty($pirep))
        {{ Form::model($pirep, ['route' => 'frontend.pireps.store']) }}
    @else
        {{ Form::open(['route' => 'frontend.pireps.store']) }}
    @endif
    
    <div class="row">
        @include('flash::message')
        @include('pireps.fields')
    </div>

    {{ Form::close() }}
@endsection

@include('pireps.scripts')
