@php ($no = ($siswa->currentPage() * $siswa->perPage()) - ($siswa->perPage() - 1))
@foreach ($siswa as $item) 
<tr>
  <td>{{ $no }}</td>
  <td>{{ $item->nama }}</td>
  <td>{{ $item->user->email }}</td>
  <td align="center">{{ $item->kelamin }}</td>
  <td class="column-label">
    <span class="label bg-green">{{ $item->user->username }}</span>  
  </td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a href="{{ route('siswa.show', ['id' => $item->id]) }}">
            <i class="fa fa-file-text"></i> Detail Siswa
          </a>
        </li>
        <li>
          <a onclick="passwordreset({{ $item->user_id }})">
            <i class="fa fa-lock"></i> Reset Password
          </a>
        </li>
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Siswa
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->user_id }})">
            <i class="fa fa-trash"></i> Delete Siswa
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
    <small>page {{ $siswa->currentPage() }} of {{ $siswa->lastPage() }} page and total data {{ $siswa->total() }}</small>
  </td>
</tr>