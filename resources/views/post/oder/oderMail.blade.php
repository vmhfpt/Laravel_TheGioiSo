

<!DOCTYPE html>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lavoro | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
  ============================================ -->


    <!-- Fonts
  ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
        type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/bootstrap.min.css">

    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/owl.carousel.css">

    <!-- owl.theme CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/owl.theme.css">

    <!-- owl.transitions CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/owl.transitions.css">

    <!-- font-awesome.min CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/font-awesome.min.css">

    <!-- font-icon CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/fonts/font-icon.css">

    <!-- jquery-ui CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/jquery-ui.css">

    <!-- mobile menu CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/meanmenu.min.css">

    <!-- nivo slider CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/custom-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="/template/post/custom-slider/css/preview.css" type="text/css" media="screen" />

    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/animate.css">

    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/normalize.css">

    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/main.css">

    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/style.css">

    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="/template/post/css/responsive.css">

</head>

<body class="home-one">
    <style>
        .selectOption input {
            color : black !important;
        }
        .title-oder-success {
            color : rgba(255, 255, 255, 0.908);
        }
        .oder-success {
            background: rgba(4, 181, 4, 0.606);
        }
        .title-shopping{
            color : black;
        }
 .error-otp {
     color : red;
 }
 .shopping-used {
     color : red;
     font-size :13px;
     font-style: italic;

 }
        .otp-custum {
            display : none;
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
    float : right;
}


    </style>

    <div class="cart-area-start">


        <div class="container">
            <!-- Shopping Cart Table -->
            @php
                $total = 0;
            @endphp
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <blockquote class="oder-success">
                            <b class="title-oder-success">- Cảm ơn anh chị '{{ $dataInfor['name'] }}' đã tin tưởng mua hàng tại
                                shop.<br />- Vui lòng giữ lại thông tin đặt hàng như số điện thoại
                                ({{ $dataInfor['number'] }}), email để liên lạc với bộ phận vận chuyển trong vòng 24h.<br />-
                                Chi tiết đơn hàng đã mua bên dưới (Đã gửi đến email : '{{ $dataInfor['email'] }}'). <br />
                                - Mọi chi tiết xin liên hệ với tổng đài chăm sóc khác hàng : 03599328904. <br />
                                - Chỉnh sử đơn hàng liên hệ với SĐT : 0359932904 (Trong vòng 30 phút).</b>
                        </blockquote>
                        <table class="cart-table">

                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu sắc</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody id="result-cart">

                                @foreach ($dataCart as $key => $value)
                                    <tr>
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
                                        <td>



                                            <span> x {{ $arrayQuantity[$value->id] }}</span>

                                        </td>
                                        <td>
                                            <div class="cart-subtotal">
                                                @php
                                                    echo number_format($value->price_sale * $arrayQuantity[$value->id], 0, '', '.');
                                                @endphp
                                                đ</div>
                                        </td>

                                    </tr>
                                    @php
                                        $total = $total + $value->price_sale * $arrayQuantity[$value->id];
                                    @endphp
                                @endforeach

                            </tbody>

                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn"
                                                href="/index.html">Tiếp tục mua sắm</a></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Table -->
            <!-- Shopping Coupon -->
            <div class="row">
                <div class="col-md-12 vendee-clue">
                    <!-- Shopping Estimate -->
                    <div class="shipping coupon">
                        <h4>Thông tin khách hàng</h4>
                        <h6 class="title-shopping">* Họ và tên : <b class="shopping-used"> {{ $dataInfor['name'] }}</b></h6>
                        <h6 class="title-shopping">* Số điện thoại : <b class="shopping-used"> {{ $dataInfor['number'] }}</b>
                        </h6>
                        <h6 class="title-shopping">* Email : <b class="shopping-used"> {{ $dataInfor['email'] }}</b></h6>
                        <h6 class="title-shopping">* Xã/huyện/tỉnh : <b class="shopping-used">
                                {{ $dataInfor['wards']->name }}/{{ $dataInfor['district']->name }}/{{ $dataInfor['city']->name }}</b>
                        </h6>
                        <h6 class="title-shopping">* Địa chỉ nhận hàng : <b class="shopping-used">
                                {{ $dataInfor['address-detail'] }}</b></h6>
                        <h6 class="title-shopping">* Nội dung : <b class="shopping-used"> '{{ $dataInfor['content'] }}'</b>
                        </h6>
                        <h6 class="title-shopping">* Ngày giờ  : <b class="shopping-used"> {{ date('Y-m-d H:i:s') }}</b>
                        </h6>
                    </div>
                    <div class="shipping coupon cart-totals">
                        <ul>
                            <li class="cartSubT">Tổng sản phẩm:
                                <span id="sum">{{count($dataCart)}} sản phẩm</span>
                            </li>
                            <li class="cartSubT">Tổng cộng:
                                <span id="sum">{{ number_format($total, 0, '', '.') }}đ</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </body>
    </html>

