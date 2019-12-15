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
   $result = file_get_contents('https://falling-frog-38743.pktriot.net/api/recurrent-tasks/');
   $list_recurrent_task = json_decode($result);
   $numberTasks = count($list_recurrent_task);

  
  $searchStatusDoing = array(
    "status" => ["doing"]
  );

  $searchStatusOverdue = array(
    "status" => ["overdue"]
  );

  $searchStatusFinished = array(
    "status" => ["finished"]
  );

  $id = 13;

  $statistics = json_decode(file_get_contents('https://falling-frog-38743.pktriot.net/api/recurrent-tasks/statistics?departmentId=' . $id));
  $numberTasks =  $statistics->all->count;
  $numberTasksDoing = $statistics->doing->count;
  $numberTasksFinished = $statistics->finished->count;
  $numberTasksOverdue = $statistics->overdue->count;

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

                  <h3 class="box-title">Biểu đồ công việc</h3>

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
                        <option>Tuần 1</option> <option>Tuần 2</option> <option>Tuần 3</option> <option>Tuần 4</option> <option>Tuần 5</option> <option>Tuần 6</option> <option>Tuần 7</option> <option>Tuần 8</option> <option>Tuần 9</option> <option>Tuần 10</option> <option>Tuần 11</option> <option>Tuần 12</option> <option>Tuần 13</option> <option>Tuần 14</option> <option>Tuần 15</option> <option>Tuần 16</option> <option>Tuần 17</option> <option>Tuần 18</option> <option>Tuần 19</option> <option>Tuần 20</option> <option>Tuần 21</option> <option>Tuần 22</option> <option>Tuần 23</option> <option>Tuần 24</option> <option>Tuần 25</option> <option>Tuần 26</option> <option>Tuần 27</option> <option>Tuần 28/<option> <option>Tuần 29</option> <option>Tuần 30</option> <option>Tuần 31</option> <option>Tuần 32</option> <option>Tuần 33</option> <option>Tuần 34</option> <option>Tuần 35</option> <option>Tuần 36</option> <option>Tuần 37</option> <option>Tuần 38</option> <option>Tuần 39</option> <option>Tuần 40</option> <option>Tuần 41</option> <option>Tuần 42</option> <option>Tuần 43</option> <option>Tuần 44</option> <option>Tuần 45</option> <option>Tuần 46</option> <option>Tuần 47</option> <option>Tuần 48</option> <option>Tuần 49</option> <option>Tuần 50</option> <option>Tuần 51</option> <option>Tuần 52</option>
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
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <a href="{{ route('taocongviec') }}" class="btn btn-success">Tạo công việc</a>
              <br>
              <br>
              <table id="table_recurrent_task" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên công việc</th>
                  <th>Phòng ban phụ trách</th>
                  <th>Phòng  ban liên quan</th>
                  <th>Trạng thái thực hiện</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php $index = 1; ?>
                @foreach($list_recurrent_task as $current_task)
                    <tr>
                        <td><?php  echo $index++ ;?></td>
                        <td><?php  echo $current_task->name; ?></td>
                        <td><?php  echo ( $current_task->department->name ?? '' ) ; ?></td>
                        <td> 
                          <?php  
                          if (!empty($current_task->codepartment)) 
                          {
                            $coDepartment = array_column($current_task->codepartment, 'name');
                            $coDepartmentString = implode("|",$coDepartment);
                          }
                          ?>
                        </td>
                        <td>
                          <input type="text" class="knob" value="<?php echo $current_task->percentComplete; ?>" data-min="0" data-max="100"
                          data-fgColor="<?php
                              echo ($current_task->percentComplete > 50 ? '#00a65a' : '#dd4b39' ) ;
                          ?>"></td>
                          <td><?php echo $current_task->status; ?></td>
                        <td>  
                            <a href="{{ route('ketqua_congviec', $current_task->_id)}}" class="btn btn-primary">Chi tiết</a>
                        </td>
                    </tr>

                  @endforeach
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
</script>
@endpush
