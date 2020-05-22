@extends('auth.login_layout')
@section('title', __('errors.401.title'))

@section('content')
    <div class="container mt-5">
        <div class="page-error">
            <div class="page-inner">
                <h1>401</h1>
                <div class="page-description">
                    {!! str_replace(':link', config('app.url'), __('errors.401.message')).'<br />' !!}
                </div>
                <div class="page-search">
                    <div class="mt-3">
                        <a href="{{ route('frontend.dashboard.index') }}">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
