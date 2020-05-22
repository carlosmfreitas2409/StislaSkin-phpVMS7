@if($aircraft)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><i class="fas fa-ellipsis-h"></i>
                {{ trans_choice('pireps.fare', 2) }}
            </li>
        </ol>
    </nav>

    <div class="form-group">
        @foreach($aircraft->subfleet->fares as $fare)
        {{Form::label('fare_'.$fare->id, $fare->name.' ('. \App\Models\Enums\FareType::label($fare->type).', code '.$fare->code.')')}}
        {{ Form::number('fare_'.$fare->id, null, ['class' => 'form-control', 'min' => 0]) }}
        @endforeach
    </div>
@endif
