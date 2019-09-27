<div class="tab-pane" id="soal-pilihan-ganda">
  <div class="row">
    <form action="{{ route('soal.index') }}" method="get" data-search="ganda">
      <input type="hidden" name="ujian_id" value="{{ $ujian->id }}">
      <input type="hidden" name="jenis" value="ganda">
      <div class="col-sm-1">
        <select name="limit" id="show" class="form-control input-sm">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      <div class="col-sm-3">
        <div class="input-group input-group-sm">
          <input name="keyword" type="text" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button type="submit" class="btn bg-blue btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
      <div class="col-sm-8" style="margin-bottom:5px">
        <button type="button" class="btn bg-blue btn-sm pull-right"
          data-toggle="modal" data-target="#form-soal" onclick="addSoal('ganda')">
          <i class="fa fa-plus-circle"></i> Tambah
        </button>
      </div>
    </form>
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-list">
          <thead class="bg-blue">
            <tr>
              <th width="35">No</th>
              <th>Soal Pilihan Ganda</th>
              <th width="50">
                <center><i class="fa fa-key"></i></center>
              </th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody id="listitem-ganda">
            @php ($no = ($ganda->currentPage() * $ganda->perPage()) - ($ganda->perPage() - 1))
            @foreach ($ganda as $item)
            <tr>
              <td align="center">{{ $no }}</td>
              <td>{!! $item->soal !!}</td>
              <td align="center">
                <span class="label bg-green">{{ strtoupper($item->kunci) }}</span>
              </td>
              <td class="action">
                <div class="dropdown">
                  <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu animated-fast fadeIn">
                    <li>
                      <a onclick="edit({{ $item->id }}, 'ganda')">
                        <i class="fa fa-edit"></i> Edit Soal
                      </a>
                    </li>
                    <li>
                      <a onclick="deleted({{ $item->id }}, 'ganda', {{ $item->ujian_id }})">
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
                <small>page {{ $ganda->currentPage() }} of {{ $ganda->lastPage() }} page and total data {{ $ganda->total() }}</small>
              </td>
            </tr>
            @if ($ganda->total() > $ganda->perPage())
            <tr>
              <td colspan="4" style="text-align:right">
                {{ $ganda->links() }}
              </td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>