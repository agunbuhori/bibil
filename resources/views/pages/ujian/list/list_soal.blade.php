@php ($no = ($soal->currentPage() * $soal->perPage()) - ($soal->perPage() - 1))
@foreach ($soal as $item)
<tr>
  <td align="center">{{ $no }}</td>
  <td>{!! $item->soal !!}</td>
  @if ($jenis === 'ganda')
  <td align="center">
    <span class="label bg-green">{{ strtoupper($item->kunci) }}</span>
  </td>
  @endif
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a onclick="edit({{ $item->id }}, '{{ $jenis }}')">
            <i class="fa fa-edit"></i> Edit Soal
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->id }}, '{{ $jenis }}', {{ $item->ujian_id }})">
            <i class="fa fa-trash"></i> Delete Soal
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
    <small>page {{ $soal->currentPage() }} of {{ $soal->lastPage() }} page and total data {{ $soal->total() }}</small>
  </td>
</tr>
@if ($soal->total() > $soal->perPage())
<tr>
  <td colspan="4" style="text-align:right">
    {{ $soal->links() }}
  </td>
</tr>
@endif