@extends('app')
@section('title', 'Briefing')

@section('content')
    <div class="section-header">
        <h1>Briefing - {{ $simbrief->xml->general->icao_airline }}{{ $simbrief->xml->general->flight_number }} | {{ $simbrief->xml->origin->icao_code }} - {{ $simbrief->xml->destination->icao_code }}</h1>

        @if (empty($simbrief->pirep_id))
        <div class="section-header-button">
            <a href="{{ url(route('frontend.simbrief.prefile', [$simbrief->id])) }}" class="btn btn-primary">
                @lang('stisla.prefile')</a>
        </div>
        @endif
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a></div>
            <div class="breadcrumb-item"><a href="{{ route('frontend.flights.index') }}">{{ trans_choice('common.flight', 2) }}</a></div>
            <div class="breadcrumb-item">{{ $simbrief->xml->general->icao_airline }}{{ $simbrief->xml->general->flight_number }} Briefing</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="fas fa-info-circle"></i>
                                @lang('stisla.dispatch')
                            </li>
                        </ol>
                    </nav>

                    <div class="row">
                        <div class="col-4 text-center">
                            <div>
                                <p class="small text-uppercase pb-sm-0 mb-sm-1">{{ trans_choice('common.flight', 1) }}</p>
                                <p class="border border-dark rounded p-1 small text-monospace">
                                    {{ $simbrief->xml->general->icao_airline }}{{ $simbrief->xml->general->flight_number }}</p>
                            </div>
                        </div>

                        <div class="col-4 text-center">
                            <div>
                                <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('common.departure')</p>
                                <p class="border border-dark rounded p-1 small text-monospace">
                                    {{ $simbrief->xml->origin->icao_code }}
                                    @if(!empty($simbrief->xml->origin->plan_rwy)) / {{ $simbrief->xml->origin->plan_rwy }} @endif
                                </p>
                            </div>
                        </div>

                        <div class="col-4 text-center">
                            <div>
                                <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('common.arrival')</p>
                                <p class="border border-dark rounded p-1 small text-monospace">
                                    {{ $simbrief->xml->destination->icao_code }}
                                    @if(!empty($simbrief->xml->destination->plan_rwy)) / {{ $simbrief->xml->destination->plan_rwy }}@endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-4 text-center">
                            <div>
                                <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('common.aircraft')</p>
                                <p class="border border-dark rounded p-1 small text-monospace">
                                    {{ $simbrief->xml->aircraft->name }}
                                </p>
                            </div>
                        </div>

                        <div class="col-4 text-center">
                            <div>
                                <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('stisla.enroute')</p>
                                <p class="border border-dark rounded p-1 small text-monospace">
                                    @minutestotime($simbrief->xml->times->sched_time_enroute / 60)
                                </p>
                            </div>
                        </div>

                        <div class="col-4 text-center">
                            <div>
                                <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('stisla.cruise')</p>
                                <p class="border border-dark rounded p-1 small text-monospace">
                                    {{ $simbrief->xml->general->initial_altitude }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr />

                    @if (!empty($simbrief->xml->general->dx_rmk))
                        <div>
                            <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('stisla.dispatcher')</p>
                            <p class="border border-dark rounded p-1 small text-monospace">{{ $simbrief->xml->general->dx_rmk  }}</p>
                        </div>
                    @endif

                    @if (!empty($simbrief->xml->general->sys_rmk))
                        <div>
                            <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('stisla.systemrmks')</p>
                            <p class="border border-dark rounded p-1 small text-monospace">{{ $simbrief->xml->general->sys_rmk  }}</p>
                        </div>
                    @endif

                    <nav aria-label="breadcrumb" style="margin-top: 30px;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="fas fa-plane"></i>
                                @lang('stisla.flightplan')
                            </li>
                        </ol>
                    </nav>

                    <p class="border border-dark rounded p-1 small text-monospace">
                        {!!  str_replace("\n", "<br>", $simbrief->xml->atc->flightplan_text) !!}
                    </p>

                    <nav aria-label="breadcrumb" style="margin-top: 30px;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="fas fa-cloud-moon-rain"></i>
                                @lang('stisla.weather')
                            </li>
                        </ol>
                    </nav>

                    <div>
                        <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('common.departure') @lang('common.metar')</p>
                        <p class="border border-dark rounded p-1 small text-monospace">{{ $simbrief->xml->weather->orig_metar }}</p>
                    </div>

                    <hr/>

                    <div>
                        <p class="small text-uppercase pb-sm-0 mb-sm-1">@lang('common.arrival') @lang('common.metar')</p>
                        <p class="border border-dark rounded p-1 small text-monospace">{{  $simbrief->xml->weather->dest_metar }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="fas fa-download"></i>
                                @lang('stisla.downloadplan')
                            </li>
                        </ol>
                    </nav>

                    <div class="form-group">
                        <select id="download_fms_select" class="form-control select2">
                            @foreach($simbrief->files as $fms)
                                <option value="{{ $fms['url'] }}">{{ $fms['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input id="download_fms" type="submit" class="btn btn-primary float-right" value="Download"/>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="fas fa-file-pdf"></i>
                                OFP
                            </li>
                        </ol>
                    </nav>

                    <div id="top-5-scroll" style="border-radius: 1px solid red;">
                        {!! $simbrief->xml->text->plan_html !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><i class="fas fa-map"></i>
                                @lang('stisla.flightmap')
                            </li>
                        </ol>
                    </nav>

                    @foreach($simbrief->images->chunk(2) as $images)
                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-6 text-center">
                                    <h6>{{ $image['name'] }}</h6>
                                    <p>
                                        <img style="height: 540px;" src="{{ $image['url'] }}" alt="{{ $image['name'] }}"/>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        if($("#top-5-scroll").length) {
            $("#top-5-scroll").css({
                height: 700
            }).niceScroll();
        }

        $("#download_fms").click(e => {
            e.preventDefault();
            const select = document.getElementById("download_fms_select");
            const link = select.options[select.selectedIndex].value;
            console.log('Downloading FMS: ', link);
            window.open(link, '_blank');
        });
    });
</script>
@endsection
