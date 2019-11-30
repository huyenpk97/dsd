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
                   <?php 
           $a = file_get_contents('http://morning-oasis-29841.herokuapp.com/api/procedure-by-type/1');
           $list = json_decode($a);
           for ($i=0 ; $i < count($list); $i++){?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$list[$i]->title ?></td>
                        <td><?=$list[$i]->added_by ?></td>
                        <td>Kho</td>
                        <td><?=$list[$i]->created_at ?></td>
                        <td>
                           <a href="chitiet_quytrinh.blade.php" class="btn btn-primary">Chi tiết</a>
                        </td>
                    </tr>
                  <?php } ?>
                   
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


