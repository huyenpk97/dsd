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
        <?php 
        $response = file_get_contents("http://3.1.20.54/v1/projects/".$id);
        $response = json_decode($response);

        ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3 ">Tên dự án:</div><div class="col-md-9"><?=$response->name?></div>
            <div class="col-md-3 ">Deadline:</div><div class="col-md-9"><?=$response->deadline?></div>
            <div class="col-md-3 ">Người chịu trách nhiệm:</div><div class="col-md-9"><?=$response->created_by?></div>
            <div class="col-md-3 ">Mô tả:</div><div class="col-md-9"><?=$response->description?></div>
            <div class="col-md-3 ">Tình trạng:</div><div class="col-md-9"><?=$response->status?></div>
            <div class="col-md-3 ">Tài liệu:</div><div class="col-md-9">file</div>
            <div class="col-md-3 "><button class="btn btn-success">Chi tiết</button></div>
          </div>
        </div>
      </div>


      <div class="col-md-2"></div>
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <a href="{{ route('create_task_project', $id)}}" ><button class="btn btn-success" style="margin: 10px 0;">Tạo công việc</button></a>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên công việc</th>
                <th>Tên dự án</th>
                <!-- <th>Nhân viên thực hiện</th> -->
                <th>Deadline</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>

            </thead>

            <tbody>
             <?php 
             $response1 = file_get_contents('http://3.1.20.54/v1/tasks');
             $response1 = json_decode($response1);
             $list_tast=$response1->results;
             // var_dump($list_tast);
             for($index = 0; $index < count($list_tast) ; $index++){
              if($list_tast[$index]->project==$id){
              $list = $list_tast[$index]->members; ?>
                

                <tr>
                  <td><?=$index?></td>
                  <td><?=$list_tast[$index]->name?></td>
                  <td><?=$response->name?></td>
                 
                  <td><?=$list_tast[$index]->deadline?></td>

                  <td><?=$list_tast[$index]->status?></td>
                  <td>
                    <a href="{{ route('detail_task_project', $list_tast[$index]->id)}}" class="btn btn-primary">Chi tiết</a>
                    <button class="btn btn-info">Sửa</button>
                    <button class="btn btn-danger">Xóa</button>
                  </td>
                </tr>
              <?php } } ?>
             
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
