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
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
 <!-- bootstrap datepicker -->
 <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Cấu hình KPI
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
          <div class="col-xs-12">
            <!-- /.box -->
              <div class="box">
              <!-- /.box-header -->
                  <div class="box-body">
                      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create_KPI">Tạo mới KPI</button>
                      <h3 class="box-title">Quản lý KPI </h3>
                      <div class="box box-default">
                          <div class="box-header with-border">
                              <h3 class="box-title">KPI công ty 1 </h3>
                              <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                              </div>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                              <div class="box box-default">
                                  <div class="box-header with-border">
                                      <h3 class="box-title">KPI phòng ban 1 </h3>
                                      <div class="box-tools pull-right">
                                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                      </div>
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body">
                                      <ul>
                                          <li>KPI 1</li>
                                          <li>KPI 2</li>
                                          <li>KPI 3</li>
                                          <li>KPI 4</li>
                                          <li>KPI 5</li>
                                      </ul>
  
                                  </div>
                                  <!-- /.box-body -->
  
                              </div>
  
                          </div>
                          <!-- /.box-body -->
  
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

@section('modal')
<div id="create_KPI" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tạo KPI</h4>
        </div>
        <div class="modal-body">
            <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên KPI</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên KPI">
                        </div>
                        <div class="form-group">
                            <label>KPI công ty</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Đạt doanh thu</option>
                                <option>KPI công ty 1</option>
                                <option>KPI công ty 2</option>
                                <option>KPI công ty 3</option>
                                <option>KPI công ty 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>KPI phòng ban</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Hoàn thành công việc đúng hạn</option>
                                <option>KPI phòng ban 1</option>
                                <option>KPI phòng ban 2</option>
                                <option>KPI phòng ban 3</option>
                                <option>KPI phòng ban 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chi tiêu</label>
                            <input type="text" class="form-control" id="exampleInputtext1" placeholder="Nhập chỉ tiêu cần đạt của KPI">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputtext1">Trọng số</label>
                                <input type="text" class="form-control" id="exampleInputtext1" placeholder="Nhập trọng số của KPI">
                            </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-create">Tạo</button>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('js')
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- page script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- Page script -->
 <script>
  $(function () {
    $('.btn-create').on('click', function(e){
      e.preventDefault();
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Tạo dự án thành công',
        showConfirmButton: true,
        timer: 1500
      }).then((result) => {
        if (result.value) {
          window.location="list_project.blade.php";
        }
      })


    })
  });

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

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

    //Initialize Select2 Elements
</script>
@endpush

