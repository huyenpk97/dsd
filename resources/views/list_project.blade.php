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
    Danh sách dự án
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
          <a href="{{ route('create_project') }}" class="btn btn-success" style="margin: 10px 0 ;">Tạo dự án</a>
          <table id="table_projects" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên dự án</th>
                <th>Deadline</th>
                <th>Người chịu trách nhiệm</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            
            <tbody>
              <?php 
              $response = file_get_contents("http://3.1.20.54/v1/projects");
              $response = json_decode($response);
              
              $list_project = $response->results;
              for($index = 0; $index < count($list_project) ; $index++){ ?>

                <tr>
                  <td><?=$index?></td>
                  <td><?=$list_project[$index]->name?></td>
                  <td><?=$list_project[$index]->deadline?></td>
                  <td><?=$list_project[$index]->created_by?></td>
                  <td><?=$list_project[$index]->status?></td>
                  <td>
                    <a href="{{ route('detail_project', $list_project[$index]->id)}}" class="btn btn-primary">Chi tiết</a>
                    <button class="btn btn-info">Sửa</button>
                    <button class="btn btn-danger">Xóa</button>
                  </td>
                </tr>
                <?php

              }
              ?>
              
              

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

@endsection

@push('js')
<script>

  function formatDate(date){
    var dd = String(date.getDate()).padStart(2, '0');
      var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = date.getFullYear();

      date = mm + '/' + dd + '/' + yyyy;
      return date;
    }

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
  </script>
  @endpush


