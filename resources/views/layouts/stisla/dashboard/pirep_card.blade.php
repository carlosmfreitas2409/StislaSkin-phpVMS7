<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>{{ trans_choice('common.flight', 1) }}</th>
                <th>@lang('common.departure')</th>
                <th>@lang('common.arrival')</th>
                <th>@lang('flights.flighttime')</th>
                <th>@lang('common.status')</th>
                <th>@lang('pireps.submitted')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="{{ route('frontend.pireps.show', [$pirep->id]) }}">{{ $pirep->airline->code }}{{ $pirep->ident }}</a></td>
                <td><a href="{{route('frontend.airports.show', ['id' => $pirep->dpt_airport->icao])}}">{{$pirep->dpt_airport->icao}}</a></td>
                <td><a href="{{route('frontend.airports.show', ['id' => $pirep->arr_airport->icao])}}">{{$pirep->arr_airport->icao}}</a></td>
                <td>@minutestotime($pirep->flight_time)</td>
                <td>
                    @php
                        $color = 'badge-info';
                        if($pirep->state === PirepState::PENDING) {
                            $color = 'badge-warning';
                        } elseif ($pirep->state === PirepState::ACCEPTED) {
                            $color = 'badge-success';
                        } elseif ($pirep->state === PirepState::REJECTED) {
                            $color = 'badge-danger';
                        }
                    @endphp
                    <div class="badge {{ $color }}">{{ PirepState::label($pirep->state) }}</div>
                </td>
                <td>
                    @if(filled($pirep->submitted_at))
                        {{ $pirep->submitted_at->diffForHumans() }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('frontend.pireps.edit', [$pirep->id]) }}" class="btn btn-sm btn-info">@lang('common.edit')</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
