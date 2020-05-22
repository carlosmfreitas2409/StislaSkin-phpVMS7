@extends('app')
@section('title', trans_choice('common.pirep', 1).' '.$pirep->ident)

@section('content')
    <div class="section-header">
        <h1>{{ $pirep->airline->icao }}{{ $pirep->ident }} | {{ $pirep->dpt_airport_id }} - {{ $pirep->arr_airport_id }}</h1>
        <div class="section-header-button">
            {{-- Show the link to edit if it can be edited --}}
            @if (!empty($pirep->simbrief))
                <a href="{{ url(route('frontend.simbrief.briefing', [$pirep->simbrief->id])) }}" class="btn btn-outline-info">View SimBrief</a>
            @endif

            @if(!$pirep->read_only)
                <form method="get" action="{{ route('frontend.pireps.edit', $pirep->id) }}" style="display: inline">
                    @csrf
                    <button class="btn btn-outline-info">@lang('common.edit')</button>
                </form>
                <form method="post" action="{{ route('frontend.pireps.submit', $pirep->id) }}" style="display: inline">
                    @csrf
                    <button class="btn btn-outline-primary">@lang('common.submit')</button>
                </form>
            @endif
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item">{{ trans_choice('pireps.pilotreport', 2) }}</div>
            <div class="breadcrumb-item">{{ trans_choice('common.pirep', 1).' '.$pirep->airline->icao }}{{ $pirep->ident }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        {{-- DEPARTURE INFO --}}
                        <div class="col-6 text-left">
                            <h4>
                                {{$pirep->dpt_airport->location}}
                            </h4>
                            <p>
                                <a href="{{route('frontend.airports.show', $pirep->dpt_airport_id)}}">{{ $pirep->dpt_airport->full_name }}</a>
                                <br/>
                                @if($pirep->block_off_time)
                                    {{ $pirep->block_off_time->toDayDateTimeString() }}
                                @endif
                            </p>
                        </div>

                        {{-- ARRIVAL INFO --}}
                        <div class="col-6 text-right">
                            <h4>
                                {{$pirep->arr_airport->location}}
                            </h4>
                            <p>
                                <a href="{{route('frontend.airports.show', $pirep->arr_airport_id)}}">{{ $pirep->arr_airport->full_name }}</a>
                                <br/>
                                @if($pirep->block_on_time)
                                    {{ $pirep->block_on_time->toDayDateTimeString() }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="progress mb-3">
                        <div class="progress-bar" role="progressbar" data-width="{{$pirep->progress_percent}}%" aria-valuenow="{{$pirep->progress_percent}}" aria-valuemin="0" aria-valuemax="100">{{$pirep->progress_percent}}%</div>
                    </div>
                </div>
            </div>

            <div class="card">
    			<div class="card-header">
    				<h4>@lang('stisla.flightmap')</h4>
    			</div>
				<div class="card-body p-0">
                    @include('pireps.map')
				</div>
    		</div>
        </div>

        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
				<div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td width="30%">@lang('common.state')</td>
                            <td>
                                <div class="badge badge-info">
                                  {{ PirepState::label($pirep->state) }}
                                </div>
                            </td>
                        </tr>

                        @if ($pirep->state !== PirepState::DRAFT)
                        <tr>
                            <td width="30%">@lang('common.status')</td>
                            <td>
                                <div class="badge badge-info">
                                    {{ PirepStatus::label($pirep->status) }}
                                </div>
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td>@lang('pireps.source')</td>
                            <td>{{ PirepSource::label($pirep->source) }}</td>
                        </tr>

                        <tr>
                            <td>@lang('flights.flighttype')</td>
                            <td>{{ \App\Models\Enums\FlightType::label($pirep->flight_type) }}</td>
                        </tr>

                        <tr>
                            <td>@lang('pireps.filedroute')</td>
                            <td>
                                {{ $pirep->route }}
                            </td>
                        </tr>

                        <tr>
                            <td>{{ trans_choice('common.note', 2) }}</td>
                            <td>
                                {{ $pirep->notes }}
                            </td>
                        </tr>

                        <tr>
                            <td>@lang('pireps.filedon')</td>
                            <td>
                                {{ show_datetime($pirep->created_at) }}
                            </td>
                        </tr>
                    </table>

                    @if(count($pirep->fields) > 0 || count($pirep->fares) > 0)
                        <hr>
                    @endif

                    @if(count($pirep->fields) > 0)
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><i class="fab fa-wpforms"></i>
                                    {{ trans_choice('common.field', 2) }}
                                </li>
                            </ol>
                        </nav>
                        <table class="table table-hover table-condensed">
                            <thead>
                                <th>@lang('common.name')</th>
                                <th>{{ trans_choice('common.value', 1) }}</th>
                            </thead>
                            <tbody>
                                @foreach($pirep->fields as $field)
                                <tr>
                                    <td>{{ $field->name }}</td>
                                    <td>{{ $field->value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if(count($pirep->fares) > 0)
                        <hr>
                    @endif

                    @if(count($pirep->fares) > 0)
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><i class="fas fa-ellipsis-h"></i>
                                    {{ trans_choice('pireps.fare', 2) }}
                                </li>
                            </ol>
                        </nav>

                        <table class="table table-hover table-condensed">
                            <thead>
                                <th>@lang('pireps.class')</th>
                                <th>@lang('pireps.count')</th>
                            </thead>
                            <tbody>
                                @foreach($pirep->fares as $fare)
                                <tr>
                                    <td>{{ $fare->fare->name }} ({{ $fare->fare->code }})</td>
                                    <td>{{ $fare->count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            @if(count($pirep->acars_logs) > 0)
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>@lang('pireps.flightlog')</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-condensed" id="users-table">
                            <tbody>
                                @foreach($pirep->acars_logs as $log)
                                <tr>
                                    <td nowrap="true">{{ show_datetime($log->created_at) }}</td>
                                    <td>{{ $log->log }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            @if(!empty($pirep->simbrief))
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>OFP</h4>
                    </div>
                    <div class="card-body">
                        <div class="overflow-auto" style="height: 600px;">
                            {!! $pirep->simbrief->xml->text->plan_html !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
