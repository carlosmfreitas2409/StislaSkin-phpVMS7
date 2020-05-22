@extends('auth.login_layout')
@section('title', __('stisla.resetpw'))

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <img src="{{ public_asset('/assets/frontend/img/logo.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="card-header"><h4>@lang('stisla.resetpw')</h4></div>

                    <div class="card-body">
                        {{ Form::open(['url' => url('/password/reset'), 'method' => 'post', 'role' => 'form']) }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">@lang('auth.emailaddress')</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="form-group col-6 {{ $errors->has('password') ? 'has-danger' : '' }}">
                                <label for="password" class="d-block">@lang('auth.password')</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-6 {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                                <label for="password_confirmation" class="d-block">@lang('passwords.confirm')</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">@lang('stisla.resetpw')</button>
                        </div>
                        {{ Form::close() }}
                    </div>
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

@section('scripts')
    <script>
        $(".pwstrength").pwstrength();
    </script>
@endsection
