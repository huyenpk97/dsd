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
  // dd($userDepartment);
  $statistics = json_decode(file_get_contents('https://falling-frog-38743.pktriot.net/api/recurrent-tasks/statistics?departmentId=' . $id));
  $list_recurrent_task =  json_decode(file_get_contents('https://falling-frog-38743.pktriot.net/api/recurrent-tasks/departments/' . $id));
  $numberTasks =  $statistics->all->count != 0 ? $statistics->all->count : 1;
  $numberTasksDoing = $statistics->doing->count;
  $numberTasksFinished = $statistics->finished->count;
  $numberTasksOverdue = $statistics->overdue->count;

  $list_user = (array) json_decode(@file_get_contents('http://18.217.21.235:8083/api/v1/userOrganization/findByOrganization?organizationId=' . $id));
  // dd($list_user);
  $numberTasksFinishedUser = '';
  $numberTasksDoingUser = '';
  $numberTasksOverdueUser = '';
  $list_name_user = '';
  foreach($list_user as $user){
    $user_info = json_decode(@file_get_contents('http://it4883dms3.pagekite.me/api/users/' . $user->userId));
    // dd($user_info);
    $list_name_user .= " '" .$user_info->name . "', ";
    $statistics = json_decode(@file_get_contents('https://falling-frog-38743.pktriot.net/api/recurrent-tasks/statistics?userId=' . $user_info->id));
    $numberTasksDoingUser .=  '' . $statistics->doing->count . ',';
    $numberTasksFinishedUser .= '' . $statistics->finished->count . ',';
    $numberTasksOverdueUser .= '' . $statistics->overdue->count . ',';
  }
  // dd($numberTasksDoingUser, $numberTasksFinishedUser, $numberTasksOverdueUser);
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
            <div class="col-md-6">

              <!-- /.box -->
              <!-- Donut chart -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>

                  <h3 class="box-title">Biểu đồ công việc phòng</h3>
                  <a href="{{ route('ds_congviec_thuong_xuyen', $id)}}" class="btn btn-primary">Chi tiết</a>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                  </div>
                </div>
                <div class="box-body">
                  <div id="donut-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body-->
              </div>

            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- Bar chart -->

              <!-- /.box -->
              <div class="box-body pad table-responsive">

                <table class="table table-bordered text-center">
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>

                  <tr>
                    <td>
                      <button type="button" class="btn btn-block btn-primary"><?php echo $numberTasks ;?></button>
                    </td>
                    <td>
                      Tổng công việc
                    </td>

                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-block btn-success"><?php echo $numberTasksFinished ;?></button>
                    </td>
                    <td>
                      Số công việc đã hoàn thành
                    </td>

                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-block btn-info"><?php echo $numberTasksDoing ;?></button>
                    </td>
                    <td>
                      Số công việc đang diễn ra
                    </td>

                  </tr>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-block btn-danger"><?php echo $numberTasksOverdue ;?></button>
                    </td>
                    <td>
                      Số công việc chậm tiến độ
                    </td>
                  </tr>
                  <tr>
                    <td><div class="form-group">
                      <label>Tuần</label>
                      <select class="form-control">
                        <option>Tuần 1</option> <option>Tuần 2</option> <option>Tuần 3</option> <option>Tuần 4</option>
                       </select>
                     </div></td>
                     <td><div class="form-group">
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
                    </div></td>
                    <td><div class="form-group">
                      <label>Năm</label>
                      <select class="form-control">
                        <option>2019</option>
                        <option>2018</option>
                        <option>2017</option>
                        <option>2016</option>
                        <option>2015</option>
                      </select>
                    </div></td>
                  </tr>
                </table>
              </div>

              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <div class="col-12">
              <!-- /.box -->
              <!-- Donut chart -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>

                  <h3 class="box-title">Biểu đồ công việc nhân viên</h3>
                  <a href="{{ route('ds_congviec_thuong_xuyen_truong_phong_chi_tiet', $id)}}" class="btn btn-primary">Chi tiết</a>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
              <div class="box-body">
                <canvas id="canvas_manager" height="105"></canvas>
              </div>
              <!-- /.box-body-->
            </div>
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
  <?php $finishedPercent =  floor(($numberTasksFinished/$numberTasks)*100); ?>
  <?php $overduePercent = floor(($numberTasksOverdue/$numberTasks)*100); ?>
  <?php $doingPercent = floor(($numberTasksDoing/$numberTasks)*100);
  
   ?>

  let finishedPercent = Number(<?php echo $finishedPercent; ?>);
  let doingPercent = Number(<?php echo $doingPercent; ?>);
  let overduePercent = Number(<?php echo $overduePercent ; ?>);

  var donutData = [
     { label: '', data: finishedPercent, color: '#0B610B' },
     { label: '', data: doingPercent, color: '#01DFD7' },
     { label: '', data: overduePercent, color: '#DF3A01' }
     ]
     $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
          }

        }
      },
      legend: {
        show: false
      }
    })
  

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
		labels: [<?php echo $list_name_user; ?>],
		datasets: [
      {
        type: 'bar',
        label: 'Số lượng công việc đang làm',
        backgroundColor: window.chartColors.yellow,
        data: [
          <?= $numberTasksDoingUser ?>,
        ],
        borderColor: 'white',
        borderWidth: 2
      },
      {
        type: 'bar',
        label: 'Số lượng công việc đã hoàn thành',
        backgroundColor: window.chartColors.green,
        data: [
          <?= $numberTasksFinishedUser ?>,
        ],
        borderColor: 'white',
        borderWidth: 2
      },
      {
        type: 'bar',
        label: 'Số lượng công việc quá hạn',
        backgroundColor: window.chartColors.red,
        data: [
          <?= $numberTasksOverdueUser ?>,
        ],
        borderColor: 'white',
        borderWidth: 2
      }
    ]
	};
	window.onload = function() {
		var ctx = document.getElementById('canvas_manager').getContext('2d');
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

</script>
@endpush
