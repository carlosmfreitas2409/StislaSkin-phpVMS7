@extends('app')
@section('title', trans_choice('common.download', 2))

@section('content')

    @include('flash::message')
    <div class="section-header">
        <h1>{{ trans_choice('common.download', 2) }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">{{ trans_choice('common.download', 2) }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(!$grouped_files || \count($grouped_files) === 0)
                <div class="alert alert-primary">@lang('downloads.none')</div>
            @else
                @foreach($grouped_files as $group => $files)
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $group }}</h4>
                    </div>

                    <div class="card-body">
                        @include('downloads.table', ['files' => $files])
                    </div>
                </div>
              @endforeach
            @endif
        </div>
    </div>
@endsection
