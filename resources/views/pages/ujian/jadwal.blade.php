@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Jadwal Ujian @endslot
  @slot('subtitle')  @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Jadwal</h3>
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
                <th>Jurusan / Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Judul Ujian</th>
                <th>Mulai / Selesai</th>
                <th>Waktu / Soal</th>
              </tr>
            </thead>
            <tbody id="listitem">
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
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="8">
                  <small>page {{ $ujian->currentPage() }} of {{ $ujian->lastPage() }} page and total data {{ $ujian->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $ujian->links() }}
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection