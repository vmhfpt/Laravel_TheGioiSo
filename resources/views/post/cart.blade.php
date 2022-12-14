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
        // var text = "8.000.000??";
        // mystring = text.replace(/\./g,'');
        //alert(mystring.replace(/??/g,''));
        //var number = mystring.replace(/??/g,'');
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
                                <a href="index.html">Trang ch???</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Gi??? h??ng</span></li>
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
                                        <th>???nh</th>
                                        <th>T??n s???n ph???m</th>
                                        <th>M??u s???c</th>
                                        <th>Gi??</th>
                                        <th>S??? l?????ng</th>
                                        <th>Th??nh ti???n</th>
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
                                                    {{ number_format($value->price_sale, 0, '', '.') }}?? </div>
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
                                                    ??</div>
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
                                                    href="#">Ti???p t???c mua s???m</a></div>
                                            <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn"
                                                    href="#">X??a gi??? h??ng</a></div>
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
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Ch???nh s???a ????n h??ng
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="orderReview" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">
                                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Kh??ch h??ng c?? th??? mua th??m s???n ph???m,ch???nh s???a l???i ????n h??ng c???a m??nh nh?? t??y ch???nh s??? l?????ng, x??a c??c s???n ph???m tr??n gi??? h??ng</font></font></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#checkoutMethod" aria-expanded="false" aria-controls="checkoutMethod" class="collapsed">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">1</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> ph????ng th???c thanh to??n
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
                                                            <h2 class="ct-design"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">KI???M TRA NH?? KH??CH HO???C ????NG K??</font></font></h2>
                                                        </div>
                                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????ng k?? v???i ch??ng t??i ????? c?? ???????c s??? ti???n l???i</font></font></p>
                                                        <div class="reginputlabel">
                                                            <input class="check-out-gues" type="radio">&nbsp;&nbsp;<label class="check-out-gues" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thanh to??n v???i t?? c??ch kh??ch</font></font></label><br>
                                                            <a href=""> ????ng k?? ngay</a>
                                                        </div>
                                                        <p class="savetime"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????ng k?? v?? ti???t ki???m th???i gian!</font></font></p>
                                                    </div>
                                                    <div class="regSaveTime commonChack">
                                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????ng k?? v???i ch??ng t??i ????? thu???n ti???n trong t????ng lai:</font></font></p>
                                                        <ul class="reginputlabel">
                                                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thanh to??n nhanh ch??ng v?? d??? d??ng</font></font></li>
                                                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">D??? d??ng truy c???p v??o l???ch s??? gi??? h??ng v?? tr???ng th??i c???a b???n</font></font></li>
                                                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">L??a tr??? m?? gi???m gi?? theo ch????ng tr??nh ??u ????i</font></font></li>

                                                        </ul>
                                                    </div>


                                                    <a href="#" class="checkPageBtn"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TI???P T???C</font></font></a>
                                                </div>
                                            </div>
                                            @endguest
                                            <div class="col-md-6">
                                                <div class="checkout-login">
                                                        <div class="checkTitle">
                                                            <h2 class="ct-design"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@guest ????ng nh???p @endguest @auth B???n ???? ????ng nh???p @endauth </font></font></h2>
                                                        </div>
                                                    <p class="alrdyReg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@guest ???? ????ng k??? @endguest @auth Xin ch??o kh??ch h??ng {{auth()->user()->name}} @endauth </font></font></p>
                                                    @guest
                                                    <p class="plxLogin"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui l??ng ????ng nh???p b??n d?????i:</font></font></p>
                                                    <div class="loginFrom">
                                                        <p class="plxLoginP"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ?????a ch??? Email</font></font></p>
                                                        <input id="email-ajax" type="email"><br>
                                                        <p class="plxLoginP"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> M???t kh???u</font></font></p>
                                                        <input id="password-ajax" type="password">
                                                        <p class="plxrequired"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*</font></font></span><font style="vertical-align: inherit;"><font id="error-login" style="vertical-align: inherit;"> Tr?????ng b???t bu???c</font></font></p>
                                                        <p class="fgetpass"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qu??n m???t kh???u ?</font></font></p>
                                                    </div>
                                                    <a href="javascript:;" class="checkPageBtn login-ajax"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">????ng nh???p</font></font></a>
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
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">2</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> Th??ng tin Thanh to??n
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="billingInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">

                                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??i???n ?????y ????? c??c th??ng tin thanh to??n. </font><font style="vertical-align: inherit;">?????a ch??? nh???n h??ng, H??? v?? t??n kh??ch h??ng, S??? ??i???n tho???i li??n h???, Email v?? n???i dung kh??ch h??ng mu???n ????? l???i cho ch??ng t??i. </font></font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shippingMethod" aria-expanded="false" aria-controls="shippingMethod">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">3</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> X??c th???c ????n h??ng
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="shippingMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">
                                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">H??? th???ng s??? g???i m?? OTP ?????n email m?? kh??ch h??ng ????ng k?? x??c th???c</font></font></div>
                                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vui l??ng nh???p ????ng Email m?? kh??ch h??ng ???? v?? ??ang s??? d???ng tr??n thi???t b??? c???a m??nh. </font></font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel checkout-accordion">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paymentInformation" aria-expanded="false" aria-controls="paymentInformation">
                                                <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">4</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">Th??ng b??o k???t qu??? ????n h??ng
                                            </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="paymentInformation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                                        <div class="content-info">
                                            <div class="col-md-12">
                                                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">H??? th???ng s??? g???i th??ng b??o ?????n Email tr???ng th??i ????n h??ng</font></font></div>
                                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">K???t qu??? ????n h??ng s??? th??ng b??o tr??n m??n h??nh sau khi x??c th???c ????n h??ng th??nh c??ng. </font><font style="vertical-align: inherit;">B??? ph???n t???ng ????i ch??m s??c kh??ch h??ng ti???p c???n g???i ??i???n x??c th???c th??ng qua s??? ??i???n tho???i. </font><font style="vertical-align: inherit;" class="">????n h??ng s??? xu???t kho di chuy???n ?????n cho kh??ch.</font></font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 category-checkout">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TI???N ????? KI???M TRA C???A B???N</font></font></h5>
                        <ul>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ch???nh s???a ????n h??ng</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ph????ng th???c thanh to??n</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Th??ng tin thanh to??n</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">X??c th???c ????n h??ng (OTP)</font></font></a></li>
                            <li><a href="#" class="link-hover"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Th??ng b??o k???t qu??? ????n h??ng</font></font></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Shopping Cart Table -->
                <!-- Shopping Coupon -->
                <div class="row top-information">
                    <div class="col-md-12 vendee-clue">
                        <!-- Shopping Estimate -->
                        <div class="shipping coupon">
                            <h5>??i???n th??ng tin kh??ch h??ng</h5>
                            <p>Nh???p ?????a ch??? nh???n h??ng c???a b???n bao g??m c?????c ph?? v???n chuy???n</p>
                            <form id="submit-address-shipping">
                                @guest


                                <div class="shippingTitle">
                                    <p><span>*</span>T???nh/Th??nh ph???</p>
                                </div>
                                <div class="selectOption">
                                    <div class="selectParent">
                                        <select class="city" name="city">
                                            <option value="null">-- L???a ch???n --</option>
                                            @foreach ($listCity as $key)
                                                <option value="{{ $key->matp }}"> {{ $key->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="result-address">

                                </div>
                                <div class="shippingTitle">
                                    <p>?????a ch??? s??? nh??:</p><span id="error-address-detail">* b???t bu???c nh???p</span>
                                </div>
                                <div class=" selectOption">
                                    <input  class="input-address-detail" name="address-detail" type="text">
                                </div>
                                <div class="shippingTitle">
                                    <p>H??? & t??n:</p><span id="error-name">* b???t bu???c nh???p</span>
                                </div>
                                <div class="selectOption">
                                    <input  class="input-name" name="name" type="text">
                                </div>
                                <div class="shippingTitle">
                                    <p>S??? ??i???n tho???i:</p><span id="error-phone-number">* b???t bu???c nh???p</span>
                                </div>
                                <div class="selectOption">
                                    <input  class="input-phone-number" class="input-phone-number" name="number"
                                        type="number">
                                </div>
                                <div class="shippingTitle">
                                    <p>Gmail:</p><span id="error-email">* b???t bu???c nh???p</span>
                                </div>
                                <div class="selectOption">
                                    <input class="input-email" name="email" type="email">
                                </div>

                                @endguest
                                @auth
                                    <input value="@auth{{auth()->user()->email}}@endauth"  class="input-email" name="email" type="hidden">
                                @endauth
                                <div class="shippingTitle">
                                    <p>N???i dung:</p>
                                </div>
                                <div>
                                    <textarea name="content" rows="10" cols="43">

                            </textarea>
                                </div>

                            </form>
                        </div>
                        <div class="shipping coupon hidden-sm">
                            <div class="">
                                <h5>M?? gi???m gi??</h5>
                            </div>
                            <p>Nh???p m?? gi???m gi?? c???a b???n (* N???u c??)</p>
                            <form>
                                <input type="text" class="coupon-input">
                                <button class="pull-left" type="submit">??p d???ng</button>
                            </form>
                        </div>



                        <!-- Shopping Code -->
                        <!-- Shopping Totals -->
                        <div class="shipping coupon cart-totals">
                            <ul>
                                <li class="cartSubT">T???m t??nh:
                                    <span id="post"> {{ number_format($total, 0, '', '.') }}??</span>
                                </li>
                                <li class="cartSubT">Ph?? v???n chuy???n :
                                    <span class="transportfee" style="color:red" id="post"> * Vui l??ng l???a ch???n khu
                                        v???c</span>
                                </li>
                                <li class="cartSubT">T???ng c???ng:
                                    <span id="sum">{{ number_format($total, 0, '', '.') }}??</span>
                                </li>
                            </ul>
                            <a class="proceedbtn close-oder" href="javascript:;">Ti???n h??nh ?????t h??ng</a>
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
                                <h2 class="small-title ">Kh??ng c?? s???n ph???m n??o trong gi??? h??ng.</h2>
                                <p><strong>Vui l??ng th??m s???n ph???m v??o trong gi??? h??ng ????? ??i ?????n thanh to??n ! <a
                                            title="Back to Home" href="index.html">Home</a> and start over.</strong></p>
                                <a class="go-to-home" href="/index.html">Ti???p t???c mua s???m</a><br />
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
