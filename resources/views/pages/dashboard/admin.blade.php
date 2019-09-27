@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Dashboard @endslot
  @slot('subtitle') control panel @endslot
  @endcomponent

  <section class="content">

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua">
            <i class="ion-ios-people"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Siswa</span>
            <span class="info-box-number">{{ $widget->siswa }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red">
            <i class="ion-ios-people"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Guru</span>
            <span class="info-box-number">{{ $widget->guru }}</span>
          </div>
        </div>
      </div>

      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green">
            <i class="ion-ios-list-box"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Nilai Rata - Rata</span>
            <span class="info-box-number">{{ $widget->average }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow">
            <i class="ion-ios-paper"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Total Ujian</span>
            <span class="info-box-number">{{ $widget->ujian }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Statistik</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
                <p class="text-center">
                  <strong>Grafik nilai tahun {{ date('Y') }}</strong>
                </p>

                <div class="chart">
                  <canvas id="barChart" style="height: 245px; width: 704px;" width="704" height="245"></canvas>
                </div>
              </div>
              <div class="col-md-4 dashboard-ujian-terakhir">
                <p class="text-center">
                  <strong>Daftar Ujian Terakhir</strong>
                </p>

                @foreach ($ujian as $item)
                <div class="progress-group">
                  <span class="progress-text">{{ $item->judul_ujian }}</span>
                  <span class="progress-number"><b>{{ $item->soal_ganda }}</b>/{{ $item->soal_essay }}</span>

                  @php($persen = $item->jmlh_soal ? ($item->soal_ganda / $item->jmlh_soal) * 100 : 50)
                  <div class="progress sm bg-maroon">
                    <div class="progress-bar progress-bar-aqua" style="width: {{ $persen }}%"></div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('javascript')
  <script>
    $(function () {
      var areaChartData = {
        labels  : ['Jan', 'Feb', 'Mar', 'Aprl', 'May', 'Jun', 'Jul', 'Ags', 'Sep', 'Oct', 'Nov', 'Des'],
        datasets: [
          {
            label               : 'Nilai',
            fillColor           : 'rgba(0, 192, 239, 0.2)',
            strokeColor         : '#00c0ef',
            data                : [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40]
          }
        ]
      }

      var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
      var barChart                         = new Chart(barChartCanvas)
      var barChartData                     = areaChartData
      var barChartOptions                  = {
        scaleBeginAtZero        : true,
        scaleShowGridLines      : true,
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        scaleGridLineWidth      : 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines  : true,
        barShowStroke           : true,
        barStrokeWidth          : 1,
        barValueSpacing         : 5,
        barDatasetSpacing       : 1,
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        responsive              : true,
        maintainAspectRatio     : true
      }

      barChartOptions.datasetFill = false
      barChart.Bar(barChartData, barChartOptions)
    })
  </script>
@endsection