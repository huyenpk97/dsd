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
      Danh sách thông báo
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>STT</th>
                <th>Tiêu đề thông báo</th>
                <th>Người nhận</th>
                <th>Nội dung</th>
                <th>Tài liệu</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Yêu cầu OT thứ 7</td>
                      <td>Lã Mạnh Cường</td>
                      <td>Để đảm bảo tiến độ công việc</td>
                      <td>FILE</td>
                      <td>Đã gửi</td>
                      <td>
                          12/12/2019
                      </td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>Yêu cầu OT thứ 7</td>
                      <td>Lã Mạnh Cường</td>
                      <td>Để đảm bảo tiến độ công việc</td>
                      <td>FILE</td>
                      <td>Đã gửi</td>
                      <td>
                          12/12/2019
                      </td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>Yêu cầu OT thứ 7</td>
                      <td>Lã Mạnh Cường</td>
                      <td>Để đảm bảo tiến độ công việc</td>
                      <td>FILE</td>
                      <td>Đã gửi</td>
                      <td>
                          12/12/2019
                      </td>
                  </tr>
                  <tr>
                      <td>4</td>
                      <td>Yêu cầu OT thứ 7</td>
                      <td>Lã Mạnh Cường</td>
                      <td>Để đảm bảo tiến độ công việc</td>
                      <td>FILE</td>
                      <td>Đã gửi</td>
                      <td>
                          12/12/2019
                      </td>
                  </tr>
                  <tr>
                      <td>5</td>
                      <td>Yêu cầu OT thứ 7</td>
                      <td>Lã Mạnh Cường</td>
                      <td>Để đảm bảo tiến độ công việc</td>
                      <td>FILE</td>
                      <td>Đã gửi</td>
                      <td>
                          12/12/2019
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