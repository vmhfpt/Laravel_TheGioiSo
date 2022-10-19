@extends('admin.layout.main')
@section('content')
    <div class="wrapper">



        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết đơn hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Ảnh</th>
                                                        <th>Tên</th>
                                                        <th>Màu sắc</th>
                                                        <th>Giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng</th>
                                                        <th> Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total = 0;
                                                    @endphp
                                                    <!-- <tr>
                                                    <td>175</td>
                                                    <td>Mike Doe</td>
                                                    <td>11-7-2014</td>
                                                    <td><span class="tag tag-danger">Denied</span></td>
                                                    <td><a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                                                  </tr> -->
                                                    @foreach ($dataOder->getOderDetail as $key => $value)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td> <img
                                                                    src="{{ url('storage/library/' . $value->getManageColor->thumb . '') }}"
                                                                    width="80" height="80" /></td>
                                                            <td>{{ $value->getManageColor->getProduct->name }}</td>
                                                            <td>{{ $value->getManageColor->name_color }}</td>
                                                            <td>{{ $value->getManageColor->price_sale }}</td>
                                                            <td>{{ $value->quantity }}</td>
                                                            <td>{{ $value->getManageColor->price_sale * $value->quantity }}
                                                            </td>

                                                            <td><a href="#" class="btn btn-danger"><i
                                                                        class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                        @php
                                                         $total = $total + ($value->getManageColor->price_sale * $value->quantity  );
                                                        @endphp
                                                    @endforeach
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Tổng sản phẩm {{ $dataOder->getOderDetail->sum('quantity') }}
                                                        </th>
                                                        <th>Tổng tiền : {{$total}}</th>
                                                        <th></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- /.content-wrapper -->


    </div>
    <script src="/template/admin/js/oder/oder.js"></script>
@endsection

<!-- Đối với trạng thái của một đơn hàng đã đẩy lên hệ thốn

 0 => chưa tiếp nhận
 1 => đã tiếp nhận
 2 => đã xuất kho
 3 => đang di chuyển
 4 => đã đến nơi
 5 => {
     + đã nhận (thời gian)
     + 6 đã hủy {
         lý do : trả hàng

     }
 }

-->
