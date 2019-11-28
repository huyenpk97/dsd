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
     Chi tiết quy trình ABC
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Quản lý công việc</a></li>
      <li class="active">Kết quả công việc</li>
    </ol>
  </section>

  <!-- Main content -->
<section class="content">

<!-- /.row -->
<div class="box-body">
  <div class="row">

    <!-- /.col -->
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <!-- Bar chart -->

          <div class="col-md-4">Tên nhân viên</div><div class="col-md-8">Nguyễn Chí Thanh</div>
          <div class="col-md-4">Phòng:</div><div class="col-md-8">Tính lương nhân viênle</div>
          <div class="col-md-4">Tên công việc:</div><div class="col-md-8">Tính lương thôi</div>

          <!-- /.box -->
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-xs-12">

      <!-- /.box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Quy trình: Tính lương nhân viên</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th style="width: 40px">STT</th>
                <th>Tên bước</th>
                <th style="width: 200px">Thời gian hoàn thành</th>
                <th style="width: 100px">Tình trạng</th>
                <th style="width: 100px">Báo cáo</th>
                <th style="width: 40px">Chi tiết</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Công việcs
                </td>
                <td>20/11/2019</td>
                <td><button class=" btn btn-primary btn-warning" >35%</button>
                <td><a href="ketqua_congviec.blade.php">Kết quả</a></td>
                <td><a href="detail_task_project.blade.php"><button class=" btn btn-primary btn-primary" >Chi tiết</button></a>
              </tr>
                <tr>
                  <td>2</td>
                  <td>Tính chuyên cần
                  </td>
                  <td>20/11/2019</td>
                  <td><button class=" btn btn-primary btn-warning" >35%</button>
                    <td><a href="ketqua_congviec.blade.php">Kết quả</a></td>
                    <td><a href="detail_task_project.blade.php"><button class=" btn btn-primary btn-primary" >Chi tiết</button></a>

                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Báo cáo tiến độ
                    </td>
                    <td>20/11/2019</td>
                    <td><button class=" btn btn-primary btn-warning" >35%</button>
                      <td><a href="ketqua_congviec.blade.php">Kết quả</a></td>
                      <td><a href="detail_task_project.blade.php"><button class=" btn btn-primary btn-primary" >Chi tiết</button></a>

                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Lấy thông tin lương
                      </td>
                      <td>20/11/2019</td>
                      <td><button class=" btn btn-primary btn-warning" >35%</button>
                        <td><a href="ketqua_congviec.blade.php">Kết quả</a></td>
                        <td><a href="detail_task_project.blade.php"><button class=" btn btn-primary btn-primary" >Chi tiết</button></a>

                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Tính thưởng
                        </td>
                        <td>20/11/2019</td>
                        <td><button class=" btn btn-primary btn-warning" >35%</button>
                          <td><a href="ketqua_congviec.blade.php">Kết quả</a></td>
                          <td><a href="detail_task_project.blade.php"><button class=" btn btn-primary btn-primary" >Chi tiết</button></a>

                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Tính lương
                          </td>
                          <td>20/11/2019</td>
                          <td><button class=" btn btn-primary btn-warning" >35%</button>
                            <td><a href="ketqua_congviec.blade.php">Kết quả</a></td>
                            <td><a href="detail_task_project.blade.php"><button class=" btn btn-primary btn-primary" >Chi tiết</button></a>

                          </tr>


                        </tbody>

                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                    <label>Nhận xét:</label>
                    <textarea class="form-control" rows="5" placeholder="Nhận xét ..."></textarea>
                  </div>
                  <!-- /.box -->
                  <button type="button" class="btn btn-block btn-success">Nhận xét</button>
                </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.row -->
          </section>

@endsection

@push('js')

@endpush
