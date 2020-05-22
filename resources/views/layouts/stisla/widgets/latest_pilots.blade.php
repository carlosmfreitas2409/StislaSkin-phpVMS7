@foreach($users as $u)
<tr>
    <td style="padding-right: 10px;">
      <b>{{ $u->ident }} -</b>
    </td>
    <td>{{ $u->name_private }}</td>
</tr>
@endforeach
