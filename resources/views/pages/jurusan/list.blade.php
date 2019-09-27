@php ($no = ($jurusan->currentPage() * $jurusan->perPage()) - ($jurusan->perPage() - 1))
@foreach ($jurusan as $item)    
<tr>
  <td align="center">{{ $no }}</td>
  <td align="center">
    <span class="label bg-blue">{{ $item->singkatan }}</span>
  </td>
  <td>{{ $item->nama_jurusan }}</td>
  <td>{{ $item->keterangan }}</td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Jurusan
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->id }})">
            <i class="fa fa-trash"></i> Delete Jurusan
          </a>
        </li>
      </ul>
    </div>
  </td>
</tr>
@php ($no++)
@endforeach
<tr>
  <td colspan="4">
    <small>page {{ $jurusan->currentPage() }} of {{ $jurusan->lastPage() }} page and total data {{ $jurusan->total() }}</small>
  </td>
</tr>