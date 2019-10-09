@php ($no = ($ortu->currentPage() * $ortu->perPage()) - ($ortu->perPage() - 1))
@foreach ($ortu as $item) 
<tr>
    <td>{{ $no }}</td>
    <td>{{ $item->nis }}</td>
    <td>{{ $item->nama }}</td>
    <td>{{ $item->siswa->nama }}</td>
    <td class="action">
      <div class="dropdown">
        <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
          Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu animated-fast fadeIn">
          <li>
            <a href="{{ route('ortu.show', ['id' => $item->id]) }}">
              <i class="fa fa-file-text"></i> Detail ortu
            </a>
          </li>
          <li>
            <a onclick="passwordreset({{ $item->user_id }})">
              <i class="fa fa-lock"></i> Reset Password
            </a>
          </li>
          <li>
            <a onclick="edit({{ $item->id }})">
              <i class="fa fa-edit"></i> Edit ortu
            </a>
          </li>
          <li>
            <a onclick="deleted({{ $item->user_id }})">
              <i class="fa fa-trash"></i> Delete ortu
            </a>
          </li>
        </ul>
      </div>
    </td>
  </tr>
@php ($no++)
@endforeach
<tr>
  <td colspan="7">
    <small>page {{ $ortu->currentPage() }} of {{ $ortu->lastPage() }} page and total data {{ $ortu->total() }}</small>
  </td>
</tr>