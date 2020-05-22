<table class="table table-striped">
    <tr>
        <td>
            {{ $field->name }}
            @if($field->required === true)
              <span class="text-danger">*</span>
            @endif
        </td>
        <td>
            <div class="form-group">
                @if(!$field->read_only)
                    {{ Form::text($field->slug, $field->value, [
                        'class' => 'form-control',
                        'readonly' => (!empty($pirep) && $pirep->read_only),
                    ]) }}
                @else
                    {{ $field->value }}
                @endif

                <div class="invalid-feedback">{{ $errors->first($field->slug) }}</div>
            </div>
        </td>
    </tr>
</table>
