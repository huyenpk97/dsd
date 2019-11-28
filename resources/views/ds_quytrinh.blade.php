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
   
      <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Danh sách quy trình
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
                    <th>Tên quy trình</th>
                    <th>Phòng ban phụ trách</th>
                    <th>Phòng  ban liên quan</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Quy trình sản xuất thuốc phòng ngừa bệnhs</td>
                          <td>Phòng sản xuất</td>
                          <td>Kho</td>
                          <td></td>
                          <td>
                             <a href="chitiet_quytrinh.blade.php" class="btn btn-primary">Chi tiết</a>
                          </td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Quy trình sản xuất thuốc phòng ngừa bệnhs</td>
                          <td>Phòng sản xuất</td>
                          <td>Kho</td>
                          <td></td>
                          <td>
                             <a href="chitiet_quytrinh.blade.php" class="btn btn-primary">Chi tiết</a>
                          </td>
                      </tr>
                      <tr>
                          <td>3</td>
                          <td>Quy trình sản xuất thuốc phòng ngừa bệnhs</td>
                          <td>Phòng sản xuất</td>
                          <td>Kho</td>
                          <td></td>
                          <td>
                             <a href="chitiet_quytrinh.blade.php" class="btn btn-primary">Chi tiết</a>
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

