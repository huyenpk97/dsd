@extends('layout')
@section('title')
Danh sách project
@endsection
@push('header')
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
   <style>
    .loading{
      width: 100px;
      position: absolute;
      z-index: 999;
      left: 45%;
      top: 69%;
      display: none;
    }
    
  </style>
  @endpush
  @push('footer')
  {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
  @endpush
  @section('content')

  <?php 
  // công việc thường xuyên
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

  

  function callAPI($method, $url, $data){
    $curl = curl_init();

    switch ($method){
     case "POST":
     curl_setopt($curl, CURLOPT_POST, 1);
     if ($data)
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
     break;
     case "PUT":
     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
     if ($data)
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);               
     break;
     default:
     if ($data)
       $url = sprintf("%s?%s", $url, http_build_query($data));
   }

    // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     'APIKEY: 111111111111111111111',
     'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
 }

 
 $make_call_doing = callAPI('POST', 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/search?offset=0', json_encode($searchStatusDoing));
 $make_call_finished = callAPI('POST', 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/search?offset=0', json_encode($searchStatusFinished));
 $make_call_overdue = callAPI('POST', 'https://falling-frog-38743.pktriot.net/api/recurrent-tasks/search?offset=0', json_encode($searchStatusOverdue));
 $response_doing = json_decode($make_call_doing, true);
 $response_finished = json_decode($make_call_finished, true);
 $response_overdue = json_decode($make_call_overdue, true);
 $numberTasksDoing = count($response_doing);
 $numberTasksFinished = count($response_finished);
 $numberTasksOverdue = count($response_overdue);


// Công việc dự án
 $response_project = file_get_contents("http://3.1.20.54/v1/projects");
 $response_project = json_decode($response_project);
 $list_project = $response_project->results;

 $numberProject = count($list_project);
 $numberProjectsFinished = 0; 
 $numberProjectsDoing =0;
 $numberProjectsOverdue=0;
 for ($i=0; $i <count($list_project) ; $i++) { 
  if($list_project[$i]->status=='processing'){
    $numberProjectsDoing = $numberProjectsDoing +1;
  }else if($list_project[$i]->status=='completed'){
   $numberProjectsFinished = $numberProjectsFinished +1;
 }
 
 else if($list_project[$i]->status=='overdue'){
   $numberProjectsOverdue = $numberProjectsOverdue +1;
 }
}


// công việc quy trình
$response = file_get_contents("http://morning-oasis-29841.herokuapp.com/api/main-task");
$response = json_decode($response);
$list_MainTask = $response;

$numberMainTask = count($list_MainTask);
$numberMainTaskFinished = 0; 
$numberMainTaskDoing =0;
$numberMainTaskOverdue=0;
for ($i=0; $i <count($list_MainTask) ; $i++) { 
  if($list_MainTask[$i]->status=='0'){
    $numberMainTaskDoing = $numberMainTaskDoing +1;
  }else if($list_MainTask[$i]->status=='1'){
   $numberMainTaskFinished = $numberMainTaskFinished +1;
 }
 
 else if($list_MainTask[$i]->status=='2'){
   $numberMainTaskOverdue = $numberMainTaskOverdue +1;
 }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thống kê công việc
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Quản lý công việc</a></li>
    <li class="active">Thống kê</li>
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

        <h3 class="box-title">Công việc thường xuyên</h3>

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
            <a href="{{ route('ds_congviec_thuong_xuyen_cty') }}"><button type="button" class="btn btn-block btn-primary"><?php echo $numberTasks ;?></button></a>
          </td>
          <td>
            Tổng công việc
          </td>

        </tr>
        <tr>
          <td>
            <a href="{{ route('ds_congviec_thuong_xuyen_cty') }}"><button type="button" class="btn btn-block btn-success"><?php echo $numberTasksFinished ;?></button></a>
          </td>
          <td>
            Số công việc đã hoàn thành
          </td>

        </tr>
        <tr>
          <td>
            <a href="{{ route('ds_congviec_thuong_xuyen_cty') }}"><button type="button" class="btn btn-block btn-info"><?php echo $numberTasksDoing ;?></button></a>
          </td>
          <td>
            Số công việc đang diễn ra
          </td>

        </tr>
        <tr>
          <td>
            <a href="{{ route('ds_congviec_thuong_xuyen_cty') }}"><button type="button" class="btn btn-block btn-danger"><?php echo $numberTasksOverdue ;?></button></a>
          </td>
          <td>
            Số công việc chậm tiến độ
          </td>
        </tr>

      </table>
    </div>

    <!-- /.box -->
  </div>
</div>
<div class="row">
 <div class="col-md-6">

  <!-- /.box -->
  <!-- Donut chart -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <i class="fa fa-bar-chart-o"></i>

      <h3 class="box-title">Công việc theo dự án</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>

      </div>
    </div>
    <div class="box-body">
      <div id="donut-chart-project" style="height: 300px;"></div>
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
          <a href="{{ route('list_project')}}"><button type="button" class="btn btn-block btn-primary"><?php echo $numberProject ;?></button></a>
        </td>
        <td>
          Tổng dứ án
        </td>

      </tr>
      <tr>
        <td>
          <a href="{{ route('list_project')}}"><button type="button" class="btn btn-block btn-success"><?php echo $numberProjectsFinished ;?></button></a>
        </td>
        <td>
          Số dứ án đã hoàn thành
        </td>

      </tr>
      <tr>
        <td>
          <a href="{{ route('list_project')}}"><button type="button" class="btn btn-block btn-info"><?php echo $numberProjectsDoing ;?></button></a>
        </td>
        <td>
          Số dứ án đang diễn ra
        </td>

      </tr>
      <tr>
        <td>
         <a href="{{ route('list_project')}}"> <button type="button" class="btn btn-block btn-danger"><?php echo $numberProjectsOverdue ;?></button></a>
        </td>
        <td>
          Số dứ án chậm tiến độ
        </td>
      </tr>

    </table>
  </div>

  <!-- /.box -->
</div>
</div>

<div class="row">
    <div class="col-md-6">

      <!-- /.box -->
      <!-- Donut chart -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>

          <h3 class="box-title">Công việc theo quy trình</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body">
          <div id="donut-chart-procedure" style="height: 300px;"></div>
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
            <a href="{{ route('congviec_quytrinh')}}">  <button type="button" class="btn btn-block btn-primary"><?php echo $numberMainTask ;?></button></a>
            </td>
            <td>
              Tổng dứ án
            </td>

          </tr>
          <tr>
            <td>
               <a href="{{ route('congviec_quytrinh')}}"><button type="button" class="btn btn-block btn-success"><?php echo $numberMainTaskFinished ;?></button></a>
            </td>
            <td>
              Số dứ án đã hoàn thành
            </td>

          </tr>
          <tr>
            <td>
              <a href="{{ route('congviec_quytrinh')}}"> <button type="button" class="btn btn-block btn-info"><?php echo $numberMainTaskDoing ;?></button></a>
            </td>
            <td>
              Số dứ án đang diễn ra
            </td>

          </tr>
          <tr>
            <td>
               <a href="{{ route('congviec_quytrinh')}}"><button type="button" class="btn btn-block btn-danger"><?php echo $numberMainTaskOverdue ;?></button></a>
            </td>
            <td>
              Số dứ án chậm tiến độ
            </td>
          </tr>

        </table>
      </div>

      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>

<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Thống kê công việc </h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <?php 
    $a = file_get_contents('http://206.189.34.124:5000/api/group8/departments');
        // echo $a;  
    $response = json_decode($a);

    $list_department = $response->departments;

    ?>
    <div class="form-group">
      <label>Chọn phòng ban</label>
      <select class="form-control select2" style="width: 100%;">
        <?php for ($i =0; $i< count($list_department); $i++){?>
          <option value="<?=$list_department[$i]->id?>"><?php echo ($list_department[$i]->department_name)?></option>
        <?php } ?>  

      </select>
    </div>


    <div class="form-group">
      <label>Chọn kiểu thống kê</label>
      <select class="form-control select2" style="width: 100%;">
        <option selected="selected">Theo ngày</option>
        <option>Theo tuần</option>
        <option>Theo tháng</option>
        <option>Theo quý</option>
        <option>Theo năm</option>
        <option>Theo dự án</option>
      </select>
    </div>

    <div class="col-md-4">
      <label>Tuần</label>
      <select class="form-control">
        <option>Tuần 1</option> <option>Tuần 2</option> <option>Tuần 3</option> <option>Tuần 4</option> <option>Tuần 5</option> <option>Tuần 6</option> <option>Tuần 7</option> <option>Tuần 8</option> <option>Tuần 9</option> <option>Tuần 10</option> <option>Tuần 11</option> <option>Tuần 12</option> <option>Tuần 13</option> <option>Tuần 14</option> <option>Tuần 15</option> <option>Tuần 16</option> <option>Tuần 17</option> <option>Tuần 18</option> <option>Tuần 19</option> <option>Tuần 20</option> <option>Tuần 21</option> <option>Tuần 22</option> <option>Tuần 23</option> <option>Tuần 24</option> <option>Tuần 25</option> <option>Tuần 26</option> <option>Tuần 27</option> <option>Tuần 28/<option> <option>Tuần 29</option> <option>Tuần 30</option> <option>Tuần 31</option> <option>Tuần 32</option> <option>Tuần 33</option> <option>Tuần 34</option> <option>Tuần 35</option> <option>Tuần 36</option> <option>Tuần 37</option> <option>Tuần 38</option> <option>Tuần 39</option> <option>Tuần 40</option> <option>Tuần 41</option> <option>Tuần 42</option> <option>Tuần 43</option> <option>Tuần 44</option> <option>Tuần 45</option> <option>Tuần 46</option> <option>Tuần 47</option> <option>Tuần 48</option> <option>Tuần 49</option> <option>Tuần 50</option> <option>Tuần 51</option> <option>Tuần 52</option>
      </select>
    </div>
    <div class="col-md-4">
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
    <div class="col-md-4">
      <label>Năm</label>
      <select class="form-control">
        <option>2019</option>
        <option>2018</option>
        <option>2017</option>
        <option>2016</option>
        <option>2015</option>
      </select>
    </div>
  </div>


</div>
<!-- /.box-body -->

</div>
<!-- /.box -->

<!-- /.row -->

</section>

@endsection

@push('js')
<script src="{{  asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{  asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{  asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{  asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{  asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('bower_components/Flot/jquery.flot.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('bower_components/Flot/jquery.flot.resize.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('bower_components/Flot/jquery.flot.pie.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('bower_components/Flot/jquery.flot.categories.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-knob/js/jquery.knob.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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

  $(document).on('click', '.btn-get', function(){
    $('.loading').css('display', 'block')
    setTimeout(() => {
      $('.loading').css('display', 'none')
    }, 2000);
  })
</script>

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
              // window.location="ds_congviec_thuong_xuyen_cty.blade.php";
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
              // window.location="ds_congviec_thuong_xuyen_cty.blade.php";
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

  // công việc thường xuyên
  <?php $finishedPercent =  floor(($numberTasksFinished/$numberTasks)*100); ?>
  <?php $overduePercent = floor(($numberTasksOverdue/$numberTasks)*100); ?>
  <?php $doingPercent =  100 - $overduePercent - $finishedPercent; ?>

  let finishedPercent = Number(<?php echo $finishedPercent; ?>);
  let doingPercent = Number(<?php echo $doingPercent; ?>);
  let overduePercent = Number(<?php echo $overduePercent ; ?>);


// công việc dự án
<?php $finishedProjectPercent =  floor(($numberProjectsFinished/$numberProject)*100); ?>
<?php $overdueProjectPercent = floor(($numberProjectsOverdue/$numberProject)*100); ?>
<?php $doingProjectPercent =  100 - $overdueProjectPercent - $finishedProjectPercent; ?>

let finishedProjectPercent = Number(<?php echo $finishedProjectPercent; ?>);
let doingProjectPercent = Number(<?php echo $doingProjectPercent; ?>);
let overdueProjectPercent = Number(<?php echo $overdueProjectPercent ; ?>);

// Công việc theo quy trình
<?php $finishedProcedurePercent =  floor(($numberMainTaskFinished/$numberMainTask)*100); ?>
<?php $overdueProcedurePercent = floor(($numberMainTaskOverdue/$numberMainTask)*100); ?>
<?php $doingProcedurePercent =  100 - $overdueProcedurePercent - $finishedProcedurePercent; ?>

let finishedProcedurePercent = Number(<?php echo $finishedProcedurePercent; ?>);
let doingProcedurePercent = Number(<?php echo $doingProcedurePercent; ?>);
let overdueProcedurePercent = Number(<?php echo $overdueProcedurePercent ; ?>);


//data cv quy trình
var donutDataProcedure = [
{ label: '', data: finishedProcedurePercent, color: '#0B610B' },
{ label: '', data: doingProcedurePercent, color: '#01DFD7' },
{ label: '', data: overdueProcedurePercent, color: '#DF3A01' }
]


$.plot('#donut-chart-procedure', donutDataProcedure, {
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

  //data cv thường xuyên
  var donutData = [
  { label: '', data: finishedPercent, color: '#0B610B' },
  { label: '', data: doingPercent, color: '#01DFD7' },
  { label: '', data: overduePercent, color: '#DF3A01' }
  ]

// data cv dự án
var donutData_project = [
{ label: '', data: finishedProjectPercent, color: '#0B610B' },
{ label: '', data: doingProjectPercent, color: '#01DFD7' },
{ label: '', data: overdueProjectPercent, color: '#DF3A01' }
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




$.plot('#donut-chart-project', donutData_project, {
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