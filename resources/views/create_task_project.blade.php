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
      Tạo công việc của dự án ABC
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
          <form role="form">
              <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Tên công việc</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Tên công việc">
                  </div>
                  <div class="form-group">
                          <label for="exampleInputEmail1">Tên dự án</label>
                          <input type="email" class="form-control" disabled id="exampleInputEmail1" value="Dự án ABC" >
                      </div>
                  <div class="form-group">
                      <label>Người chịu trách nhiệm</label>
                      <select class="form-control select2" style="width: 100%;">
                          <option selected="selected">Lã Mạnh Cường</option>
                          <option>Nguyễn Chí Thanh</option>
                          <option>NGuyễn Duy Kỳ</option>
                          <option>Trịnh Duy Hưng</option>
                          <option>Kerlor Senglao</option>
                      </select>
                  </div>
                  <div class="form-group">
                          <label>Date:</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker" value="11/27/2019">
                          </div>
                          <!-- /.input group -->
                        </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Mô tả</label>
                      <textarea rows="4" cols="50" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile" style="width: 100%;">Người phối hợp thực hiện</label>
                      <select class="form-control select2" style="width: 95%; float: left;">
                              <option selected="selected">Lã Mạnh Cường</option>
                              <option>Nguyễn Chí Thanh</option>
                              <option>NGuyễn Duy Kỳ</option>
                              <option>Trịnh Duy Hưng</option>
                              <option>Kerlor Senglao</option>
                      </select>
                      <button class="btn"><i class="fa fa-plus"></i></button>
                  </div>
              </div>

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Tạo</button>
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

@endpush
