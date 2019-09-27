@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Koreksi @endslot
  @slot('subtitle') Koreksi Ujian Siswa @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Jawaban Siswa</h3>
      </div>
      <div class="box-body">
        @if (session('status')) 
        <div class="callout callout-success">
          <h4>Berhasil!</h4>
          <p>{{ session('status') }}</p>
        </div>
        @endif

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
                <input name="keyword" type="text" class="form-control" placeholder="Search Keterangan / Judul Ujian" value="{{ $request->keyword }}">
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
                <th width="250">Nama Siswa</th>
                <th>Judul Ujian</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            <tbody id="listitem">
              @php ($no = ($jawaban->currentPage() * $jawaban->perPage()) - ($jawaban->perPage() - 1))
              @foreach ($jawaban as $item)    
              <tr>
                <td align="center">{{ $no }}</td>
                <td>
                  <a href="#">
                    <b>{{ strtoupper($item->user->name) }}</b>
                  </a>
                </td>
                <td>{{ $item->judul_ujian }}</td>
                <td class="action">
                  <a href="{{ route('koreksi.show', ["id" => $item->id]) }}" class="btn btn-block bg-blue">
                    <i class="fa fa-edit"></i> Koreksi Essay
                  </a>
                </td>
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="4">
                  <small>page {{ $jawaban->currentPage() }} of {{ $jawaban->lastPage() }} page and total data {{ $jawaban->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $jawaban->links() }}
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection