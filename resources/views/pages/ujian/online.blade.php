@extends('templates.base')

@section('stylesheet')
 <style>
   .nav-daftar-ujian li {
     padding: 10px;
   }

   .btn-ujian {
     border-radius: 15px;
   }

   .title-ujian {
     font-size: 18px;
     font-weight: 400;
     margin: 10px;
     line-height: 1.4;
   }

   .widget-user-2 .widget-user-header {
     padding: 10px;
   }
 </style>
@endsection

@section('content')
  @component('components.wraper.title')
  @slot('title') Ujian Online @endslot
  @slot('subtitle') Pilih ujian online @endslot
  @endcomponent

  <section class="content">
    <div class="row">
      @foreach ($ujian as $item)
      @if (empty($item->jawabanSiswa()->id))
      <div class="col-md-4">
        <div class="box box-widget widget-user-2">
          <div class="widget-user-header bg-blue">
            <h3 class="title-ujian">{{ $item->judul_ujian }}</h3>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked nav-daftar-ujian">
              <li>Soal Pilihan Ganda {{ Auth::user()->id }}<span class="pull-right badge bg-blue">{{ $item->soal_ganda }}</span></li>
              <li>Soal Essay <span class="pull-right badge bg-aqua">{{ $item->soal_essay }}</span></li>
              <li class="text-center">
                <button type="button" class="btn btn-ujian btn-sm bg-green"
                onclick="playUjian('{{ route('ujian.play', ['id_ujian' => $item->id]) }}')">
                  <i class="fa fa-play"></i> Mulai Ujian
                </button>
                @if (!empty($item->kisi->file))
                <button type="button" class="btn btn-ujian btn-sm btn-default"
                onclick="kisikisi('{{ url('files/' . $item->kisi->file) }}')">
                  <i class="fa fa-file-text"></i> Kisi - kisi
                </button>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </section>
@endsection

@section('javascript')
  <script>
    function playUjian(url) {
      window.location.href = url
    }

    function kisikisi(url) {
      window.open(url, '_blank');
    }
  </script>
@endsection