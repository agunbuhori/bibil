@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Mata Pelajaran @endslot
  @slot('subtitle') @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Mata Pelajaran</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <form action="{{ url()->current() }}" method="get">
            <div class="col-sm-1">
              <select name="limit" id="show" class="form-control input-sm">
                <option {{ ($request->limit == 5) ? 'selected' : '' }} value="5">5</option>
                <option {{ ($request->limit == 10) ? 'selected' : '' }} value="10">10</option>
                <option {{ ($request->limit == 25) ? 'selected' : '' }} value="25">25</option>
                <option {{ ($request->limit == 50) ? 'selected' : '' }} value="50">50</option>
                <option {{ ($request->limit == 100) ? 'selected' : '' }} value="100">100</option>
              </select>
            </div>
            <div class="col-sm-8" style="margin-bottom:35px"></div>
            <div class="col-sm-3">
              <div class="input-group input-group-sm">
                <input name="keyword" type="text" class="form-control" placeholder="Search" value="{{ $request->keyword }}">
                <span class="input-group-btn">
                  <button type="submit" class="btn bg-blue btn-flat">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </div>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-list">
            <thead class="bg-blue">
              <tr>
                <th width="35">No</th>
                <th width="70">Jenjang</th>
                <th width="70">Jurusan</th>
                <th width="200">Nama Mapel</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody id="listitem">
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
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="5">
                  <small>page {{ $mapel->currentPage() }} of {{ $mapel->lastPage() }} page and total data {{ $mapel->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $mapel->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection