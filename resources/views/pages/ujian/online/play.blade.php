@extends('templates.ujian')

@section('content')
<nav class="navbar navbar-soal navbar-fixed-top" style="display: none">
  <div class="box">
    
    <!-- HEADER BOX -->
    <div class="box-header">
      <div class="container">
        <div class="pull-left">
          <h3>SOAL NO</h3>
          <h3 class="nomor">1</h3>
        </div>
        <div class="pull-right">
          <h3 class="sisa-waktu">Sisa Waktu</h3>
          <h3 class="waktu">01:56</h3>
        </div>
      </div>
    </div>
    <!-- END HEADER BOX -->

  </div>
</nav>

<section class="site-content">
  <div class="container">
    <div class="box">
      
      <!-- HEADER BOX -->
      <div class="box-header">
        <div class="pull-left">
          <h3>SOAL NO</h3>
          <h3 class="nomor">1</h3>
        </div>
        <div class="pull-right">
          <h3 class="sisa-waktu">Sisa Waktu</h3>
          <h3 class="waktu">00:00</h3>
        </div>
      </div>
      <!-- END HEADER BOX -->

      <!-- FONT BOX -->
      <div class="box-font">
        <table class="ukuran-font">
          <tr>
            <td>Ukuran font soal</td>
            <td width="10">:</td>
            <td width="25">
              <a href="#" class="text-12" onclick="sizeFont(this, 12)">A</a>
            </td>
            <td width="25">
              <a href="#" class="text-14 active" onclick="sizeFont(this, 14)">A</a>
            </td>
            <td width="25">
              <a href="#" class="text-16" onclick="sizeFont(this, 16)">A</a>
            </td>
          </tr>
        </table>
      </div>
      <!-- END FONT BOX -->

      <!-- SOAL BOX -->
      <div class="box-body">
        @php($ragu = '')
        @foreach ($ganda as $item)
        @if ($loop->first AND $item->jawaban['ragu']) @php($ragu = 'checked') @endif
        <form name="soal-ganda-{{ $item->id }}" data-remote="{{ $item->id }}" data-jenis="ganda">
          <input type="hidden" name="jawaban_id" value="{{ $jawaban->id }}">
          <input type="hidden" name="soal_id" value="{{ $item->id }}">
          <input type="hidden" name="jenis_soal" value="ganda">
          <input type="hidden" name="ragu" value="{{ $item->jawaban['ragu'] ?? '0' }}">
          <div class="box-soal">
            <div class="soal">
              {!! $item->soal !!}
            </div>
            <div class="jawaban">
              <table>
                <tr>
                  <td width="40" class="pilihan">
                    <label class="jawaban-container">
                      <input name="jawaban_ganda" type="radio" class="radio-jawaban" value="a" {{ $item->jawaban['jawaban_ganda'] == 'a' ? 'checked' : ''}}>
                      <div class="jawaban-checkmark">
                        <div>A</div>
                      </div>
                    </label>
                  </td>
                  <td>
                    {!! $item->a !!}
                  </td>
                </tr>
                <tr>
                  <td width="40" class="pilihan">
                    <label class="jawaban-container">
                      <input name="jawaban_ganda" type="radio" class="radio-jawaban" value="b" {{ $item->jawaban['jawaban_ganda'] == 'b' ? 'checked' : ''}}>
                      <div class="jawaban-checkmark">
                        <div>B</div>
                      </div>
                    </label>
                  </td>
                  <td>
                    {!! $item->b !!}
                  </td>
                </tr>
                <tr>
                  <td width="40" class="pilihan">
                    <label class="jawaban-container">
                      <input name="jawaban_ganda" type="radio" class="radio-jawaban" value="c" {{ $item->jawaban['jawaban_ganda'] == 'c' ? 'checked' : ''}}>
                      <div class="jawaban-checkmark">
                        <div>C</div>
                      </div>
                    </label>
                  </td>
                  <td>
                    {!! $item->c !!}
                  </td>
                </tr>
                <tr>
                  <td width="40" class="pilihan">
                    <label class="jawaban-container">
                      <input name="jawaban_ganda" type="radio" class="radio-jawaban" value="d" {{ $item->jawaban['jawaban_ganda'] == 'd' ? 'checked' : ''}}>
                      <div class="jawaban-checkmark">
                        <div>D</div>
                      </div>
                    </label>
                  </td>
                  <td>
                    {!! $item->d !!}
                  </td>
                </tr>
                <tr>
                  <td width="40" class="pilihan">
                    <label class="jawaban-container">
                      <input name="jawaban_ganda" type="radio" class="radio-jawaban" value="e" {{ $item->jawaban['jawaban_ganda'] == 'e' ? 'checked' : ''}}>
                      <div class="jawaban-checkmark">
                        <div>E</div>
                      </div>
                    </label>
                  </td>
                  <td>
                    {!! $item->e !!}
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </form>
        @endforeach
        @foreach ($essay as $item)
        <form name="soal-essay-{{ $item->id }}" data-remote="{{ $item->id }}" data-jenis="essay">
          <input type="hidden" name="jawaban_id" value="{{ $jawaban->id }}">
          <input type="hidden" name="soal_id" value="{{ $item->id }}">
          <input type="hidden" name="jenis_soal" value="essay">
          <input type="hidden" name="ragu" value="{{ $item->jawaban['ragu'] ?? '0' }}">
          <div class="box-soal">
            <div class="soal">
              {!! $item->soal !!}
            </div>
          </div>
          <textarea name="jawaban_essay" style="display:none">{{ $item->jawaban['jawaban_essay'] }}
</textarea>
        </form>
        @endforeach
      </div>
      <!-- END SOAL BOX -->

      <div class="box-jawaban-essay">
        <textarea id="jawabanessay"></textarea>
      </div>

      <!-- FOOTER BOX -->
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4" id="col-previous">
            <div class="pull-left">
              <button type="button" class="btn btn-flat btn-previous uppercase">
                SOAL SEBELUMNYA
              </button>
            </div>
          </div>
          <div class="col-sm-4" id="col-confuse">
            <div class="text-center">
              <button type="button" class="btn btn-flat btn-confuse uppercase">
                <input type="checkbox" id="ragu-soal" {{ $ragu }}>
                RAGU - RAGU
              </button>
            </div>
          </div>
          <div class="col-sm-4" id="col-next">
            <div class="pull-right">
              <button type="button" class="btn btn-flat btn-next uppercase">
                SOAL SELANJUTNYA
              </button>
            </div>
          </div>
          <div class="col-sm-4" id="col-selesai" style="display:none">
            <div class="pull-right">
              <button type="button" class="btn btn-flat btn-selesai uppercase" data-jawaban="{{ $jawaban->id }}">
                SELESAI UJIAN
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- END FOOTER BOX -->

    </div>
  </div>
</section>

<!-- PANEL DAFTAR SOAL -->
<div class="list-daftar-soal">
  
  <!-- BUTTON -->
  <div class="btn-daftar-soal">
    <button class="btn btn-flat btn-panel-soal" buka="1">
      <i class="ion ion-ios-arrow-back"></i>
    </button>
  </div>
  <!-- END BUTTON -->

  <!-- DAFTAR SOAL -->
  <div class="daftar-soal">
    <div class="title-soal ganda">SOAL PILIHAN GANDA</div>
    @php($no = 1)
    @php($totalSoal = 1)
    @foreach ($ganda as $item)
    <button
      type="button"
      class="btn btn-flat btn-soal
      {{ !empty($item->jawaban['ragu']) ? 'ragu' : '' }}
      {{ !empty($item->jawaban['jawaban_ganda']) ? 'terjawab' : '' }}
      {{ ($loop->first) ? 'saat-ini' : '' }}"
      id="btn-soal-{{ $item->id }}"
      data-slide="{{ $no }}">
      <div class="btn-soal-jawaban">{{ strtoupper($item->jawaban['jawaban_ganda']) }}</div>
      {{ $no }}
    </button>
    @php($no++)
    @php($totalSoal++)
    @endforeach
    <div class="title-soal essay">SOAL ESSAY</div>
    @foreach ($essay as $item)
    <button
      type="button"
      class="btn btn-flat btn-soal
      {{ !empty($item->jawaban['ragu']) ? 'ragu' : '' }}
      {{ !empty($item->jawaban['jawaban_essay']) ? 'terjawab' : '' }}""
      id="btn-soal-{{ $item->id }}"
      data-slide="{{ $no }}">
      {{ $no }}
    </button>
    @php($no++)
    @php($totalSoal++)
    @endforeach
  </div>
  <!-- END DAFTAR SOAL -->
</div>
<!-- END PANEL DAFTAR SOAL -->

<script>
var timeUjianStart = "{{ $jawaban->start }}";
var timeUjianEnd = "{{ $jawaban->end }}";
var totalSoal = {{ $totalSoal }};
</script>
@endsection