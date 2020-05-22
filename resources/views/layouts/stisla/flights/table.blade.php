@foreach($flights as $flight)
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-9">
                <h5>
                    <a class="text-c" href="{{ route('frontend.flights.show', [$flight->id]) }}">
                        @if(optional($flight->airline)->logo)
                            <img src="{{ $flight->airline->logo }}" alt="{{$flight->airline->name}}" style="max-width: 80px; width: 100%; height: auto;" />
                        @endif
                            <span style="font-weight: 700;">{{ $flight->ident }}</span>
                    </a>
                </h5>
            </div>
            <div class="col-sm-3 align-top text-right">
                {{--
                    !!! NOTE !!!
                    Don't remove the "save_flight" class, or the x-id attribute.
                    It will break the AJAX to save/delete

                    "x-saved-class" is the class to add/remove if the bid exists or not
                    If you change it, remember to change it in the in-array line as well
                --}}
                @if (!setting('pilots.only_flights_from_current') || $flight->dpt_airport_id == Auth::user()->current_airport->icao)
                    <button class="btn btn-round btn-icon btn-icon-mini save_flight {{ in_array($flight->id, $saved, true) ? 'btn-info':'' }}"
                        x-id="{{ $flight->id }}"
                        x-saved-class="btn-info"
                        type="button"
                        title="@lang('flights.addremovebid')">
                            <i class="fas fa-map-marker"></i>
                    </button>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                {{--<table class="table-condensed"></table>--}}
                <b style="font-weight: 900;">{{ strtoupper(__('flights.dep')) }} -</b>
                {{ optional($flight->dpt_airport)->name ?? $flight->dpt_airport_id }}
                (<b><a href="{{route('frontend.airports.show', ['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a></b>)
                @if($flight->dpt_time)- {{ $flight->dpt_time }} @endif
                <br />

                <b style="font-weight: 900;">{{ strtoupper(__('flights.arr')) }} -</b>
                {{ optional($flight->arr_airport)->name ?? $flight->arr_airport_id }}
                (<b><a href="{{route('frontend.airports.show', ['id' => $flight->arr_airport_id])}}">{{$flight->arr_airport_id}}</a></b>)
                @if($flight->arr_time)- {{ $flight->arr_time }}@endif
                <br />

                @if($flight->distance)
                    <b style="font-weight: 900;">{{ strtoupper(__('common.distance')) }} -</b>
                    {{ $flight->distance }} {{ setting('units.distance') }}
                @endif
                <br />
                @if($flight->level)
                    <b style="font-weight: 900;">{{ strtoupper(__('flights.level')) }} -</b>
                    {{ $flight->level }} {{ setting('units.altitude') }}
                @endif
            </div>
            <div class="col-sm-5">
                @if($flight->route)
                    <b style="font-weight: 900;">{{ strtoupper(__('flights.route')) }} -</b>
                    {{ $flight->route }}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-right">
                <div class="buttons">
                    @if ($simbrief !== false)
                        @if ($simbrief_bids === false || ($simbrief_bids === true && in_array($flight->id, $saved, true)))
                            <a href="{{ route('frontend.simbrief.generate') }}?flight_id={{ $flight->id }}" class="btn btn-outline-primary">
                                Create SimBrief Flight Plan
                            </a>
                        @endif
                    @endif

                    <a href="{{ route('frontend.pireps.create') }}?flight_id={{ $flight->id }}" class="btn btn-outline-info">
                        {{ __('pireps.newpirep') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
