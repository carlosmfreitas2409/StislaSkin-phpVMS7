<div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label for="name">@lang('common.name')</label>
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
    @if ($errors->has('name'))
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
    <label for="email">@lang('common.email')</label>
    {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
    @if ($errors->has('email'))
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    @endif
</div>

<div class="form-group {{ $errors->has('airline') ? ' has-danger' : '' }}">
    <label>@lang('common.airline')</label>
    {{ Form::select('airline_id', $airlines, null , ['class' => 'form-control select2']) }}
    @if ($errors->has('airline_id'))
        <div class="invalid-feedback">{{ $errors->first('airline_id') }}</div>
    @endif
</div>

<div class="form-group {{ $errors->has('home_airport_id') ? ' has-danger' : '' }}">
    <label>@lang('airports.home')</label>
    {{ Form::select('home_airport_id', $airports, null , ['class' => 'form-control select2']) }}
    @if ($errors->has('home_airport_id'))
        <div class="invalid-feedback">{{ $errors->first('home_airport_id') }}</div>
    @endif
</div>

<div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
    <label>@lang('common.country')</label>
    {{ Form::select('country', $countries, null, ['class' => 'form-control select2' ]) }}
    @if ($errors->has('country'))
        <div class="invalid-feedback">{{ $errors->first('country') }}</div>
    @endif
</div>

<div class="form-group {{ $errors->has('timezone') ? ' has-danger' : '' }}">
    <label>@lang('common.timezone')</label>
    {{ Form::select('timezone', $timezones, null, ['class' => 'form-control select2' ]) }}
    @if ($errors->has('timezone'))
        <div class="invalid-feedback">{{ $errors->first('timezone') }}</div>
    @endif
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><i class="fas fa-key"></i>
            @lang('profile.changepassword')
        </li>
    </ol>
</nav>

<div class="row">
    <div class="form-group col-6 {{ $errors->has('password') ? 'has-danger' : '' }}">
        <label for="password">@lang('profile.newpassword')</label>
        {{ Form::password('password', ['class' => 'form-control pwstrength', 'id' => 'password', 'data-indicator' => 'pwindicator']) }}
        <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
        </div>
        @if ($errors->has('password'))
            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
        @endif
    </div>

    <div class="form-group col-6 {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
        <label>@lang('passwords.confirm')</label>
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-danger' : '' }}">
    <label>@lang('profile.avatar')</label>
    {{ Form::file('avatar', ['class' => 'form-control']) }}
    <p>@lang('profile.avatarresize', ['width' => config('phpvms.avatar.width'),'height' => config('phpvms.avatar.height')])</p>
    @if ($errors->has('avatar'))
        <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
    @endif
</div>

<div class="form-group">
    <div class="custom-control custom-checkbox">
        {{ Form::hidden('opt_in', 0, false) }}
        {{ Form::checkbox('opt_in', 1, null, ['class' => 'custom-control-input', 'id' => 'opt_in']) }}
        <label for="opt_in" class="custom-control-label">@lang('profile.opt-in')</label>
    </div>
    <p>@lang('profile.opt-in-descrip')</p>
</div>

{{ Form::submit(__('profile.updateprofile'), ['class' => 'btn btn-primary float-right']) }}

@section('scripts')
    <script src="{{ public_asset('/assets/frontend/stisla/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>

    <script>
        $(".pwstrength").pwstrength();
    </script>
@endsection
