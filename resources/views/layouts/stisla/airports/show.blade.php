@extends('app')
@section('title', $airport->full_name)

@section('content')
    <div class="section-header">
        <h1>{{ $airport->full_name }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item active">@lang('stisla.airports')</div>
            <div class="breadcrumb-item">{{ $airport->icao }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('dashboard.weatherat', ['ICAO' => $airport->icao])</h4>
                </div>
                <div class="card-body">
                    {{ Widget::Weather([
                        'icao' => $airport->icao,
                    ]) }}
                </div>
            </div>

            @if(count($airport->files) > 0 && Auth::check())
            <div class="card">
                <div class="card-header">
                    <h4>{{ trans_choice('common.download', 2) }}</h4>
                </div>
                <div class="card-body">
                    @include('downloads.table', ['files' => $airport->files])
                </div>
            </div>
            @endif
        </div>

        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('stisla.airportmap')</h4>
                </div>
                <div class="card-body p-0">
                    {{ Widget::AirspaceMap([
                        'width' => '100%',
                        'height' => '500px',
                        'lat' => $airport->lat,
                        'lon' => $airport->lon,
                    ]) }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('flights.inbound')</h4>
                </div>
                @if(!$inbound_flights)
                    <div class="jumbotron text-center mb-0" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
                        @lang('flights.none')
                    </div>
                @else
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">@lang('airports.ident')</th>
                                        <th class="text-left">@lang('airports.departure')</th>
                                        <th>@lang('flights.dep')</th>
                                        <th>@lang('flights.arr')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inbound_flights as $flight)
                                        <tr>
                                            <td class="text-left">
                                                <a href="{{ route('frontend.flights.show', [$flight->id]) }}">{{ $flight->ident }}</a>
                                            </td>
                                            <td class="text-left">{{ optional($flight->dpt_airport)->name }}
                                                (<a href="{{route('frontend.airports.show',['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a>)
                                            </td>
                                            <td>{{ $flight->dpt_time }}</td>
                                            <td>{{ $flight->arr_time }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('flights.outbound')</h4>
                </div>
                @if(!$outbound_flights)
                    <div class="jumbotron text-center mb-0" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
                        @lang('flights.none')
                    </div>
                @else
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-left">@lang('airports.ident')</th>
                                        <th class="text-left">@lang('airports.arrival')</th>
                                        <th>@lang('flights.dep')</th>
                                        <th>@lang('flights.arr')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($outbound_flights as $flight)
                                        <tr>
                                            <td class="text-left">
                                                <a href="{{ route('frontend.flights.show', [$flight->id]) }}">{{ $flight->ident }}</a>
                                            </td>
                                            <td class="text-left">{{ $flight->arr_airport->name }}
                                                (<a href="{{route('frontend.airports.show',['id'=>$flight->arr_airport->icao])}}">{{$flight->arr_airport->icao}}</a>)
                                            </td>
                                            <td>{{ $flight->dpt_time }}</td>
                                            <td>{{ $flight->arr_time }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
