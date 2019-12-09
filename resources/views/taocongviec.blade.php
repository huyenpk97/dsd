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
  $list_department =  json_decode(file_get_contents('http://206.189.34.124:5000/api/group8/departments'))->departments;
  $list_employee = json_decode(file_get_contents('http://206.189.34.124:5000/api/group8/departments/1'))->department->positions;
  
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

 $list_labels = callAPI('POST', 'https://falling-frog-38743.pktriot.net/api/labels/search?offset=0', "{}");
 $list_labels = json_decode($list_labels);
?>
   
<section class="content-header">
  <h1>
    Tạo công việc
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">Advanced Elements</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="csllapse"><i class="fa fa-minus"></i></button>
         
      </div>
    </div>  
    <!-- /.box-header -->
    <div class="box-body">
    <form id="create_task_form">
        <div class="form-group">
          <label>Tên công việc</label>
          <input type="text" class="form-control" required id="name_task"  data-parsley-type="text" name="name_task" placeholder="Tên công việc...">
        </div>
        <div class="form-group">
          <label>Mô tả:</label>
          <textarea class="form-control" required id="description" name="description" rows="5" placeholder="Mô tả ..."></textarea>
        </div>
        <div class="form-group">
          <label>Phòng ban thực hiện</label>
          <select class="form-control select2" required id="department" name="department" style="width: 100%;">
            <?php 
              for ($i =0; $i < count($list_department); $i++){?>
              <option value='{ "id": "<?= $list_department[$i]->id; ?>","name": "<?= $list_department[$i]->department_name; ?>"}'> 
                
                <?php echo ($list_department[$i]->department_name)?></option>
            <?php } ?> 

          </select>
        </div>
        <div class="form-group">
          <label>Nhân viên thực hiện</label>
          <select class="form-control select2" required id="doer" name="doer" style="width: 100%;">
            @foreach($list_employee as $employee)
            <option value='{ "id": "<?= $employee->employee_id; ?>","name": "<?= $employee->name; ?>"}'> 
            {{ $employee->name }}</option>
            @endforeach

          </select>
        </div>

        <div class="form-group">
          <label>Người kiểm tra</label>
          <select class="form-control select2" id="reviewer" style="width: 100%;">
            @foreach($list_employee as $employee)
              <option value='{ "id": "<?= $employee->employee_id; ?>","name": "<?= $employee->name; ?>"}'> 
              {{ $employee->name }}</option>
            @endforeach
          </select>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <label>Ngày bắt đầu:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" required class="form-control pull-right" data-parsley-type="text" id="start_date" name="start_date">
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <label>Deadline:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
              <input type="text" required class="form-control pull-right" data-parsley-type="text" name="deadline" id="deadline">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.col -->
        <div class="form-group">
          <label>Các phòng ban liên quan</label>
          <select class="form-control select2" multiple="multiple"  id="departments_related" name="departments_related" data-placeholder="Chọn các phòng ban"
          style="width: 100%;">
          <?php for ($i =0; $i< count($list_department); $i++){?>
              <option value='{ "id": "<?= $list_department[$i]->id; ?>","name": "<?= $list_department[$i]->department_name; ?>"}'>
                <?php echo ($list_department[$i]->department_name)?>
              </option>
            <?php } ?> 
        </select>
      </div>
      <div class="form-group">
          <label>Nhãn công việc</label>
          <select class="form-control select2" required id="type_task" name="type_task" style="width: 100%;">
          <?php 
              for ($i =0; $i < count($list_labels); $i++){?>
              <option value='{ "id": "<?= $list_labels[$i]->_id; ?>","name": "<?= $list_labels[$i]->name; ?>"}'> 
                
                <?php echo ($list_labels[$i]->name)?></option>
            <?php } ?> 

          </select>
        </div>
      <div class="form-group">
        <!-- /.col -->
        <button type="submit" class="btn btn-block btn-success btn-create">Tạo công việc</button>
      </div>
    </form>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->

<!-- /.row -->

</section>

@endsection

@push('js')
 <!-- Bootstrap 3.3.7 -->
 <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
 <!-- Select2 -->
 <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
 <!-- InputMask -->
 <script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
 <script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
 <script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
 <!-- date-range-picker -->
 <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
 <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
 <!-- bootstrap datepicker -->
 <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
 <!-- bootstrap color picker -->
 <script src="{{ asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
 <!-- bootstrap time picker -->
 <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
 <!-- SlimScroll -->
 <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
 <!-- iCheck 1.0.1 -->
 <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
 <!-- FastClick -->
 <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- Page script -->
 <script>
  $(function () {

    
    $('#create_task_form').validate({ // initialize the plugin
        rules: {
            task_name: {
                required: true
            },
            description: {
                required: true,
            },
            start_date: {
                required: true,
            },
            deadline: {
                required: true,
            },
            department: {
                required: true,
            }
        }
    });
    $('#create_task_form').on('submit', function(e){
      e.preventDefault();
          name_task = $('#name_task').val();
          department =  $('#department').val();
          description =  $('#description').val();
          start_date = $('#start_date').val();
          start_date = new Date(start_date);
          start_date = start_date.toISOString();
          deadline =  $('#deadline').val();
          deadline = new Date(deadline);
          deadline = deadline.toISOString();
          coDepartments =  $('#departments_related').val();
          doer =  $('#doer').val();
          reviewer = $('#reviewer').val();

          var formData = new FormData();
          formData.append('name', name_task);
          formData.append('department', department);
          formData.append('description', description);
          formData.append('start', start_date);
          formData.append('finish', deadline);
          formData.append('coDepartments', coDepartments);
          formData.append('doer', doer);
          formData.append('reviewer', reviewer);
          formData.append('creator', reviewer);
          formData.append("type", "individual");
          formData.append("status","doing");

          $.ajax({
                url : "https://falling-frog-38743.pktriot.net/api/recurrent-tasks/", 
                type : "post",
                data : {
  "name": "Checking drugs' quality every day",
  "description": "Every day, employees need to make sure the quality of all drug products are good.",
  "doer": {
    "id": "73936b96-03c1-4544-a858-a39deb469576",
    "name": "Huy Ta Quoc",
    "email": "quochuy.tl.bk@gmail.com"
  },
  "coDoers": [
    {
      "id": "73936b96-03c1-4544-a858-a39deb469576",
      "name": "Huy Ta Quoc",
      "email": "quochuy.tl.bk@gmail.com"
    }
  ],
  "reviewer": {
    "id": "73936b96-03c1-4544-a858-a39deb469576",
    "name": "Huy Ta Quoc",
    "email": "quochuy.tl.bk@gmail.com"
  },
  "creator": {
    "id": "73936b96-03c1-4544-a858-a39deb469576",
    "name": "Huy Ta Quoc",
    "email": "quochuy.tl.bk@gmail.com"
  },
  "department": {
    "id": "23936b96-02d4-3322-b848-a39deb469543",
    "name": "Personnel Deparment"
  },
  "coDepartments": [
    {
      "id": "23936b96-02d4-3322-b848-a39deb469543",
      "name": "Personnel Deparment"
    }
  ],
  "labels": [
    "507f1f77bcf86cd799439011"
  ],
  "start": "2019-12-11T15:27:13.347Z",
  "finish": "2019-12-11T15:27:13.347Z",
  "due": "2019-12-11T15:27:13.347Z",
  "comment": "This task is gonna need twice the time of an ordinary task.",
  "percentComplete": 50,
  "type": "individual",
  "status": "doing"
},
                success : function (result){ // result là kết quả trả về khi gọi đến API
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tạo công việc thành công',
                    showConfirmButton: true,
                    timer: 1500
                  }).then((result) => {
                    if (result.value) {
                      window.location="ds_congviec_thuong_xuyen.html";
                    }
                  })
                }
            });
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
    $('#deadline').datepicker({
      autoclose: true
    })

    $('#start_date').datepicker({
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
