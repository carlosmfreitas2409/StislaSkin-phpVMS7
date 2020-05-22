@extends('app')
@section('title', __('common.dashboard'))

@section('content')
    <div class="section-header">
        <h1>@lang('common.dashboard')</h1>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-plane"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ trans_choice('common.flight', $user->flights) }}</h4>
                    </div>
                    <div class="card-body">{{ $user->flights }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('dashboard.totalhours')</h4>
                    </div>
                    <div class="card-body">@minutestotime($user->flight_time)</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('dashboard.yourbalance')</h4>
                    </div>
                    <div class="card-body">{{ optional($user->journal)->balance ?? 0 }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-map-marker"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>@lang('airports.current')</h4>
                    </div>
                    <div class="card-body">
                        @if($user->current_airport)
                            {{ $user->curr_airport_id }}
                        @else
                            {{ $user->home_airport_id }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">

            <div class="card">
    			<div class="card-header">
    				<h4>@lang('common.livemap')</h4>
    			</div>
				<div class="card-body p-0">
                    {{ Widget::DashMap() }}
				</div>
    		</div>

            <div class="card">
    			<div class="card-header">
    				<h4>@lang('dashboard.yourlastreport')</h4>
    			</div>
				<div class="card-body">
                    @if($last_pirep === null)
                        <div style="text-align: center; font-size: 15px;">
                            @lang('dashboard.noreportsyet')
                            <a href="{{ route('frontend.pireps.create') }}">@lang('dashboard.fileonenow')</a>
                        </div>
                    @else
                        @include('dashboard.pirep_card', ['pirep' => $last_pirep])
                    @endif
				</div>
    		</div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
            			<div class="card-header">
            				<h4>@lang('dashboard.recentreports')</h4>
            			</div>
        				<div class="card-body">
                            {{ Widget::latestPireps(['count' => 5]) }}
        				</div>
            		</div>
                </div>
                <div class="col-md-6">
                    <div class="card">
            			<div class="card-header">
            				<h4>@lang('common.newestpilots')</h4>
            			</div>
        				<div class="card-body">
                            {{ Widget::latestPilots(['count' => 5]) }}
        				</div>
            		</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
    			<div class="card-header">
    				<h4>@lang('dashboard.weatherat', ['ICAO' => $current_airport])</h4>
    			</div>
				<div class="card-body">
                    {{ Widget::Weather(['icao' => $current_airport]) }}
				</div>
    		</div>

            {{ Widget::latestNews(['count' => 1]) }}
        </div>
    </div>
@endsection
