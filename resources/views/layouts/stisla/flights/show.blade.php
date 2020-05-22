@extends('app')
@section('title', trans_choice('common.flight', 1).' '.$flight->ident)

@section('content')
    <div class="section-header">
        <h1>{{ trans_choice('common.flight', 1) }} {{ $flight->ident }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('frontend.flights.index') }}">{{ trans_choice('common.flight', 2) }}</a></div>
            <div class="breadcrumb-item">{{ $flight->ident }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>@lang('common.departure')</td>
                                <td>
                                    {{ optional($flight->dpt_airport)->name ?? $flight->dpt_airport_id }}
                                    (<a href="{{route('frontend.airports.show', ['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a>)
                                    @ {{ $flight->dpt_time }}
                                </td>
                            </tr>

                            <tr>
                                <td>@lang('common.arrival')</td>
                                <td>
                                    {{ optional($flight->arr_airport)->name ?? $flight->arr_airport_id }}
                                    (<a href="{{route('frontend.airports.show', ['id' => $flight->arr_airport_id])}}">{{$flight->arr_airport_id }}</a>)
                                    @ {{ $flight->arr_time }}
                                </td>
                            </tr>

                            @if($flight->alt_airport_id)
                            <tr>
                                <td>@lang('flights.alternateairport')</td>
                                <td>
                                    {{ optional($flight->alt_airport)->name ?? $flight->alt_airport_id }}
                                    (<a href="{{route('frontend.airports.show', ['id' => $flight->alt_airport_id])}}">{{$flight->alt_airport_id}}</a>)
                                </td>
                            </tr>
                            @endif

                            <tr>
                                <td>@lang('flights.route')</td>
                                <td>{{ $flight->route }}</td>
                            </tr>

                            @if(filled($flight->notes))
                            <tr>
                                <td>{{ trans_choice('common.note', 2) }}</td>
                                <td>{{ $flight->notes }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>@lang('stisla.routemap')</h4>
                </div>
                <div class="card-body p-0">
                    @include('flights.map')
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$flight->dpt_airport_id}} @lang('common.metar')</h4>
                </div>
                <div class="card-body">
                    {{ Widget::Weather(['icao' => $flight->dpt_airport_id,]) }}
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>{{$flight->arr_airport_id}} @lang('common.metar')</h4>
                </div>
                <div class="card-body">
                    {{ Widget::Weather(['icao' => $flight->arr_airport_id,]) }}
                </div>
            </div>

            @if ($flight->alt_airport_id)
                <div class="card">
                    <div class="card-header">
                        <h4>{{$flight->alt_airport_id}} @lang('common.metar') (@lang('flights.alternateairport'))</h4>
                    </div>
                    <div class="card-body">
                        {{ Widget::Weather(['icao' => $flight->alt_airport_id,]) }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
