@extends('post.layout.main')
@section('content_post')
    <style>
        .selectOption input {
            color: black !important;
        }

        .title-oder-success {
            color: rgba(255, 255, 255, 0.908);
        }

        .oder-success {
            background: rgba(4, 181, 4, 0.606);
        }

        .title-shopping {
            color: black;
        }

        .error-otp {
            color: red;
        }

        .shopping-used {
            color: red;
            font-size: 13px;
            font-style: italic;

        }

        .otp-custum {
            display: none;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px !important;
            background-color: white !important;
            width: 300px !important;
            height: 300px !important;
            position: fixed !important;
            left: 50% !important;
            top: 50% !important;
            transform: translate(-50%, -50%) !important;
            z-index: 999 !important;

        }

        .quantyti-button {
            background: white;
            padding: 4px 10px 4px 10px;
            border: 1px solid rgb(194, 191, 191);

        }

        .input-quantity {
            width: 30px !important;
            background: white !important;

            border: 1px solid rgb(194, 191, 191) !important;
        }

        .width-custom {
            width: 300px !important;
        }

        .width-custom-button {
            width: 600px !important;
        }

        .close-custom {
            font-size: 26px !important;
            float: right;
        }

        .empty-cart {
            width: 360px !important;
            height: 250px !important;
            position: relative;
            top: -20px;


        }

        .empty-cart {
            padding: 0px !important;
            margin: 0px !important;
        }

    </style>
    <script>
        // var text = "8.000.000đ";
        // mystring = text.replace(/\./g,'');
        //alert(mystring.replace(/đ/g,''));
        //var number = mystring.replace(/đ/g,'');
        //console.log(Number(number));
    </script>
    @php
    $total = 0;
    @endphp

    <div class="breadcrumbs">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Giỏ hàng</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-area-start">
        @if (count($dataCart) > 0)
            <div class="container">
                <!-- Shopping Cart Table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Màu sắc</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="result-cart">

                                    @foreach ($dataCart as $key => $value)
                                        <tr class="cccc" id="delete-detail-{{ $value->id }}">
                                            {{-- <td>
                                    <a href="#"><img src="{{ url('storage/library/' . $value->thumb . '') }}"
                                            class="img-responsive" alt="" /></a>
                                </td> --}}
                                            <td class="width-custom">
                                                <a href="#"><img src="{{ url('storage/library/' . $value->thumb . '') }}"
                                                        class="img-responsive" alt=""></a>
                                            </td>
                                            <td>
                                                <h6>{{ $value->getProduct->name }}</h6>
                                            </td>
                                            <td><a href="#">{{ $value->name_color }}</a></td>
                                            <td>
                                                <div class="cart-price">
                                                    {{ number_format($value->price_sale, 0, '', '.') }}đ </div>
                                            </td>
                                            <td class="width-custom-button">

                                                <button data-id="{{ $value->id }}" id="prev" class="quantyti-button"> -
                                                </button>

                                                <input class="input-quantity" id="{{ $value->id }}" type="number"
                                                    value="@php
                                                        echo $arrayQuantity[$value->id];
                                                    @endphp">
                                                <button data-id="{{ $value->id }}" id="next" class="quantyti-button"> +
                                                </button>

                                            </td>
                                            <td>
                                                <div class="cart-subtotal">
                                                    @php
                                                        echo number_format($value->price_sale * $arrayQuantity[$value->id], 0, '', '.');
                                                        $total = $total + $value->price_sale * $arrayQuantity[$value->id];
                                                    @endphp
                                                    đ</div>
                                            </td>
                                            <td><a class="delete-cart" data-delete="{{ $value->id }}"
                                                    href="javascript:;"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                    @endforeach


                                </tbody>

                                <tr>
                                    <td class="actions-crt" colspan="7">
                                        <div class="">
                                            <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn"
                                                    href="#">Tiếp tục mua sắm</a></div>
                                            <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn"
                                                    href="#">Xóa giỏ hàng</a></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="checkout-content">
                        <div class="col-md-9 check-out-blok">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#orderReview" aria-expanded="false" aria-controls="orderReview">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Chỉnh sửa đơn hàng
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="orderReview" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">
                                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Khách hàng có thể mua thêm sản phẩm,chỉnh sửa lại đơn hàng của mình như tùy chỉnh số lượng, xóa các sản phẩm trên giỏ hàng</font></font></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#checkoutMethod" aria-expanded="false" aria-controls="checkoutMethod" class="collapsed">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">1</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> phương thức thanh toán
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="checkoutMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            @guest


                                            <div class="col-md-6">
                                                <div class="checkout-reg">
                                                    <div class="checkReg commonChack">
                                                        <div class="checkTitle">
                                                            <h2 class="ct-design"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">KIỂM TRA NHƯ KHÁCH HOẶC ĐĂNG KÝ</font></font></h2>
                                                        </div>
                                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký với chúng tôi để có được sự tiện lợi</font></font></p>
                                                        <div class="reginputlabel">
                                                            <input class="check-out-gues" type="radio">&nbsp;&nbsp;<label class="check-out-gues" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thanh toán với tư cách khách</font></font></label><br>
                                                            <a href=""> Đăng ký ngay</a>
                                                        </div>
                                                        <p class="savetime"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký và tiết kiệm thời gian!</font></font></p>
                                                    </div>
                                                    <div class="regSaveTime commonChack">
                                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký với chúng tôi để thuận tiện trong tương lai:</font></font></p>
                                                        <ul class="reginputlabel">
                                                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thanh toán nhanh chóng và dễ dàng</font></font></li>
                                                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">Dễ dàng truy cập vào lịch sử giỏ hàng và trạng thái của bạn</font></font></li>
                                                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">Lưa trữ mã giảm giá theo chương trình ưu đãi</font></font></li>

                                                        </ul>
                                                    </div>


                                                    <a href="#" class="checkPageBtn"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIẾP TỤC</font></font></a>
                                                </div>
                                            </div>
                                            @endguest
                                            <div class="col-md-6">
                                                <div class="checkout-login">
                                                        <div class="checkTitle">
                                                            <h2 class="ct-design"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@guest Đăng nhập @endguest @auth Bạn đã đăng nhập @endauth </font></font></h2>
                                                        </div>
                                                    <p class="alrdyReg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@guest Đã đăng ký? @endguest @auth Xin chào khách hàng {{auth()->user()->name}} @endauth </font></font></p>
                                                    @guest
                                                    <p class="plxLogin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui lòng đăng nhập bên dưới:</font></font></p>
                                                    <div class="loginFrom">
                                                        <p class="plxLoginP"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Địa chỉ Email</font></font></p>
                                                        <input id="email-ajax" type="email"><br>
                                                        <p class="plxLoginP"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Mật khẩu</font></font></p>
                                                        <input id="password-ajax" type="password">
                                                        <p class="plxrequired"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font id="error-login" style="vertical-align: inherit;"> Trường bắt buộc</font></font></p>
                                                        <p class="fgetpass"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quên mật khẩu ?</font></font></p>
                                                    </div>
                                                    <a href="javascript:;" class="checkPageBtn login-ajax"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập</font></font></a>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#billingInformation" aria-expanded="false" aria-controls="billingInformation">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">2</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> Thông tin Thanh toán
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="billingInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">

                                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Điền đầy đủ các thông tin thanh toán. </font><font style="vertical-align: inherit;">Địa chỉ nhận hàng, Họ và tên khách hàng, Số điện thoại liên hệ, Email và nội dung khách hàng muốn để lại cho chúng tôi. </font></font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shippingMethod" aria-expanded="false" aria-controls="shippingMethod">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">3</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> Xác thực đơn hàng
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="shippingMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">
                                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hệ thống sẽ gửi mã OTP đến email mà khách hàng đăng ký xác thực</font></font></div>
                                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui lòng nhập đúng Email mà khách hàng đã và đang sử dụng trên thiết bị của mình. </font></font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paymentInformation" aria-expanded="false" aria-controls="paymentInformation">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">4</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">Thông báo kết quả đơn hàng
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="paymentInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">
                                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hệ thống sẽ gửi thông báo đến Email trạng thái đơn hàng</font></font></div>
                                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kết quả đơn hàng sẽ thông báo trên màn hình sau khi xác thực đơn hàng thành công. </font><font style="vertical-align: inherit;">Bộ phận tổng đài chăm sóc khách hàng tiếp cận gọi điện xác thực thông qua số điện thoại. </font><font style="vertical-align: inherit;" class="">Đơn hàng sẽ xuất kho di chuyển đến cho khách.</font></font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 category-checkout">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIẾN ĐỘ KIỂM TRA CỦA BẠN</font></font></h5>
                        <ul>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chỉnh sửa đơn hàng</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phương thức thanh toán</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thông tin thanh toán</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Xác thực đơn hàng (OTP)</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thông báo kết quả đơn hàng</font></font></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Shopping Cart Table -->
                <!-- Shopping Coupon -->
                <div class="row top-information">
                    <div class="col-md-12 vendee-clue">
                        <!-- Shopping Estimate -->
                        <div class="shipping coupon">
                            <h5>Điền thông tin khách hàng</h5>
                            <p>Nhập đỉa chỉ nhận hàng của bạn bao gôm cước phí vận chuyển</p>
                            <form id="submit-address-shipping">
                                @guest


                                <div class="shippingTitle">
                                    <p><span>*</span>Tỉnh/Thành phố</p>
                                </div>
                                <div class="selectOption">
                                    <div class="selectParent">
                                        <select class="city" name="city">
                                            <option value="null">-- Lựa chọn --</option>
                                            @foreach ($listCity as $key)
                                                <option value="{{ $key->matp }}"> {{ $key->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="result-address">

                                </div>
                                <div class="shippingTitle">
                                    <p>Đỉa chỉ số nhà:</p><span id="error-address-detail">* bắt buộc nhập</span>
                                </div>
                                <div class=" selectOption">
                                    <input  class="input-address-detail" name="address-detail" type="text">
                                </div>
                                <div class="shippingTitle">
                                    <p>Họ & tên:</p><span id="error-name">* bắt buộc nhập</span>
                                </div>
                                <div class="selectOption">
                                    <input  class="input-name" name="name" type="text">
                                </div>
                                <div class="shippingTitle">
                                    <p>Số điện thoại:</p><span id="error-phone-number">* bắt buộc nhập</span>
                                </div>
                                <div class="selectOption">
                                    <input  class="input-phone-number" class="input-phone-number" name="number"
                                        type="number">
                                </div>
                                <div class="shippingTitle">
                                    <p>Gmail:</p><span id="error-email">* bắt buộc nhập</span>
                                </div>
                                <div class="selectOption">
                                    <input class="input-email" name="email" type="email">
                                </div>

                                @endguest
                                @auth
                                    <input value="@auth{{auth()->user()->email}}@endauth"  class="input-email" name="email" type="hidden">
                                @endauth
                                <div class="shippingTitle">
                                    <p>Nội dung:</p>
                                </div>
                                <div>
                                    <textarea name="content" rows="10" cols="43">

                            </textarea>
                                </div>

                            </form>
                        </div>
                        <div class="shipping coupon hidden-sm">
                            <div class="">
                                <h5>Mã giảm giá</h5>
                            </div>
                            <p>Nhập mã giảm giá của bạn (* Nếu có)</p>
                            <form>
                                <input type="text" class="coupon-input">
                                <button class="pull-left" type="submit">Áp dụng</button>
                            </form>
                        </div>



                        <!-- Shopping Code -->
                        <!-- Shopping Totals -->
                        <div class="shipping coupon cart-totals">
                            <ul>
                                <li class="cartSubT">Tạm tính:
                                    <span id="post"> {{ number_format($total, 0, '', '.') }}đ</span>
                                </li>
                                <li class="cartSubT">Phí vận chuyển :
                                    <span class="transportfee" style="color:red" id="post"> * Vui lòng lựa chọn khu
                                        vực</span>
                                </li>
                                <li class="cartSubT">Tổng cộng:
                                    <span id="sum">{{ number_format($total, 0, '', '.') }}đ</span>
                                </li>
                            </ul>
                            <a class="proceedbtn close-oder" href="javascript:;">Tiến hành đặt hàng</a>
                            <div class="multiCheckout">
                                <a href="#">Checkout with Multiple Addresses</a>
                            </div>
                        </div>
                        <!-- Shopping Totals -->
                    </div>
                </div>
                <!-- Shopping Coupon -->
            </div>
        @else
            <div class="not-found">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-not-found">
                                <center><img class="empty-cart"
                                        src="https://sethisbakery.com/assets/website/images/empty-cart.png"> </center>
                                <h2 class="small-title ">Không có sản phẩm nào trong giỏ hàng.</h2>
                                <p><strong>Vui lòng thêm sản phẩm vào trong giỏ hàng để đi đến thanh toán ! <a
                                            title="Back to Home" href="index.html">Home</a> and start over.</strong></p>
                                <a class="go-to-home" href="/index.html">Tiếp tục mua sắm</a><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <script src="/template/post/js/detailCart/detailCart.js"></script>
    <script src="/template/post/js/home/home.js"></script>
@endsection
