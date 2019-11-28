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

        <div class="form-group">
          <label>Chọn phòng ban</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Phòng hành chính, nhân sự</option>
            <option>Phòng maketing</option>
            <option>Phòng kĩ thuật</option>
            <option>Phòng nhân sự</option>
            <option>Phòng tài chính</option>

          </select>
        </div>
        <div class="form-group">
          <label>Chọn nhân viên</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Nguyễn Chí Thanh</option>
            <option>Nguyễn Chí Cường</option>
            <option>Nguyễn Chí Kỳ</option>
            <option>Nguyễn Chí Hưng</option>
            <option>Nguyễn Chí Kerlo</option>

          </select>
        </div>
        <div class="form-group">
          <label>Chọn loại công việc</label>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Công việc theo dự án</option>
            <option>Công việc thường xuyên</option>
            <option>Công việc khác</option>


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

      <!-- /.form-group -->

      <!-- /.col -->
      <div class="form-group">


        <!-- /.col -->
        <button type="button" class="btn btn-block btn-success btn-get">Lấy thống kê</button>
        <img class="loading" src="https://batdongsannamviet.vn/wp-content/themes/bds/images/Preloader_8.gif" alt="" >
      </div>
      <!-- /.row -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Bảng thống kê công việc</h3>
        </div>
        <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Các tiêu chí thống kê</th>
              <th style="width: 40px">Số lượng</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Công việc hoàn thành tốt</td>
              <td>35</td>

            </tr>
            <tr>
             <td>2</td>
             <td>Bán thuốc</td>
             <td>65</td>

           </tr>
           <tr>
            <td>3</td>

            <td>Maketting</td>

            <td>6</td>

          </tr>
          <tr>
           <td>4 </td>

           <td>Phòng hành chính nhân sự</td>

           <td>5</td>


         </tr>

       </tbody>

     </table>
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




<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 {{-- <!-- jQuery 3 -->
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- Select2 -->
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
 <!-- datatable -->
 <!-- iCheck 1.0.1 -->
 <script src="../../plugins/iCheck/icheck.min.js"></script>
 <!-- FastClick -->
 <script src="../../bower_components/fastclick/lib/fastclick.js"></script> --}}


</body>
</html>
