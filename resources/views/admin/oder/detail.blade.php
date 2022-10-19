@extends('admin.layout.main')
@section('content')

    <style>
        .un-success {
            opacity: 0.22 !important;

        }

        .over-layer {
            display: none;
            background: rgba(0, 0, 0, 0.71);
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            height: 100vh;
            z-index: 998;
        }

        .address-custum {
            display: none;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px !important;
            background-color: white !important;
            width: 400px !important;

            position: fixed !important;
            left: 50% !important;
            top: 50% !important;
            transform: translate(-50%, -50%) !important;
            z-index: 999 !important;

        }

    </style>
    <div class="over-layer">

    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê tiến trình đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Timeline</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="address-custum">
        <div class="card-body">

            <div class="form-group">
                <label>Tỉnh,Thành phố :</label>
                <select name="city" class="city form-control">
                    <option value="null"> -- Lựa chọn --</option>
                    @foreach ($dataCity as $value)
                        <option value="{{ $value->matp }}"> {{ $value->name }}</option>
                    @endforeach

                </select>
            </div>

            <div id="result">
                <div class="form-group">
                    <label>Quận, Huyện :</label>
                    <select id="more-district" name="district" class="district form-control">
                        <option value="null"> -- Lựa chọn--</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Xã,phường,thị trấn :</label>
                    <select id="more-wards" name="wards" class="form-control">
                        <option value="null"> -- Lựa chọn--</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Đỉa chỉ nhận hàng</label>
                <input name="address-detail" type="text" class="form-control" placeholder="Nhập địa chỉ">
            </div>

            <div class="card-footer">
                <button type="button" class="submit-address-oder btn btn-primary">Thay đổi</button>
            </div>


        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User profile picture">
                            </div>


                            <h3 class="profile-username text-center name">{{ $dataOder->name }} <i data-edit="name"
                                    class='fas fa-pen'></i></h3>

                            <p class="text-muted text-center   number">{{ $dataOder->phone_number }} <i data-edit="number"
                                    class='fas fa-pen'></i></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tạm tính</b> <a
                                        class="float-right get-total">{{ number_format($dataOder->total, 0, '', '.') }}đ</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Địa chỉ</b> <a
                                        class="float-right address-change-ajax">{{ $dataOder->address_detail }} <i
                                            data-edit="address-detail" class='address-change fas fa-eraser'></i>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ghi chú</b> <a class="float-right">{{ $dataOder->note }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mã giảm giá</b> <a
                                        class="float-right">{{ number_format($dataOder->discount_code, 0, '', '.') }}đ</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phí vận chuyển</b> <a class="float-right transport-change-ajax">
                                        {{ number_format($dataOder->transport_fee, 0, '', '.') }}đ</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ngày đặt hàng</b> <a class="float-right">{{ $dataOder->created_at }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tổng tiền</b> <a
                                        class="float-right total">{{ number_format($dataOder->total - $dataOder->discount_code + $dataOder->transport_fee, 0, '', '.') }}đ</a>
                                </li>
                            </ul>

                            <a href="/admin/oder/detail-list/{{$dataOder->id}}" class="btn btn-primary btn-block"><b>Xem chi tiết đơn hàng</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- The time line -->

                </div>
                <div class="col-lg-6">

                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-red">Bắt đầu</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        @if (!isset($statusOder[0]))
                            <div class="slider-1 un-success">
                                <i class='far fa-comments bg-dark'></i>
                                <div class="timeline-item ">
                                    <span class="time time-1"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header-1"><a href="#">Đã tiếp nhận đơn hàng</a> Bộ
                                        phận
                                        chăm sóc khách hàng </h3>
                                    <div class="timeline-body timeline-1">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="1" class="success success-1 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="slider-1 ">
                                <i class='far fa-comments bg-dark'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ $statusOder[0]->created_at }}</span>
                                    <h3 class="timeline-header timeline-header-1"><a href="#">Đã tiếp nhận đơn hàng</a> Bộ
                                        phận
                                        chăm sóc khách hàng </h3>
                                    <div class="timeline-body">{{ $statusOder[0]->content }}</div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                            {{ $statusOder[0]->getUser->name }}</a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- END timeline item -->
                        <!-- timeline item -->
                        @if (!isset($statusOder[1]))
                            <div class="slider-2 un-success">
                                <i class='fas fa-home bg-danger'></i>
                                <div class="timeline-item ">
                                    <span class="time time-2"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-2"><a href="#">Đã rời khỏi
                                            kho</a> Bộ phận quản lý kho</h3>
                                    <div class="timeline-body timeline-2">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="2" class="success success-2 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="slider-2 ">
                                <i class='fas fa-home bg-danger'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ $statusOder[1]->created_at }}</span>
                                    <h3 class="timeline-header timeline-header timeline-header-2"><a href="#">Đã rời khỏi
                                            kho</a> Bộ phận quản lý kho</h3>
                                    <div class="timeline-body">{{ $statusOder[1]->content }}</div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                            {{ $statusOder[1]->getUser->name }}</a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (!isset($statusOder[2]))
                            <div class="slider-3 un-success">
                                <i class='fas fa-ambulance bg-warning'></i>
                                <div class="timeline-item ">
                                    <span class="time time-3"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-3"><a href="#">Đang vận
                                            chuyển</a>
                                        Bộ phận vận chuyển </h3>
                                    <div class="timeline-body timeline-3">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="3" class="success success-3 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="slider-3 ">
                                <i class='fas fa-ambulance bg-warning'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ $statusOder[2]->created_at }}</span>
                                    <h3 class="timeline-header timeline-header timeline-header-3"><a href="#">Đang vận
                                            chuyển</a>
                                        Bộ phận vận chuyển </h3>
                                    <div class="timeline-body">{{ $statusOder[2]->content }}</div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                            {{ $statusOder[2]->getUser->name }}</a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- END timeline item -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-green">Tiếp cận</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        @if (!isset($statusOder[3]))
                            <div class="slider-4 un-success">
                                <i class='fas fa-map-marker-alt bg-cyan'></i>
                                <div class="timeline-item ">
                                    <span class="time time-4"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-4"><a href="#">Đã đến
                                            nơi</a> Bộ
                                        phận vận chuyển </h3>
                                    <div class="timeline-body timeline-4">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="4" class="success success-4 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="slider-4 ">
                                <i class='fas fa-map-marker-alt bg-cyan'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i
                                            class="fas fa-clock"></i>{{ $statusOder[3]->created_at }}</span>
                                    <h3 class="timeline-header timeline-header timeline-header-4"><a href="#">Đã đến
                                            nơi</a> Bộ
                                        phận vận chuyển </h3>
                                    <div class="timeline-body">{{ $statusOder[3]->content }}</div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                            {{ $statusOder[3]->getUser->name }}</a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- END timeline item -->
                        <!-- timeline item -->
                        @if (!isset($statusOder[4]))
                            <div class="slider-5 un-success">
                                <i class='fas fa-tasks bg-success'></i>
                                <div class="timeline-item ">
                                    <span class="time time-5"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                    <h3 class="timeline-header timeline-header timeline-header-5"><a href="#">Hoàn
                                            thành</a> Bộ
                                        phận vận chuyển</h3>
                                    <div class="timeline-body timeline-5">
                                    </div>
                                    <div class="timeline-footer">
                                        <a data-active="5" class="success success-5 btn btn-danger btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="slider-5 ">
                                <i class='fas fa-tasks bg-success'></i>
                                <div class="timeline-item ">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ $statusOder[4]->created_at }}</span>
                                    <h3 class="timeline-header timeline-header timeline-header-5"><a href="#">Hoàn
                                            thành</a> Bộ
                                        phận vận chuyển</h3>
                                    <div class="timeline-body">{{ $statusOder[4]->content }}</div>
                                    <div class="timeline-footer">
                                        <a href=":;" class="btn btn-primary btn-sm">Nhân viên :
                                            {{ $statusOder[4]->getUser->name }}</a>
                                        <a href="javascript:;" class="btn btn-success btn-sm">Đã xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- END timeline item -->
                        @if (!isset($statusOder[5]))



                        <div class="slider-6 ">
                            <i class='far fa-frown bg-dark'></i>
                            <div class="timeline-item ">
                                <span class="time time-6"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                <h3 class="timeline-header timeline-header-6"><a href="#">Hủy đơn hàng</a> Toàn nhân viên
                                </h3>
                                <div class="timeline-body timeline-6">
                                    <div class="form-group form-group-6"><label>Nội dung</label>
                                        <textarea id="content-6" class="form-control" rows="3"> Lý do ... </textarea>
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    <a data-active="6" class="success-6 btn btn-dark btn-sm submit">Xác nhận</a>
                                </div>
                            </div>
                        </div>
                        @else

                        <div class="slider-6 ">
                            <i class='far fa-frown bg-dark'></i>
                            <div class="timeline-item ">
                                <span class="time "><i class="fas fa-clock"></i>
                                    {{ $statusOder[5]->created_at }}</span>
                                <h3 class="timeline-header timeline-header timeline-header-6"><a href="#">Đơn hàng đã bị hủy</a> Toàn nhân viên</h3>
                                <div class="timeline-body">{{ $statusOder[5]->content }}</div>
                                <div class="timeline-footer">
                                    <a href=":;" class="btn btn-danger btn-sm">Nhân viên :
                                        {{ $statusOder[5]->getUser->name }}</a>
                                    <a href="javascript:;" class="btn btn-dark btn-sm">Đã xác nhận</a>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                <!-- /.col -->

                <!-- Timelime example  -->


                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
    <script src="/template/admin/js/oder/oder.js"></script>
    <script src="/template/admin/js/ship/ship.js"></script>
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
