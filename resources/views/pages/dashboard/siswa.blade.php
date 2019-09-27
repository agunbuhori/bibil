@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Dashboard @endslot
  @slot('subtitle') control panel @endslot
  @endcomponent

  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Statistik</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <p class="text-center">
                  <strong>Grafik nilai tahun {{ date('Y') }}</strong>
                </p>

                <div class="chart">
                  <canvas id="barChart" style="height: 245px; width: 704px;" width="704" height="245"></canvas>
                </div>
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