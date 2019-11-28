@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
    {{-- <link rel="stylesheet" href="{{ asset('css/format_managements/index.css') }}"> --}}
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
   
<section class="content-header">
    <h1>
      Chi tiết dự án
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
        <div class="box box-default">
              <div class="box-header with-border">
                  <h3 class="box-title">Thông tin chung về dự án ABC</h3>

                  <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-2 ">Tên dự án:</div><div class="col-md-10">Dự án nghiên cứu sản phẩm thực phẩm chức năng ABC</div>
                      <div class="col-md-2 ">Deadline:</div><div class="col-md-10">12/12/2019</div>
                      <div class="col-md-2 ">Người chịu trách nhiệm:</div><div class="col-md-10">Lã Mạnh Cường</div>
                      <div class="col-md-2 ">Mô tả:</div><div class="col-md-10">Mô tả chi tiết về dự án</div>
                      <div class="col-md-2 ">Tài liệu:</div><div class="col-md-10">file</div>
                      <div class="col-md-2 "><button class="btn btn-success">Chi tiết</button></div>
                  </div>
              </div>
          </div>


          <div class="col-md-2"></div>
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
          <a href="{{ route('create_task_project') }}" ><button class="btn btn-success" style="margin: 10px 0;">Tạo công việc</button></a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>STT</th>
                <th>Tên công việc</th>
                <th>Tên dự án</th>
                <th>Nhân viên thực hiện</th>
                <th>Deadline</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Tìm nguyên liệu</td>
                      <td>Nghiên cứu thực phẩm chức năng ABC</td>
                      <td>Lã Mạnh Cường</td>
                      <td>12/12/2019</td>
                      <td>Đang thực hiện</td>
                      <td>
                          <button class="btn btn-warning"><a href="detail_task_project.blade.php">Chi tiết</a></button>
                          <button class="btn btn-info">Sửa</button>
                          <button class="btn btn-danger">Xóa</button>
                      </td>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>Tìm nguyên liệu</td>
                      <td>Nghiên cứu thực phẩm chức năng ABC</td>
                      <td>Lã Mạnh Cường</td>
                      <td>12/12/2019</td>
                      <td>Đang thực hiện</td>
                      <td>
                          <button class="btn btn-warning"><a href="detail_task_project.blade.php">Chi tiết</a></button>
                          <button class="btn btn-info">Sửa</button>
                          <button class="btn btn-danger">Xóa</button>
                      </td>
                  </tr>
                  <tr>
                          <td>1</td>
                          <td>Tìm nguyên liệu</td>
                          <td>Nghiên cứu thực phẩm chức năng ABC</td>
                          <td>Lã Mạnh Cường</td>
                          <td>12/12/2019</td>
                          <td>Đang thực hiện</td>
                          <td>
                              <button class="btn btn-warning"><a href="detail_task_project.blade.php">Chi tiết</a></button>
                              <button class="btn btn-info">Sửa</button>
                              <button class="btn btn-danger">Xóa</button>
                          </td>
                      </tr>
                      <tr>
                          <td>1</td>
                          <td>Tìm nguyên liệu</td>
                          <td>Nghiên cứu thực phẩm chức năng ABC</td>
                          <td>Lã Mạnh Cường</td>
                          <td>12/12/2019</td>
                          <td>Đang thực hiện</td>
                          <td>
                              <button class="btn btn-warning"><a href="detail_task_project.blade.php">Chi tiết</a></button>
                              <button class="btn btn-info">Sửa</button>
                              <button class="btn btn-danger">Xóa</button>
                          </td>
                      </tr>
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

@endpush
