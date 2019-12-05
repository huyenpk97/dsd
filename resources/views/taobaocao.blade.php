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
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-slider/slider.css') }}">
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
      Tạo báo cáo
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Báo cáo</a></li>
      <li class="active">Tạo báo cáo</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Tạo báo cáo</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">



        <div class="form-group">
          <label>Tiêu đề báo cáo</label>
          <input type="text" class="form-control" placeholder="Enter ...">
        </div>
        <div class="form-group">
          <label>Người thực hiện</label>
          <input type="text" class="form-control" placeholder="Enter ...">
        </div>
        <div class="form-group">
          <label>Tên công việc</label>
          <input type="text" class="form-control" placeholder="Enter ...">
        </div>
        <div class="form-group">
          <label>Quy trình</label>
          <input type="text" class="form-control" placeholder="Enter ...">
        </div>
        <div class="form-group">
          <label>Loại mẫu báo cáo</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Báo cáo thường nhật</option>
            <option>Báo cáo chất lượng</option>
            <option>Báo cáo tiến độ</option>
            <option>Báo cáo hoàn thành</option>
            <option>Báo có lỗi</option>

          </select>
        </div>
        <div class="form-group">
          <label>Tải mấu báo cáo</label>
          <a href="#">Tại đây</a>
        </div>
        <div class="form-group">
          <label>Tải mấu file báo cáo</label>
          <a href="#">Tại đây</a>
        </div>
        <div class="form-group">
          <label>% công việc hoàn thành</label>
          <input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="100"
            data-slider-step="5" data-slider-value="[0,80]" 
           data-slider-tooltip="show" data-slider-id="red">
        </div>
        <div class="form-group">
          <label>Người giám sát</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Nguyễn Chí Thanh</option>
            <option>Nguyễn Chí Hưng</option>
            <option>Nguyễn Chí Kerlol</option>
            <option>Nguyễn Chí Kỳ</option>
            <option>Nguyễn Chí Cường</option>

          </select>
        </div>

        <div class="form-group">
          <label>Ghi chú:</label>
          <textarea class="form-control" rows="5" placeholder="Nhận xét ..."></textarea>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <!-- /.col --><div class="col-xs-12">
            <div class="col-md-2"></button></div>
            <div class="col-md-4"><button type="button" class="btn btn-block btn-success btn-create">Gửi báo cáo</button></div>
            <div class="col-md-4"><a href="ds_baocao.blade.php"><button type="button" class="btn btn-block btn-success">Hủy bỏ</button></a></div>
            <div class="col-md-2"></button></div>
          </div>
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

<script src="{{ asset('plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9') }}"></script>
<!-- Page script -->
<script>
 $(function () {
   $('.btn-create').on('click', function(e){
     e.preventDefault();
     Swal.fire({
       position: 'center',
       icon: 'success',
       title: 'Tạo báo cáo thành công',
       showConfirmButton: true,
       timer: 1500
     }).then((result) => {
       if (result.value) {
         window.location="ds_baocao.html";
       }
     })


   })


   /* BOOTSTRAP SLIDER */
   $('.slider').slider()
 })
</script>
<!-- Page script -->
<script>
 $(function () {
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
