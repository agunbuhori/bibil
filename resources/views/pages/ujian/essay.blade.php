<div class="tab-pane" id="soal-essay">
  <div class="row">
    <form action="{{ route('soal.index') }}" method="get" data-search="essay">
      <input type="hidden" name="ujian_id" value="{{ $ujian->id }}">
      <input type="hidden" name="jenis" value="essay">
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
          data-toggle="modal" data-target="#form-soal" onclick="addSoal('essay')"">
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
              <th>Soal Essay</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody id="listitem-essay">
            @php ($no = ($essay->currentPage() * $essay->perPage()) - ($essay->perPage() - 1))
            @foreach ($essay as $item)
            <tr>
              <td align="center">{{ $no }}</td>
              <td>{!! $item->soal !!}</td>
              <td class="action">
                <div class="dropdown">
                  <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu animated-fast fadeIn">
                    <li>
                      <a onclick="edit({{ $item->id }}, 'essay')">
                        <i class="fa fa-edit"></i> Edit Soal
                      </a>
                    </li>
                    <li>
                      <a onclick="deleted({{ $item->id }}, 'essay', {{ $item->ujian_id }})">
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
                <small>page {{ $essay->currentPage() }} of {{ $essay->lastPage() }} page and total data {{ $essay->total() }}</small>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="text-align:right">
          {{ $essay->links() }}
        </div>
      </div>
    </div>
  </div>
</div>