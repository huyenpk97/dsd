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
   
<section class="content-header">
    <h1>
      Tạo dự án
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
          <form role="form" id="form-create-project" action="http://3.1.20.54/v1/projects">
              <div class="box-body">
                  <div class="form-group">
                      <label for="name">Tên dự án</label>
                      <input type="text" class="form-control" required id="name" name="name" placeholder="Tên dự án">
                  </div>
                  <div class="form-group">
                      <label>Người chịu trách nhiệm</label>
                      <select class="form-control select2" required id="created_by" name="created_by" style="width: 100%;">
                          <option selected="selected" value="Lã Mạnh Cường">Lã Mạnh Cường</option>
                          <option value="Nguyễn Chí Thanh">Nguyễn Chí Thanh</option>
                          <option value="Nguyễn Duy Kỳ">Nguyễn Duy Kỳ</option>
                          <option value="Trịnh Duy Hưng">Trịnh Duy Hưng</option>
                          <option value="Kerlor Senglao">Kerlor Senglao</option>
                      </select>
                  </div>
                  <div class="form-group">
                          <label>Date:</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" required class="form-control pull-right" autocomplete="off" name="deadline" id="datepicker">
                          </div>
                          <!-- /.input group -->
                        </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Mô tả</label>
                      <textarea rows="4" cols="50" required name="description" id="description" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Tài liệu</label>
                      <input type="file" id="exampleInputFile">
                  </div>
              </div>

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-create">Tạo</button>
              </div>
              </form>
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
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- page script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <!-- Page script -->
 <script>
  $(function () {

    $('.btn-create').on('click', function(e){ // lấy id của thẻ button dùng để submit form
      e.preventDefault(); // ngăn ko cho load lại trang

      // Các trường input cần được đặt name và id trùng với tên các trường của api
      name = $('#name').val(); // lấy giá trị của thẻ có id và name là trường "name"
      description = $('#description').val();// lấy giá trị của thẻ có id và name là trường "description"
      created_by = $('#created_by').val();// lấy giá trị của thẻ có id và name là trường "create_by"
      deadline = new Date($('#datepicker').val()).getTime()/1000; // lấy giá trị của thẻ có id và name là trường "datepicker", những nhóm gửi lên date kiểu integer cần chuyển đổi như này

      console.log(deadline)
      $.ajax({
            url : "http://3.1.20.54/v1/projects", // link API
            type : "post", // Phương thức gửi request. Method POST dùng để lưu dữ liệu
            data: { // đẩy các dữ liệu cần lưu lên api theo cú pháp như bên dưới
                name: name, // format tên của trường dữ liệu gửi lên api(chính xác theo api định nghĩa) : biến giá trị được định nghĩa bên trên
                description: description,
                created_by: created_by,
                deadline: deadline,
                project_type: 0
              }, // Phương thức POST
            success : function (result){ // result là kết quả trả về khi gọi đến API
              // Hiển thị dialog thông báo thành công
              Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tạo dự án thành công',
                    showConfirmButton: true,
                  }).then((result) => {
                    // Chuyển hướng về  màn hình danh sách
                      window.location="list_project.blade.php";
                  })
            }

          });

        });

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
