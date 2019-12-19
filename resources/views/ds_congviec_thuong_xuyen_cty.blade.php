@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
<style>

.dataTables_wrapper .dataTables_paginate .paginate_button{
  padding: 0 !important;
}

</style>
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
<?php 
  $list_department = (array) json_decode(@file_get_contents('http://it4883dms3.pagekite.me/api/departments'));
  $numberTasksFinished = '';
  $numberTasksDoing = '';
  $numberTasksOverdue = '';
  $list_name_depart = '';
  $numberTasksFinished_arr =  array();
  $numberTasksDoing_arr =  array();
  $numberTasksOverdue_arr =  array();
  $numberTasksAll_arr =  array();
  foreach($list_department as $department){
    $list_name_depart .= " '" .$department->organizationName . "', ";
    $statistics = json_decode(@file_get_contents('https://falling-frog-38743.pktriot.net/api/recurrent-tasks/statistics?departmentId=' . $department->id));
    $numberTasksDoing .=  '' . $statistics->doing->count . ',';
    $numberTasksFinished .= '' . $statistics->finished->count . ',';
    $numberTasksOverdue .= '' . $statistics->overdue->count . ',';

    $numberTasksFinished_arr[] = $statistics->finished->count;
    $numberTasksDoing_arr[] = $statistics->doing->count;
    $numberTasksOverdue_arr[] = $statistics->overdue->count;
    $numberTasksAll_arr[] = $statistics->all->count;
   
  }


  rtrim($numberTasksDoing, ", ");
  rtrim($numberTasksFinished, ", ");
  rtrim($numberTasksOverdue, ", ");


?>
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        Danh sách công việc thường xuyên
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

              <!-- /.box -->
              <!-- Donut chart -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>

                  <h3 class="box-title">Biểu đồ công việc</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                  </div>
                </div>
                <div class="box-body">
                  <canvas id="canvas" height="105"></canvas>
                </div>
                <!-- /.box-body-->
              </div>

            </div>
            <!-- /.col -->

          </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <br>
              <br>
              <table id="table_recurrent_task" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên phòng ban</th>
                  <th>Tổng số lượng công việc</th>
                  <th>Số lượng công việc đang thực hiện</th>
                  <th>Số lượng công việc đã hoàn thành</th>
                  <th>Số lượng công việc đã quá hạn</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $index = 1; 
                  for ( $i=0; $i < count($list_department); $i++) { 
                ?>
                    <tr>
                        <td><?php  echo $index++ ;?></td>
                        <td><?php  echo $list_department[$i]->organizationName; ?></td>
                        <td><button class="btn btn-default"><?= $numberTasksAll_arr[$i] ?></button></button></td>
                        <td><button class="btn btn-warning"><?=  $numberTasksDoing_arr[$i] ?></button></td>
                        <td><button class="btn btn-primary"><?=   $numberTasksFinished_arr[$i] ?></button></td>
                        <td><button class="btn btn-danger"><?=   $numberTasksOverdue_arr[$i] ?></button></td>
                        <td>  
                            <a href="{{ route('ds_congviec_thuong_xuyen', $list_department[$i]->id)}}" class="btn btn-primary">Chi tiết</a>
                        </td>
                    </tr>

                  <?php   
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
     

@endsection

@push('js')
<script src="{{ asset('bower_components/jquery-knob/js/jquery.knob.js') }}"></script>
 <!-- FLOT CHARTS -->
 <script src="{{ asset('bower_components/Flot/jquery.flot.js') }}"></script>
 <script src="{{ asset('bower_components/Flot/jquery.flot.js') }}"></script>
 <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
 <script src="{{ asset('bower_components/Flot/jquery.flot.resize.js') }}"></script>
 <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
 <script src="{{ asset('bower_components/Flot/jquery.flot.pie.js') }}"></script>
 <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
 <script src="{{ asset('bower_components/Flot/jquery.flot.categories.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

 

 <script>
  $(function () {
    $('.btn-edit').on('click', function(e){
      Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Bạn có muốn sửa công việc',
            showConfirmButton: true,
            timer: 1500
          }).then((result) => {
            if (result.value) {
              // window.location="ds_congviec_thuong_xuyen.blade.php";
            }
          })
    });

    $('.btn-delete').on('click', function(e){
      Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Bạn có muốn xóa công việc??',
            showConfirmButton: true,
            timer: 1500
          }).then((result) => {
            if (result.value) {
              // window.location="ds_congviec_thuong_xuyen.blade.php";
            }
          })
    });
    $('#table_recurrent_task').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
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
			labels: [<?php echo $list_name_depart; ?>],
			datasets: [ {
				type: 'bar',
				label: 'Số lượng công việc đang làm',
				backgroundColor: window.chartColors.yellow,
				data: [
				<?= $numberTasksDoing ?>,
				],
				borderColor: 'white',
				borderWidth: 2
			},
      {
				type: 'bar',
				label: 'Số lượng công việc đã hoàn thành',
				backgroundColor: window.chartColors.green,
				data: [
				<?= $numberTasksFinished ?>,
				],
				borderColor: 'white',
				borderWidth: 2
			},
      {
				type: 'bar',
				label: 'Số lượng công việc quá hạn',
				backgroundColor: window.chartColors.red,
				data: [
				<?= $numberTasksOverdue ?>,
				],
				borderColor: 'white',
				borderWidth: 2
			}
  ]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
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
		};

  /*
   * Custom Label formatter
   * ----------------------
   */
   function labelFormatter(label, series) {
     console.log(series)
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
    + label
    + '<br>'
    + series.percent + '%</div>'
  }

  /* jQueryKnob */

  $(".knob").knob({
    'readOnly': true,
    'min':0,
    'max':100,
    'readOnly': true,
    'width': 40,
    'height': 40,
    'dynamicDraw': true,
    'thickness': 0.2,
    'tickColorizeValues': true
    });
</script>
@endpush
