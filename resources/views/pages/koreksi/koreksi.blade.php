@extends('templates.base')

@section('stylesheet')
    <style>
      .slick-disabled {
        display: none !important;
      }
      .btn-selesai {
        display: none;
      }
    </style>
@endsection

@section('content')
  @component('components.wraper.title')
  @slot('title') Koreksi Jawaban @endslot
  @slot('subtitle') {{ $jawaban->user->name }} @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <form name="koreksi" action="{{ route('koreksi.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $jawaban->id }}">
        <div class="box-body slide-koreksi">
          @foreach ($detail as $item)
          <div class="row slide-jawaban">
            <input type="hidden" name="jawaban[{{ $item->id }}]" id="jawaban" value="0">
            <div class="col-md-12">
              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Jawaban Siswa</h3>
                </div>
                <div class="box-body">
                  {!! $item->jawaban_essay !!}
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Kunci Jawaban</h3>
                </div>
                <div class="box-body">
                  {!! $item->soal->kunci !!}
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-md-3">
              <button type="button" class="btn bg-blue btn-previous pull-left">
                <i class="fa fa-angle-double-left"></i> Previous
              </button>
            </div>
            <div class="col-md-6 text-center">
              <button type="button" class="btn bg-green btn-benar">
                <input type="checkbox" id="benar">
                Benar
              </button>
              <button type="button" class="btn bg-red btn-salah">
                <input type="checkbox" id="salah" checked>
                Salah
              </button>
            </div>
            <div class="col-md-3">
              <button type="button" class="btn bg-blue btn-next pull-right">
                Next <i class="fa fa-angle-double-right"></i>
              </button>
              <button type="button" class="btn bg-green btn-selesai pull-right">
                <i class="fa fa-check"></i> Selesai
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>

  </section>
@endsection

@section('javascript')
  <script>
    var formNow = '';
    (function() {
      window.formNow = $('.row.slide-jawaban:nth-child(1)');

      $('.slide-koreksi').slick({
        dots: false,
        infinite: false,
        speed: 100,
        fade: true,
        swipe: false,
        cssEase: 'linear',
        adaptiveHeight: true,
        prevArrow: $('.btn-previous'),
        nextArrow: $('.btn-next')
      })
    })()

    $('.slide-koreksi').on('afterChange', function(event, slick, currentSlide, nextSlide){
      let form     = $(slick.$slides[currentSlide]),
          jawaban  = form.find('#jawaban').val(),
          btnBenar = $('.btn-benar').find('input:checkbox'),
          btnSalah = $('.btn-salah').find('input:checkbox')

      if (jawaban == 1) {
        btnBenar.prop('checked', true)
        btnSalah.prop('checked', false)
      } else {
        btnBenar.prop('checked', false)
        btnSalah.prop('checked', true)
      }

      window.formNow = form

      // show button selesai
      if (slick.slideCount - 1 == currentSlide) {
          $('.btn-next').hide()
          $('.btn-selesai').show()
      } else {
          $('.btn-next').show()
          $('.btn-selesai').hide()
      }
    })

    $('.btn-benar').on('click', function() {
      let benar = $(this).find('input:checkbox'),
          salah = $('.btn-salah').find('input:checkbox')

      benar.prop('checked', true)
      salah.prop('checked', false)
      
      window.formNow.find('#jawaban').val(1)
    })

    $('.btn-salah').on('click', function() {
      let salah = $(this).find('input:checkbox'),
          benar = $('.btn-benar').find('input:checkbox')

      salah.prop('checked', true)
      benar.prop('checked', false)
      
      window.formNow.find('#jawaban').val(0)
    })

    $('.btn-selesai').on('click', function() {
      $('form[name="koreksi"]').submit()
    })
  </script>
@endsection