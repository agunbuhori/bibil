@php ($no = ($guru->currentPage() * $guru->perPage()) - ($guru->perPage() - 1))
@foreach ($guru as $item) 
<tr>
  <td>{{ $no }}</td>
  <td>{{ $item->nama }}</td>
  <td>{{ "" }}</td>
  <td align="center">{{ $item->kelamin }}</td>
  <td class="column-label">
    <span class="label bg-green">{{ $item->user->username }}</span>  
  </td>
  <td class="column-label">
    {!! Viewdata::mapel($item->mapel) !!}
  </td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a href="{{ route('guru.show', ['id' => $item->id]) }}">
            <i class="fa fa-file-text"></i> Detail Guru
          </a>
        </li>
        <li>
          <a onclick="passwordreset({{ $item->user_id }})">
            <i class="fa fa-lock"></i> Reset Password
          </a>
        </li>
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Guru
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->user_id }})">
            <i class="fa fa-trash"></i> Delete Guru
          </a>
        </li>
      </ul>
    </div>
  </td>
</tr>
@php ($no++)
@endforeach
<tr>
  <td colspan="8">
    <small>page {{ $guru->currentPage() }} of {{ $guru->lastPage() }} page and total data {{ $guru->total() }}</small>
  </td>
</tr>