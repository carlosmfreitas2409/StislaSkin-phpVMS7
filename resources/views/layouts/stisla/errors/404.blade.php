@extends('auth.login_layout')
@section('title', __('errors.404.title'))

@section('content')
    <div class="container mt-5">
        <div class="page-error">
            <div class="page-inner">
                <h1>404</h1>
                <div class="page-description">
                    {!! str_replace(':link', config('app.url'), __('errors.404.message')).'<br />' !!}
                    <pre class="language-markup"><code>{{ $exception->getMessage() }}</code></pre>
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
