@extends('auth.login_layout')
@section('title', __('Reset Password'))

<!-- Main Content -->
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="{{ public_asset('/assets/frontend/img/logo.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card card-primary">
                    <div class="card-header"><h4>{{ __('Reset Password') }}</h4></div>

                    <div class="card-body">
                        <p class="text-muted">@lang('stisla.sendlink')</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">@lang('stisla.forgotpw')</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-5 text-muted text-center">
                    @lang('stisla.already') <a href="{{ url('/login') }}">@lang('stisla.loginnow')</a>
                </div>

                <div class="simple-footer">
                    Copyright &copy; {{ config('app.name') }} <?php echo date('Y'); ?>
                    <br>
                    CrewCenter by <a href="mailto:carlosmfreitas05@gmail.com">Carlos Eduardo</a>
                </div>
            </div>
        </div>
    </div>
@endsection
