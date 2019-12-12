@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
<section class="content-header">
      <h1>
        KPI phòng ban
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">KPI phòng ban</a></li>
        <li class="active">Danh sách KPI phòng ban</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">KPI phòng ban</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="col-md-8"></div>
        <?php 
        // $department_count;
        
        $department_count=count($list_department);
        ?>
        <div class="col-md-4 form-inline">
        
        <form action="{{ route('dsKPI_phongban')}}" method="GET" class="form-inline">
      
          <div class="form-group">
              <label>Phòng ban</label>
              <select class="form-control" id="sel_depart" name="sel_depart">
              <?php for ($i =0; $i< count($list_department); $i++){?>
                <option value="<?=$list_department[$i]->id?>" <?php echo  isset($_GET['sel_depart']) ? ($_GET['sel_depart'] == $list_department[$i]->id ? 'selected' : '') : '';?> ><?php echo ($list_department[$i]->department_name)?></option>
              <?php } ?> 
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Lọc</button>
        </form>
      </div>
      </div>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thống kê KPI theo các tiêu chí {{ $department['department_name']}}</h3>
        </div>
        <div class="box-body ">
            <canvas id="canvas" width="100" height="25" style="height: 500 !important;"></canvas>
        </div>
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thống kê KPI theo các tháng {{ $department['department_name']}}</h3>
        </div>
        <div class="box-body ">
          <canvas id="kpi_depart_months" width="100" height="25" style="height: 500 !important;"></canvas>
        </div>
      </div>
     
    <!-- /.row -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Bảng KPI chi tiết của phòng ban {{ $department['department_name']}}</h3>
      </div>
      <div class="box-body">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Phòng ban</th>
            <th>Tên tiêu chí</th>
            <th>Tỉ lệ hoàn thành</th>
            <th>Trọng số</th>
            <th style="width: 100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $id = 1;
           $a = file_get_contents('http://206.189.34.124:5000/api/group8/kpi_results?department_id='.$id);
           $kpi = json_decode($a);
           for ( $i=0 ; $i < count($kpi->kpi_results[0]->criterias); $i++){
           ?>
           <tr>
            <td><?=$i?></td>
            <td><?php echo $list_department[$kpi->kpi_results[0]->department_id]->department_name?></td>
            <td> <?php echo $kpi->kpi_results[0]->criterias[$i]->name?></td>
            <td> <?php echo $kpi->kpi_results[0]->criterias[$i]->complete_rating?></td>
            <td> <?php echo $kpi->kpi_results[0]->criterias[$i]->ratio?></td>
            <td><a href="chitiet_KPIphongban.blade.php">Chi tiết</a></td>
          </tr>
        <?php } ?>
      
   </tbody>

 </table>
</div>

</div>

<!-- /.box-body -->

</div>
<!-- /.box -->

<!-- /.row -->

</section>  
     

@endsection

@push('js')
<script src="{{  asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
 <!-- InputMask -->
 <script src="{{  asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
 <script src="{{  asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
 <script src="{{  asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
 <!-- date-range-picker -->
 <script src="{{  asset('bower_components/moment/min/moment.min.js') }}"></script>
 <script src="{{  asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
 <!-- bootstrap datepicker -->
 <script src="{{  asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
 <!-- bootstrap color picker -->
 <script src="{{  asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
 <!-- bootstrap time picker -->
 <script src="{{  asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
 <!-- datatable -->
 <!-- iCheck 1.0.1 -->
 <script src="{{  asset('plugins/iCheck/icheck.min.js') }}"></script>
 <!-- FastClick -->
 <script src="{{  asset('bower_components/fastclick/lib/fastclick.js') }}"></script>

 <!-- FLOT CHARTS -->
 <script src="{{  asset('bower_components/Flot/jquery.flot.js') }}"></script>
 <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
 <script src="{{  asset('bower_components/Flot/jquery.flot.resize.js') }}"></script>
 <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
 <script src="{{  asset('bower_components/Flot/jquery.flot.pie.js') }}"></script>
 <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
 <script src="{{  asset('bower_components/Flot/jquery.flot.categories.js') }}"></script>

 <!-- DataTables -->
 <script src="{{  asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{  asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
 <!-- SlimScroll -->
 <script src="{{  asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
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

<?php 
 

?>
<script>
  $(function () {

    window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
  };
  var chartData = {
			labels: ['Đạt doanh số', 'Di đúng giờ', 'Sản lượng đạt 2tr sp', 'Số lượng sản phẩm lỗi ít', 'Hài lòng từ khách hàng', 'R&D', 'QoC'],
			datasets: [{
				type: 'line',
				label: 'Tiêu chí KPI của công ty',
				borderColor: window.chartColors.blue,
				borderWidth: 2,
				data: [
				80,
				69,
				70,
			  75,
				90,
				45,
				78
				]
			}, {
				type: 'bar',
				label: 'KPI từng phòng ban',
				backgroundColor: window.chartColors.red,
				data: [
          80,
				  75,
					69,
					75,
				  95,
					10,
					67
				],
				borderColor: 'white',
				borderWidth: 2
			}
  ]

		};

    var data_kpi_depart_months = {
			labels: ['January',
'February',
'March',
'April',
'May',
'June',
'July',
'August',
'September',
'October',
'November',
'December'],
			datasets: [{
				type: 'line',
				label: 'Tiêu chí KPI của công ty',
				borderColor: window.chartColors.yellow,
				borderWidth: 2,
				data: [
				2.50,
				2.69,
				3.20,
			  1.25,
				1.90,
				1.45,
				1.78,
        1.69,
				1.70,
			  1.75,
				1.90,
				1.45,
				2.78
				]
			}, {
				type: 'bar',
				label: 'KPI phòng ban theo tháng',
				backgroundColor: window.chartColors.green,
				data: [
          <?= $KPI_depart_months[1] ?>,
					<?= $KPI_depart_months[2] ?>,
					<?= $KPI_depart_months[3] ?>,
					<?= $KPI_depart_months[4] ?>,
					<?= $KPI_depart_months[5] ?>,
					<?= $KPI_depart_months[6] ?>,
					<?= $KPI_depart_months[7] ?>,
          <?= $KPI_depart_months[8] ?>,
					<?= $KPI_depart_months[9] ?>,
					<?= $KPI_depart_months[10] ?>,
					<?= $KPI_depart_months[11] ?>,
					<?= $KPI_depart_months[12] ?>
				],
				borderColor: 'white',
				borderWidth: 2
			}
  ]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
      var ctx_kpi_depart_months = document.getElementById('kpi_depart_months').getContext('2d');
      ctx.height = 500;
      console.log(ctx);
			var mixedChart = new Chart(ctx, {
				type: 'bar',
				data: chartData,
				options: {
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});

      var mixedChart = new Chart(ctx_kpi_depart_months, {
				type: 'bar',
				data: data_kpi_depart_months,
				options: {
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: true
					}
				}
			});
		};

    $('#sel_depart').change(function(){
        let id = $('#sel_depart').val()
        console.log(id);
        
    })
    //Initialize Select2 Elements
    $('.select2').select2()

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
</script>
@endpush
