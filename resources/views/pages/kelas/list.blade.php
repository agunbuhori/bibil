@php ($no = ($kelas->currentPage() * $kelas->perPage()) - ($kelas->perPage() - 1))
@foreach ($kelas as $item)    
<tr>
  <td align="center">{{ $no }}</td>
  <td align="center">
    <span class="label bg-green">
      {{ $item->jenjang }}
    </span>
  </td>
  <td align="center">
    {!! Viewdata::jurusan($item->jurusan_id) !!}
  </td>
  <td>{{ $item->nama_kelas }}</td>
  <td>{{ $item->keterangan }}</td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Kelas
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->id }})">
            <i class="fa fa-trash"></i> Delete Kelas
          </a>
        </li>
      </ul>
    </div>
  </td>
</tr>
@php ($no++)
@endforeach
<tr>
  <td colspan="5">
    <small>page {{ $kelas->currentPage() }} of {{ $kelas->lastPage() }} page and total data {{ $kelas->total() }}</small>
  </td>
</tr>