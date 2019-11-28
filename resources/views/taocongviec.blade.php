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
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">



      <div class="form-group">
        <label>Tên công việc</label>
        <input type="text" class="form-control" id="name_task" placeholder="Tên công việc...">
      </div>
      <div class="form-group">
        <label>Phòng ban phụ trách</label>
        <select class="form-control select2" id="department" style="width: 100%;">
          <option selected="selected" value="Phòng hành chính, nhân sự">Phòng hành chính, nhân sự</option>
          <option value="Phòng maketing">Phòng maketing</option>
          <option value="Phòng kĩ thuật">Phòng kĩ thuật</option>
          <option value="Phòng nhân sự">Phòng nhân sự</option>
          <option value="Phòng tài chính">Phòng tài chính</option>

        </select>
      </div>

      <div class="form-group">
        <label>Nhận xét:</label>
        <textarea class="form-control" id="remask" rows="5" placeholder="Nhận xét ..."></textarea>
      </div>
      <!-- /.form-group -->
      <div class="form-group">
        <label>Ngày bắt đầu:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="start_date">
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <label>Deadline:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="deadline">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.col -->
      <div class="form-group">
        <label>Các phòng ban liên quan</label>
        <select class="form-control select2" id="departments_related" data-placeholder="Chọn các phòng ban"
        style="width: 100%;">
        <option>Phòng maketing</option>
        <option>Phòng kĩ thuật</option>
        <option>Phòng nhân sự</option>
        <option>Phòng tài chính</option>
        <option>Phòng sản xuẩt</option>
        <option>Ban lãnh đạo</option>
      </select>
    </div>
    <div class="form-group">
      <!-- /.col -->
      <button type="button" class="btn btn-block btn-success btn-create">Tạo công việc</button>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->

<!-- /.row -->

</section>

@endsection

@push('js')
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
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

    $('.btn-create').on('click', function(e){
      e.preventDefault();
      $name_task = $('#name_task').val();
      $department =  $('#department').val();
      $remask =  $('#remask').val();
      $start_date = $('#start_date').val();
      $deadline =  $('#deadline').val();
      $departments_related =  $('#departments_related').val();

      $.ajax({
            url : "https://jsonplaceholder.typicode.com/todos/1", // link API
            type : "post", // Phương thức POST
            data : {
              name_task : $name_task,
              department : $department,
              remask : $remask,
              start_date : $start_date,
              deadline : $deadline,
              departments_related : $departments_related// Dữ liệu gửi lên nếu dùng phương thức Post để tạo, sửa
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
