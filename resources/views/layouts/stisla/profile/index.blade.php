@extends('app')
@section('title', __('common.profile'))

@section('content')
    <div class="section-header">
        <h1>@lang('common.profile')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">@lang('common.profile')</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">@lang('stisla.hi'), {{ $user->name }}!</h2>
        <p class="section-lead">@lang('stisla.informations')</p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if ($user->avatar == null)
                            <img src="{{ $user->gravatar(512) }}" class="rounded-circle profile-widget-picture">
                        @else
                            <img src="{{ $user->avatar->url }}" class="rounded-circle profile-widget-picture">
                        @endif
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">{{ trans_choice('common.flight', 1) }}</div>
                                <div class="profile-widget-item-value">{{ $user->flights }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">@lang('flights.flighthours')</div>
                                <div class="profile-widget-item-value">@minutestotime($user->flight_time)</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">@lang('profile.transferhours')</div>
                                <div class="profile-widget-item-value">@minutestohours($user->transfer_time)h</div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::check() && $user->id === Auth::user()->id)
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">
                            {{ $user->name_private }} ({{ $user->ident }})
                            <img style="margin-left: 4px; height: 13px; margin-bottom: 2px;" src="{{ public_asset('/assets/frontend/stisla/modules/flag-icon-css/flags/4x3/'.$user->country.'.svg')  }}">
                            <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $user->email }}</div>
                        </div>
                        <div class="contact-item">
                            <h6>@lang('profile.apikey') (@lang('profile.dontshare'))</h6>
                            <span class="float-right align-right">
                                {{ $user->api_key }}
                            </span>
                        </div>
                        <div class="contact-item">
                            <h6>@lang('common.timezone')</h6>
                            <span class="float-right align-right">
                                {{ $user->timezone }}
                            </span>
                        </div>
                        <div class="contact-item">
                            <h6>@lang('profile.opt-in')</h6>
                            <span class="float-right align-right">
                                {{ $user->opt_in ? __('common.yes') : __('common.no') }}
                            </span>
                        </div>

                        <div class="text-center">
                            @if (isset($acars) && $acars === true)
                                <a href="{{ route('frontend.profile.acars') }}" class="btn btn-icon icon-left btn-info btn-round mr-2" onclick="alert('Save to \'My Documents/phpVMS\'')">
                                    <i class="fas fa-user-cog"></i>
                                    ACARS Config
                                </a>
                            @endif

                            <a href="{{ route('frontend.profile.regen_apikey') }}" class="btn btn-icon icon-left btn-warning btn-round mr-2" onclick="return confirm({{ __('Are you sure? This will reset your API key.') }})">
                                <i class="fas fa-key"></i>
                                @lang('profile.newapikey')
                            </a>

                            <a href="{{ route('frontend.profile.edit', [$user->id]) }}" class="btn btn-icon icon-left btn-primary btn-round">
                                <i class="far fa-edit"></i>
                                @lang('common.edit')
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="statistic-details">
                                    <div class="statistic-details-item">
                                        <div class="detail-value text-primary">{{ $user->rank->name }}</div>
                                        <div class="detail-name">Rank</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="statistic-details">
                                    <div class="statistic-details-item">
                                        <div class="detail-value text-danger">{{ $user->airline->name }}</div>
                                        <div class="detail-name">@lang('common.airline')</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="statistic-details">
                                    <div class="statistic-details-item">
                                        <div class="detail-value text-info">{{ $user->current_airport->icao }}</div>
                                        <div class="detail-name">@lang('airports.current')</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="statistic-details">
                                    <div class="statistic-details-item">
                                        <div class="detail-value text-warning">{{ $user->home_airport->icao }}</div>
                                        <div class="detail-name">@lang('airports.home')</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .contact-item:first-child {
    		border: none;
    		padding-top: 0;
    		margin-top: 0;
    	}

    	.contact-item {
    		color: #5b636a;
    		align-items: flex-start;
    		flex-wrap: wrap;
    		padding: 10px 0 2px 0;
    		display: flex;
    		justify-content: space-between;
    		margin-bottom: 0;
    		font-size: 13px;
    		border-top: 1px solid #dee2e6;
    	}

    	.contact-item:last-child{
    		padding-bottom: 0;
    	}

    	.align-right {
    		text-align: right;
    	}
    </style>
@endsection
