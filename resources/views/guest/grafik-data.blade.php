@extends('layout.guest')
@section('title', 'Grafik Tingkat Risiko Kebakaran Permukiman - SI TRISKA')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      Grafik Tingkat Risiko Kebakaran Permukiman
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Kota Banjarmasin</h3>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
           <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Keterangan</h3>
            </div>
            <div class="box-body">
                ..
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
             <!-- BAR CHART -->
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Kecamatan</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="barChart" style="height:230px"></canvas>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script src="{{ asset("/bower_components/chart.js/Chart.js") }}"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
     
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : {{$BanjarmasinAll['Tinggi']}},
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Tingkat Risiko Tinggi'
      },
      {
        value    : {{$BanjarmasinAll['Sedang']}},
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Tingkat Risiko Sedang'
      },
      {
        value    : {{$BanjarmasinAll['Rendah']}},
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Tingkat Risiko Rendah'
      }
    ]
    
    var pieOptions     = {
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Pie(PieData, pieOptions)
     
    //-------------
    //- BAR CHART -
    //-------------
    
    var areaChartData = {
      labels  : ['Banjarmasin Utara', 'Banjarmasin Selatan', 'Banjarmasin Timur', 'Banjarmasin Barat'],
      datasets: [
        {
          label               : 'Tingkat Risiko Tinggi',
          fillColor           : '#f56954',
          strokeColor         : '#f56954',
          pointColor          : '#f56954',
          data                : [
            {{ $BanjarmasinUtara['Tinggi'] }},
            {{ $BanjarmasinSelatan['Tinggi'] }},
            {{ $BanjarmasinTimur['Tinggi'] }},
            {{ $BanjarmasinBarat['Tinggi'] }}
          ]
        },
        {
          label               : 'Tingkat Risiko Sedang',
          fillColor           : '#f39c12',
          strokeColor         : '#f39c12',
          pointColor          : '#f39c12',
          data                : [
            {{ $BanjarmasinUtara['Sedang'] }},
            {{ $BanjarmasinSelatan['Sedang'] }},
            {{ $BanjarmasinTimur['Sedang'] }},
            {{ $BanjarmasinBarat['Sedang'] }}
          ]
        },
        {
          label               : 'Tingkat Risiko Rendah',
          fillColor           : '#00a65a',
          strokeColor         : '#00a65a',
          pointColor          : '#00a65a',
          data                : [
            {{ $BanjarmasinUtara['Rendah'] }},
            {{ $BanjarmasinSelatan['Rendah'] }},
            {{ $BanjarmasinTimur['Rendah'] }},
            {{ $BanjarmasinBarat['Rendah'] }}
          ]
        }
      ]
    }
    
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
@endsection