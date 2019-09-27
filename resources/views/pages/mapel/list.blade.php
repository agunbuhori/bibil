@php ($no = ($mapel->currentPage() * $mapel->perPage()) - ($mapel->perPage() - 1))
@foreach ($mapel as $item)    
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
  <td>{{ $item->nama_mapel }}</td>
  <td>{{ $item->keterangan }}</td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Mapel
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->id }})">
            <i class="fa fa-trash"></i> Delete Mapel
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
    <small>page {{ $mapel->currentPage() }} of {{ $mapel->lastPage() }} page and total data {{ $mapel->total() }}</small>
  </td>
</tr>