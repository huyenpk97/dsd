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
    <link rel="stylesheet"
          href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
    <section class="content-header">
        <h1>
            Tạo thông báo
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
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề thông báo</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Người nhận</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Lã Mạnh Cường</option>
                                    <option>Nguyễn Chí Thanh</option>
                                    <option>NGuyễn Duy Kỳ</option>
                                    <option>Trịnh Duy Hưng</option>
                                    <option>Kerlor Senglao</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea rows="4" cols="50" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Tài liệu</label>
                                <input type="file" id="exampleInputFile">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-create">Gửi</button>
                        </div>
                    </form>
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
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Page script -->
    <script>
        $(function () {
            $('.btn-create').on('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Tạo thông báo thành công',
                    showConfirmButton: true,
                    timer: 1500
                }).then((result) => {
                    if (result.value) {
                        window.location = "list_notification.blade.php";
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
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

        //Initialize Select2 Elements
    </script>
@endpush
