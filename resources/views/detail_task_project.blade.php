@extends('layout')
@section('title')
    Danh sách project
@endsection
@push('header')
<style>
    .col-md-2{
        padding: 10px;
    }
    .col-md-10{
        padding: 10px;
    }
</style>
    {{-- <link rel="stylesheet" href="{{ asset('css/format_managements/index.css') }}"> --}}
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/format_managements/index.js') }}"></script> --}}
@endpush
@section('content')
   
<section class="content-header">
    <h1>
      Chi tiết công việc của dự án ABC
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
                  <h3 class="box-title">Chi tiết công việc ABC của dự án XYZ</h3>

                  <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="row box-body">
                      <div class="col-md-2 mt-4 ml-1  ">Tên dự án:</div><div class="col-md-10">Dự án nghiên cứu sản phẩm thực phẩm chức năng ABC</div>
                      <div class="col-md-2 mt-4 ml-1  ">Tên công việc:</div><div class="col-md-10">Tìm kiếm nguồn nguyên liệu</div>
                      <div class="col-md-2 mt-4 ml-1 ">Deadline:</div><div class="col-md-10">12/12/2019</div>
                      <div class="col-md-2 mt-4 ml-1 ">Người chịu trách nhiệm:</div><div class="col-md-10">Lã Mạnh Cường</div>
                      <div class="col-md-2 mt-4 ml-1 ">Mô tả:</div><div class="col-md-10">Mô tả chi tiết về dự án</div>
                      <div class="col-md-2 mt-4 ml-1 ">Tài liệu:</div><div class="col-md-10">file</div>
                      <div class="col-md-2 mt-4 ml-1 ">Trạng thái công việc:</div><div class="col-md-10">Hoàn thành</div>
                      <div class="col-md-2 mt-4 ml-1 ">Thời gian hoàn thành:</div><div class="col-md-10">12/12/2019</div>
                  </div>
                  <form role="form">
                          <div class="box-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Nhận xét</label>
                                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                              </div>
                          </div>

                          <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Gửi</button>
                          </div>
                          </form>
              </div>
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

