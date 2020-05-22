<table>
    @foreach($pireps as $p)
        <tr>
            <th scope="row">{{ $p->airline->code }}{{ $p->ident }}</th>
            <td>
                &nbsp;|&nbsp;
                <a href="{{route('frontend.airports.show', [$p->dpt_airport_id])}}">{{$p->dpt_airport_id}}</a>
                &nbsp;-&nbsp;
                <a href="{{route('frontend.airports.show', [$p->arr_airport_id])}}">{{$p->arr_airport_id}}</a>
                &nbsp;|&nbsp;
                @if($p->aircraft)
                    {{ $p->aircraft->name }}
                @endif
            </td>
        </tr>
    @endforeach
</table>
