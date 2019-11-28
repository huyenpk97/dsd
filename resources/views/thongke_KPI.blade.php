@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
    {{-- <link rel="stylesheet" href="{{ asset('css/format_managements/index.css') }}"> --}}
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
   <!-- SELECT2 EXAMPLE -->
   <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title" style="margin: 20px 0;">Xếp hạng KPI theo nhân viên</h3>
      <form action="" method="POST" role="form" class="form-inline">

          <div class="form-group">
                  <label>Tuần</label>
                  <select class="form-control">
                    <option>Tuần 1</option>
                    <option>Tuần 2</option>
                    <option>Tuần 3</option>
                    <option>Tuần 4</option>
                    <option>Tuần 5</option>
                   </select>
          </div>
          <div class="form-group">
              <label>Tháng</label>
              <select class="form-control">
              <option>Tháng 1</option>
              <option>Tháng 2</option>
              <option>Tháng 3</option>
              <option>Tháng 4</option>
              <option>Tháng 5</option>
              <option>Tháng 6</option>
              <option>Tháng 7</option>
              <option>Tháng 8</option>
              <option>Tháng 9</option>
              <option>Tháng 10</option>
              <option>Tháng 11</option>
              <option>Tháng 12</option>

              </select>
          </div>
          <div class="form-group">
              <label>Năm</label>
              <input type="number" class="form-control" min="2000" max="2099" step="1" value="2019" />

          </div>

          <button type="submit" class="btn btn-primary">Lọc <i class="fa fa-refresh"></i></button>
      </form>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="box box-solid">
          <div class="box-header">
          <h3 class="box-title text-warning"></h3>

          <div class="box-tools pull-right">

          </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body text-center">
          <div class="box box-success">
                  <div class="box-header with-border">
                      <h3 class="box-title">Thống kê KPI theo phòng ban</h3>

                      <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>

                      </div>
                  </div>
                  <div class="box-body">
                      <div class="chart">
                      <canvas id="barChart" style="height:230px"></canvas>
                      </div>
                  </div>
                  <!-- /.box-body -->
                  </div>

          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </div>
  </div>

  <div class="row">
      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thống kê KPI theo tháng</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>

            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="areaChart" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Thống kê KPI theo phòng ban</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>

            </div>
          </div>
          <div class="box-body">
              <div class="sparkline" data-type="bar" data-width="100%" data-height="250px" data-bar-Width="30" data-bar-Spacing="10" data-bar-Color="#f39c12">
                      6,4,8, 9, 10, 5, 22, 50, 13, 18, 21, 7, 9
                  </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (RIGHT) -->
  </div>

@endsection

@push('js')
<!-- FLOT CHARTS -->
<script src="{{asset('bower_components/Flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('bower_components/Flot/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('bower_components/Flot/jquery.flot.pie.js')}}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{asset('bower_components/Flot/jquery.flot.categories.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('bower_components/chart.js/Chart.js')}}"></script>
<script>
 $(function () {
   $('#example1').DataTable()
   $('#example2').DataTable({
     'paging'      : true,
     'lengthChange': false,
     'searching'   : false,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : false
   })
 })
</script>
<!-- Page script -->
<script>
 $(function () {
   //Initialize Select2 Elements
   $('.select2').select2()

   $(".sparkline").each(function () {
     var $this = $(this);
     $this.sparkline('html', $this.data());
   });


   $( "#year" ).datepicker({dateFormat: 'yy'});


   //Datemask dd/mm/yyyy
   $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
   //Datemask2 mm/dd/yyyy
   $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
   //Money Euro
   $('[data-mask]').inputmask()

   //Date range picker
   $('#reservation').daterangepicker()
   //Date range picker with time picker
   $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
   //Date range as a button
   $('#daterange-btn').daterangepicker(
   {
     ranges   : {
       'Today'       : [moment(), moment()],
       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
     },
     startDate: moment().subtract(29, 'days'),
     endDate  : moment()
   },
   function (start, end) {
     $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
   }
   )

   //Date picker
   $('#datepicker').datepicker({
     autoclose: true
   })

   //iCheck for checkbox and radio inputs
   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
     checkboxClass: 'icheckbox_minimal-blue',
     radioClass   : 'iradio_minimal-blue'
   })
   //Red color scheme for iCheck
   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
     checkboxClass: 'icheckbox_minimal-red',
     radioClass   : 'iradio_minimal-red'
   })
   //Flat red color scheme for iCheck
   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
     checkboxClass: 'icheckbox_flat-green',
     radioClass   : 'iradio_flat-green'
   })

   //Colorpicker
   $('.my-colorpicker1').colorpicker()
   //color picker with addon
   $('.my-colorpicker2').colorpicker()

   //Timepicker
   $('.timepicker').timepicker({
     showInputs: false
   })
 })

  /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */

   //--------------
   //- AREA CHART -
   //--------------

   // Get context with jQuery - using jQuery's .get() method.
   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
   // This will get the first returned node in the jQuery collection.
   var areaChart       = new Chart(areaChartCanvas)

   var areaChartData = {
     labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
     datasets: [
       {
         label               : 'Electronics',
         fillColor           : '#f3d440',
         strokeColor         : '#f3d440',
         pointColor          : '#f3d440',
         pointStrokeColor    : '#c1c7d1',
         pointHighlightFill  : '#fff',
         pointHighlightStroke: 'rgba(220,220,220,1)',
         data                : [65, 59, 80, 81, 56, 55, 40, 20, 100, 44, 30, 21 ]
       },
       {
         label               : 'Digital Goods',
         fillColor           : 'rgba(60,141,188,0.9)',
         strokeColor         : 'rgba(60,141,188,0.8)',
         pointColor          : '#3b8bba',
         pointStrokeColor    : 'rgba(60,141,188,1)',
         pointHighlightFill  : '#fff',
         pointHighlightStroke: 'rgba(60,141,188,1)',
         data                : [28, 48, 40, 19, 86, 27, 90, 20, 70, 10, 38, 100]
       }
     ]
   }

   var areaChartOptions = {
     //Boolean - If we should show the scale at all
     showScale               : true,
     //Boolean - Whether grid lines are shown across the chart
     scaleShowGridLines      : false,
     //String - Colour of the grid lines
     scaleGridLineColor      : 'rgba(0,0,0,.05)',
     //Number - Width of the grid lines
     scaleGridLineWidth      : 1,
     //Boolean - Whether to show horizontal lines (except X axis)
     scaleShowHorizontalLines: true,
     //Boolean - Whether to show vertical lines (except Y axis)
     scaleShowVerticalLines  : true,
     //Boolean - Whether the line is curved between points
     bezierCurve             : true,
     //Number - Tension of the bezier curve between points
     bezierCurveTension      : 0.3,
     //Boolean - Whether to show a dot for each point
     pointDot                : false,
     //Number - Radius of each point dot in pixels
     pointDotRadius          : 4,
     //Number - Pixel width of point dot stroke
     pointDotStrokeWidth     : 1,
     //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
     pointHitDetectionRadius : 20,
     //Boolean - Whether to show a stroke for datasets
     datasetStroke           : true,
     //Number - Pixel width of dataset stroke
     datasetStrokeWidth      : 2,
     //Boolean - Whether to fill the dataset with a color
     datasetFill             : true,
     //String - A legend template
     legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
     //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
     maintainAspectRatio     : true,
     //Boolean - whether to make the chart responsive to window resizing
     responsive              : true
   }

   //Create the line chart
   areaChart.Line(areaChartData, areaChartOptions)

   //-------------
   //- BAR CHART -
   //-------------
   var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
   var barChart                         = new Chart(barChartCanvas)
   var barChartData                     = areaChartData
   barChartData.datasets[1].fillColor   = '#00a65a'
   barChartData.datasets[1].strokeColor = '#00a65a'
   barChartData.datasets[1].pointColor  = '#00a65a'
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
</script>
@endpush