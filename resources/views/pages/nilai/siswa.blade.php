@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Nilai @endslot
  @slot('subtitle') @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Nilai</h3>
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
                <th>Nama Ujian</th>
                <th width="150">Ganda</th>
                <th width="150">Essay</th>
                <th width="70">Nilai</th>
              </tr>
            </thead>
            <tbody id="listitem">
              @php ($no = ($nilai->currentPage() * $nilai->perPage()) - ($nilai->perPage() - 1))
              @foreach ($nilai as $item)    
              <tr>
                <td align="center">{{ $no }}</td>
                <td>
                  <b>{{ strtoupper($item->judul_ujian) }}</b>
                </td>
                <td align="center">
                  <span class="label bg-green">{{ $item->soal_ganda_benar }} benar</span>
                  <span class="label bg-red">{{ $item->ujian->soal_ganda - $item->soal_ganda_benar }} salah</span>
                </td>
                <td align="center">
                  <span class="label bg-green">{{ $item->soal_essay_benar }} benar</span>
                  <span class="label bg-red">{{ $item->ujian->soal_essay - $item->soal_essay_benar }} salah</span>
                </td>
                <td align="center">
                  @php($jumlah = $item->soal_ganda_benar + ($item->soal_essay_benar * 2))
                  @php($param  = $item->ujian->soal_ganda + ($item->ujian->soal_essay * 2))
                  <span class="label bg-blue">{{ number_format((float) $jumlah * 100 / $param, 2, '.', '') }}</span>
                </td>
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="5">
                  <small>page {{ $nilai->currentPage() }} of {{ $nilai->lastPage() }} page and total data {{ $nilai->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $nilai->links() }}
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection