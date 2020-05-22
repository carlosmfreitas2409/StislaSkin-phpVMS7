<div class="card">
    <div class="card-header">
        <h4>@lang('flights.search')</h4>
    </div>
    <div class="card-body">
        {{ Form::open([
              'route' => 'frontend.flights.search',
              'method' => 'GET'
        ]) }}
            <div class="form-group">
                <label>@lang('flights.flightnumber')</label>
                {{ Form::text('flight_number', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                <label>@lang('airports.departure')</label>
                {{ Form::select('dep_icao', $airports, null , ['class' => 'form-control select2']) }}
            </div>

            <div class="form-group">
                <label>@lang('airports.arrival')</label>
                {{ Form::select('arr_icao', $airports, null , ['class' => 'form-control select2']) }}
            </div>

            <div class="form-group">
                <label>@lang('common.subfleet')</label>
                {{ Form::select('subfleet_id', $subfleets, null , ['class' => 'form-control select2']) }}
            </div>

            <a href="{{ route('frontend.flights.index') }}">@lang('common.reset')</a>
            {{ Form::submit(__('common.find'), ['class' => 'btn btn-primary float-right']) }}
        {{ Form::close() }}
    </div>
</div>
