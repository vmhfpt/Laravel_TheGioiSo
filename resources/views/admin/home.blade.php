@extends('admin.layout.main')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Thông tin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thông tin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{count($dataOder->where('active',5))}}</h3>

              <p>Đơn hàng thành công</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{count($dataOder->where('active','<',5))}}<sup style="font-size: 20px"></sup></h3>

              <p>Số đơn hàng đang xử lý</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{number_format($dataOder->where('active',5)->sum('total'), 0, '', '.') }} VNĐ</h3>

              <p>Doanh thu hệ thống</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{count($dataOder->where('active',6))}}</h3>

              <p>Số đơn hàng đã hủy</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">

              <!-- /.card -->

              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Đơn hàng đầu tiên</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Trạng thái</th>
                        <th>Ngày</th>
                        <th>Chi tiết</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($dataOder->take(10) as $key =>$value)
                          <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$value->name}}</td>
                            <td>@php
                                if($value->active == 0){
                                    echo '<span class="badge badge-danger">Chưa tiếp nhận</span>';
                                }
                                if($value->active == 1){
                                    echo '<span class="badge badge-warning">Đã tiếp nhận</span>';
                                }
                                if($value->active == 2){
                                    echo '<span class="badge badge-secondary">Đã xuất kho</span>';
                                }
                                if($value->active == 3){
                                    echo '<span class="badge badge-info">Đang di chuyển</span>';
                                }
                                if($value->active == 4){
                                    echo '<span class="badge badge-primary">Đã đến nơi</span>';
                                }
                                if($value->active == 5){
                                    echo '<span class="badge badge-success">Hoàn thành</span>';
                                }
                                if($value->active == 6){
                                    echo '<span class="badge badge-dark">Đã hủy</span>';
                                }
                            @endphp</td>
                            <td>
                              <div class="sparkbar" >{{$value->updated_at}}</div>
                            </td>
                            <td><a href="/admin/oder/detail/{{$value->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                          </tr>

                          @endforeach

                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Xem tất cả đơn hàng</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Người dùng mới</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger">Tổng {{count($dataUser)}} thành viên</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">

                   @foreach ($dataUser->take(16) as $value)
                   <li>
                    <img  width="95" height="95" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User Image">
                    <a class="users-list-name" href="#">{{$value->name}}</a>
                    <span class="users-list-date">@php
                        if($value->login_type == 1){
                            echo 'Sign by Accrount';
                        }
                        if($value->login_type == 2){
                            echo 'Login with Facebook';
                        }
                        if($value->login_type == 3){
                            echo 'Sign by Google';
                        }
                    @endphp</span>
                    <span class="users-list-date">{{$value->created_at}}</span>
                  </li>
                   @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="javascript:">Xem tất cả người dùng</a>
                </div>
                <!-- /.card-footer -->
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bình luận mới</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Ngày</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody>


                  @foreach ($dataComment as $key => $value)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->created_at}}</td>
                    <td><span class="tag tag-danger">{{$value->getProduct->name}}</span></td>
                    <td>{{$value->content}}</td>
                    <td><span class="badge bg-warning">Kiểm duyệt</span> <span class="badge bg-danger">Xóa bình luận</span></td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="card-footer clearfix">
                <!--<ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>-->
                {{$dataComment->links()}}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection


<!-- bảng oder  có active




bảng status_active
description,
active,
user_id,
oder_id,
created_id,
-->
