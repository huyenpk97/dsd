@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../../plugins/iCheck/all.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
 folder instead of downloading all of them to reduce the load. -->
 <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
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
      <h3 class="box-title">Tạo công việc phòng ban</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">



        <div class="form-group">
          <label>Tên quy trình</label>
          <input type="text" class="form-control" placeholder="Enter ...">
        </div>
        <div class="form-group">
          <label>Phòng ban phụ trách</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Phòng hành chính, nhân sự</option>
            <option>Phòng maketing</option>
            <option>Phòng kĩ thuật</option>
            <option>Phòng nhân sự</option>
            <option>Phòng tài chính</option>

          </select>
        </div>
        <div class="form-group">
          <label>Các phòng ban liên quan</label>
          <select class="form-control select2" multiple="multiple" data-placeholder="Chọn các phòng ban"
          style="width: 100%;">
          <option>Phòng maketing</option>
          <option>Phòng kĩ thuật</option>
          <option>Phòng nhân sự</option>
          <option>Phòng tài chính</option>
          <option>Phòng sản xuẩt</option>
          <option>Ban lãnh đạo</option>
        </select>

      <!-- /.col -->
      <button type="button" class="btn btn-block btn-success btn-create">Tạo công việc</button>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->

</section>   

@endsection

@push('js')
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
 <!-- InputMask -->
 <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
 <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
 <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
 <!-- date-range-picker -->
 <script src="../../bower_components/moment/min/moment.min.js"></script>
 <script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <!-- bootstrap datepicker -->
 <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!-- bootstrap color picker -->
 <script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
 <!-- bootstrap time picker -->
 <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
 <!-- SlimScroll -->
 <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- iCheck 1.0.1 -->
 <script src="../../plugins/iCheck/icheck.min.js"></script>
 <!-- FastClick -->
 <script src="../../bower_components/fastclick/lib/fastclick.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- Page script -->
 <script>
  $(function () {
    $('.btn-create').on('click', function(e){
      e.preventDefault();
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Tạo quy trình thành công',
        showConfirmButton: true,
        timer: 1500
      }).then((result) => {
        if (result.value) {
          window.location="ds_quytrinh.html";
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
