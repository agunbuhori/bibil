@php ($no = ($kisi->currentPage() * $kisi->perPage()) - ($kisi->perPage() - 1))
@foreach ($kisi as $item)    
<tr>
  <td align="center">{{ $no }}</td>
  <td>{{ $item->judul }}</td>
  <td class="action">
    <a href="{{ url('files/' . $item->file) }}" target="_blank" class="btn bg-green btn-block btn-sm btn-flat">
      <i class="download"></i> Download
    </a>
  </td>
  <td class="action">
    <div class="dropdown">
      <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu animated-fast fadeIn">
        <li>
          <a onclick="edit({{ $item->id }})">
            <i class="fa fa-edit"></i> Edit Kisi - Kisi
          </a>
        </li>
        <li>
          <a onclick="deleted({{ $item->id }})">
            <i class="fa fa-trash"></i> Delete Kisi - Kisi
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
    <small>page {{ $kisi->currentPage() }} of {{ $kisi->lastPage() }} page and total data {{ $kisi->total() }}</small>
  </td>
</tr>