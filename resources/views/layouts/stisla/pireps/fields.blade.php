{{--

NOTE ABOUT THIS VIEW

The fields that are marked "read-only", make sure the read-only status doesn't change!
If you make those fields editable, after they're in a read-only state, it can have
an impact on your stats and financials, and will require a recalculation of all the
flight reports that have been filed. You've been warned!

--}}

@if(!empty($pirep) && $pirep->read_only)
    <div class="col-md-12">
        @component('components.info')
            @lang('pireps.fieldsreadonly')
        @endcomponent
    </div>
@endif

<div class="col-lg-8 col-md-12 col-12 col-sm-12">
    <div class="card card-primary">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fas fa-info-circle"></i>
                        @lang('pireps.flightinformations')
                    </li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('airline_id', __('common.airline')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->airline->name }}" readonly>
                            {{ Form::hidden('airline_id') }}
                        @else
                            {{ Form::select('airline_id', $airline_list, null, [
                                'class' => 'custom-select select2',
                                'style' => 'width: 100%',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">
                                {{ $errors->first('airline_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{ Form::label('flight_number', __('pireps.flightident')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->ident }}" readonly>
                            {{ Form::hidden('flight_number') }}
                            {{ Form::hidden('flight_code') }}
                            {{ Form::hidden('flight_leg') }}
                        @else
                            <div class="input-group">
                                {{ Form::text('flight_number', null, [
                                    'placeholder' => __('flights.flightnumber'),
                                    'class' => 'form-control',
                                    'readonly' => (!empty($pirep) && $pirep->read_only),
                                ]) }}
                                {{ Form::text('route_code', null, [
                                    'placeholder' => __('pireps.codeoptional'),
                                    'class' => 'form-control',
                                    'readonly' => (!empty($pirep) && $pirep->read_only),
                                ]) }}
                                {{ Form::text('route_leg', null, [
                                    'placeholder' => __('pireps.legoptional'),
                                    'class' => 'form-control',
                                    'readonly' => (!empty($pirep) && $pirep->read_only),
                                ]) }}
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('flight_number') }}
                                {{ $errors->first('route_code') }}
                                {{ $errors->first('route_leg') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {{ Form::label('flight_type', __('flights.flighttype')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ \App\Models\Enums\FlightType::label($pirep->flight_type) }}" readonly>
                            {{ Form::hidden('flight_type') }}
                        @else
                            <div class="form-group">
                                {{ Form::select('flight_type',
                                    \App\Models\Enums\FlightType::select(), null, [
                                        'class' => 'custom-select select2',
                                        'style' => 'width: 100%',
                                        'readonly' => (!empty($pirep) && $pirep->read_only),
                                    ])
                                }}
                            </div>
                            <div class="invalid-feedback">{{ $errors->first('flight_type') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {{ Form::label('hours', __('flights.flighttime')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $pirep->hours.' '.trans_choice('common.hour', $pirep->hours) }}" readonly>
                                <input type="text" class="form-control" value="{{ $pirep->minutes.' '.trans_choice('common.minute', $pirep->minutes) }}" readonly>
                                {{ Form::hidden('hours') }}
                                {{ Form::hidden('minutes') }}
                            </div>
                        @else
                            <div class="input-group">
                                {{ Form::number('hours', null, [
                                    'class' => 'form-control',
                                    'placeholder' => trans_choice('common.hour', 2),
                                    'min' => '0',
                                    'readonly' => (!empty($pirep) && $pirep->read_only),
                                ]) }}

                                {{ Form::number('minutes', null, [
                                    'class' => 'form-control',
                                    'placeholder' => trans_choice('common.minute', 2),
                                    'min' => 0,
                                    'readonly' => (!empty($pirep) && $pirep->read_only),
                                ]) }}
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('hours') }}
                                {{ $errors->first('minutes') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {{ Form::label('level', __('flights.level')) }} ({{config('phpvms.internal_units.altitude')}})
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->level }}" readonly>
                        @else
                            {{ Form::number('level', null, [
                                'class' => 'form-control',
                                'min' => '0',
                                'step' => '0.01',
                                'placeholder' => 'Example: 35000',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">{{ $errors->first('level') }}</div>
                        @endif
                    </div>
                </div>
            </div>


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fas fa-globe"></i>
                        @lang('pireps.deparrinformations')
                    </li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {{ Form::label('dpt_airport_id', __('airports.departure')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->dpt_airport->name }} ({{$pirep->dpt_airport->icao}})" readonly>
                            {{ Form::hidden('dpt_airport_id') }}
                        @else
                            {{ Form::select('dpt_airport_id', $airport_list, null, [
                                'class' => 'custom-select select2',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">{{ $errors->first('dpt_airport_id') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        {{ Form::label('arr_airport_id', __('airports.arrival')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->arr_airport->name }} ({{$pirep->arr_airport->icao}})" readonly>
                            {{ Form::hidden('arr_airport_id') }}
                        @else
                            {{ Form::select('arr_airport_id', $airport_list, null, [
                                'class' => 'custom-select select2',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">{{ $errors->first('arr_airport_id') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fab fa-avianex"></i>
                        @lang('pireps.aircraftinformations')
                    </li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        {{ Form::label('aircraft_id', __('common.aircraft')) }}
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->aircraft->name }}" readonly>
                            {{ Form::hidden('aircraft_id') }}
                        @else
                            {{-- You probably don't want to change this ID if you want the fare select to work --}}
                            {{ Form::select('aircraft_id', $aircraft_list, null, [
                                'id' => 'aircraft_select',
                                'class' => 'custom-select select2',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">{{ $errors->first('aircraft_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {{ Form::label('block_fuel', __('pireps.block_fuel')) }} ({{setting('units.fuel')}})
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->block_fuel }}" readonly>
                        @else
                            {{ Form::number('block_fuel', null, [
                                'class' => 'form-control',
                                'min' => '0',
                                'step' => '0.01',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">{{ $errors->first('block_fuel') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {{ Form::label('fuel_used', __('pireps.fuel_used')) }} ({{setting('units.fuel')}})
                        @if(!empty($pirep) && $pirep->read_only)
                            <input type="text" class="form-control" value="{{ $pirep->fuel_used }}" readonly>
                        @else
                            {{ Form::number('fuel_used', null, [
                                'class' => 'form-control',
                                'min' => '0',
                                'step' => '0.01',
                                'readonly' => (!empty($pirep) && $pirep->read_only),
                            ]) }}
                            <div class="invalid-feedback">{{ $errors->first('fuel_used') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            @include('pireps.fares')

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fas fa-route"></i>
                        @lang('flights.route')
                    </li>
                </ol>
            </nav>

            <div class="form-group">
                {{ Form::textarea('route', null, [
                    'class' => 'form-control',
                    'placeholder' => __('flights.route'),
                    'readonly' => (!empty($pirep) && $pirep->read_only),
                ]) }}
                <div class="invalid-feedback">{{ $errors->first('route') }}</div>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="far fa-comments"></i>
                        {{ trans_choice('common.remark', 2) }}
                    </li>
                </ol>
            </nav>

            <div class="form-group">
                {{ Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => trans_choice('common.note', 2)]) }}
                <div class="invalid-feedback">{{ $errors->first('notes') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card card-primary">
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><i class="fab fa-wpforms"></i>
                        {{ trans_choice('common.field', 2) }}
                    </li>
                </ol>
            </nav>

            @if(isset($pirep) && $pirep->fields)
                @each('pireps.custom_fields', $pirep->fields, 'field')
            @else
                @each('pireps.custom_fields', $pirep_fields, 'field')
            @endif
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-body">
            <div class="buttons">
                {{ Form::hidden('flight_id') }}
                {{ Form::hidden('sb_id', $simbrief_id) }}

                @if(isset($pirep) && !$pirep->read_only)
                    {{ Form::button(__('pireps.deletepirep'), [
                        'name' => 'submit',
                        'value' => 'Delete',
                        'class' => 'btn btn-danger',
                        'type' => 'submit'])
                    }}
                @endif

                {{ Form::button(__('pireps.savepirep'), [
                    'name' => 'submit',
                    'value' => 'Save',
                    'class' => 'btn btn-info',
                    'type' => 'submit'])
                }}

                @if(!isset($pirep) || (filled($pirep) && !$pirep->read_only))
                    {{ Form::button(__('pireps.submitpirep'), [
                        'name' => 'submit',
                        'value' => 'Submit',
                        'class' => 'btn btn-primary',
                        'type' => 'submit'])
                    }}
                @endif
            </div>
        </div>
    </div>
</div>
