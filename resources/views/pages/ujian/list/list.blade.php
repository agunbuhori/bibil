@php ($no = ($ujian->currentPage() * $ujian->perPage()) - ($ujian->perPage() - 1))
@foreach ($ujian as $item)    
<tr>
  <td align="center">{{ $no }}</td>
  <td>
    <span class="label bg-blue">Jurusan</span> : {!! Viewdata::jurusan($item->jurusan_id, 'green') !!}
    <hr style="margin-top: 5px;margin-bottom: 1px;">
    <span class="label bg-blue">Kelas &nbsp; &nbsp; &nbsp;</span> : {!! Viewdata::kelas($item->kelas_id) !!}
  </td>
  <td>
    <span class="label bg-blue">Mapel &nbsp; &nbsp; &nbsp;&nbsp;</span> : {!! Viewdata::mapel(json_encode([$item->mapel_id]), 'green') !!}
    <hr style="margin-top: 5px;margin-bottom: 1px;">
    <span class="label bg-blue">Remedial</span> : <span class="label bg-{{ $item->remedial ? 'green' : 'red' }}">{{ $item->remedial ? 'Ya' : 'Tidak' }}</span>
  </td>
  <td>{{ $item->judul_ujian }}</td>
  <td>
    <span class="label bg-blue">Mulai &nbsp;&nbsp;</span> : <span class="label bg-green">{{ date('d M Y | H:i', strtotime($item->date_start)) }}</span>
    <hr style="margin-top: 5px;margin-bottom: 1px;">
    <span class="label bg-blue">Selesai</span> : <span class="label bg-red">{{ date('d M Y | H:i', strtotime($item->date_end)) }}</span>
  </td>
  <td>
    <span class="label bg-blue">Waktu</span> : <span class="label bg-green">{{ $item->waktu }}</span>
    <hr style="margin-top: 5px;margin-bottom: 1px;">
    <span class="label bg-blue">Soal &nbsp; &nbsp;</span> : <span class="label bg-green">{{ $item->jmlh_soal }}</span>
  </td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a href="{{ route('ujian.show', ['id' => $item->id]) }}">
            <i class="fa fa-file-text"></i> Detail Ujian
          </a>
        </li>
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Ujian
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->id }})">
            <i class="fa fa-trash"></i> Delete Ujian
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
    <small>page {{ $ujian->currentPage() }} of {{ $ujian->lastPage() }} page and total data {{ $ujian->total() }}</small>
  </td>
</tr>