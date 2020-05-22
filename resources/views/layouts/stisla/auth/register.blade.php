@extends('auth.login_layout')
@section('title', __('auth.register'))

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <img src="{{ public_asset('/assets/frontend/img/logo.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="card-header"><h4>@lang('common.register')</h4></div>

                    <div class="card-body">
                        {{ Form::open(['url' => '/register', 'class' => 'form-signin']) }}
                            <div class="row">
                                <div class="form-group col-6 {{ $errors->has('name') ? 'has-danger' : '' }}">
                                    <label for="name">@lang('auth.fullname')</label>
                                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'autofocus' => true]) }}
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-6 {{ $errors->has('email') ? 'has-danger' : '' }}">
                                    <label for="email">@lang('auth.emailaddress')</label>
                                    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6 {{ $errors->has('airline') ? 'has-danger' : '' }}">
                                    <label>@lang('common.airline')</label>
                                    {{ Form::select('airline_id', $airlines, null , ['class' => 'form-control select2']) }}
                                    @if ($errors->has('airline_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('airline_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-6 {{ $errors->has('home_airport') ? 'has-danger' : '' }}">
                                    <label>@lang('airports.home')</label>
                                    {{ Form::select('home_airport_id', $airports, null , ['class' => 'form-control select2']) }}
                                    @if ($errors->has('home_airport_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('home_airport_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6 {{ $errors->has('country') ? 'has-danger' : '' }}">
                                    <label>@lang('common.country')</label>
                                    {{ Form::select('country', $countries, null, ['class' => 'form-control select2' ]) }}
                                    @if ($errors->has('country'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-6 {{ $errors->has('timezone') ? 'has-danger' : '' }}">
                                    <label>@lang('common.timezone')</label>
                                    {{ Form::select('timezone', $timezones, null, ['id'=>'timezone', 'class' => 'form-control select2' ]) }}
                                    @if ($errors->has('timezone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('timezone') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if (setting('pilots.allow_transfer_hours') === true)
                            <div class="form-group {{ $errors->has('transfer_time') ? 'has-danger' : '' }}">
                                <label for="transfer_time">@lang('auth.transferhours')</label>
                                {{ Form::number('transfer_time', 0, ['class' => 'form-control', 'id' => 'transfer_time']) }}
                                @if ($errors->has('transfer_time'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('transfer_time') }}
                                    </div>
                                @endif
                            </div>
                            @endif

                            <div class="row">
                                <div class="form-group col-6 {{ $errors->has('password') ? 'has-danger' : '' }}">
                                    <label for="password" class="d-block">@lang('auth.password')</label>
                                    {{ Form::password('password', ['class' => 'form-control pwstrength', 'id' => 'password', 'data-indicator' => 'pwindicator']) }}
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
                                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if(config('captcha.enabled'))
                            <div class="form-group {{ $errors->has('g-recaptcha-response') ? 'has-danger' : '' }}">
                                <label>@lang('auth.fillcaptcha')</label>
                                {!! NoCaptcha::display(config('captcha.attributes')) !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </div>
                                @endif
                            </div>
                            @endif

                            <div class="form-group">
                                @include('auth.toc')
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::hidden('toc_accepted', 0, false) }}
                                    {{ Form::checkbox('toc_accepted', 1, null, ['id' => 'toc_accepted', 'class' => 'custom-control-input']) }}
                                    <label for="toc_accepted" class="custom-control-label">@lang('auth.tocaccept')</label>
                                    @if ($errors->has('toc_accepted'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('toc_accepted') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::hidden('opt_in', 0, false) }}
                                    {{ Form::checkbox('opt_in', 1, null, ['id' => 'opt_in', 'class' => 'custom-control-input']) }}
                                    <label for="opt_in" class="custom-control-label">@lang('profile.opt-in-descrip')</label>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::submit(__('auth.register'), [
                                    'id' => 'register_button',
                                    'class' => 'btn btn-primary btn-lg btn-block',
                                    'disabled' => true,
                                ]) }}
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
  {!! NoCaptcha::renderJs(config('app.locale')) !!}

    <script>
        $(".pwstrength").pwstrength();

        $('#toc_accepted').click(function () {
            if ($(this).is(':checked')) {
                console.log('toc accepted');
                $('#register_button').removeAttr('disabled');
            } else {
                console.log('toc not accepted');
                $('#register_button').attr('disabled', 'true');
            }
        });
    </script>
@endsection
