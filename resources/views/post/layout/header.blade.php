<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bán hàng | Trang chủ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/template/post/img/favicon.ico') }}">

    <!-- Fonts
  ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
        type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/bootstrap.min.css') }}">

    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/owl.carousel.css') }}">

    <!-- owl.theme CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/owl.theme.css') }}">

    <!-- owl.transitions CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/owl.transitions.css') }}">

    <!-- font-awesome.min CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/font-awesome.min.css') }}">

    <!-- font-icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/fonts/font-icon.css') }}">

    <!-- jquery-ui CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/jquery-ui.css') }}">

    <!-- mobile menu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/meanmenu.min.css') }}">

    <!-- nivo slider CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/custom-slider/css/nivo-slider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/template/post/custom-slider/css/preview.css') }}" type="text/css"
        media="screen" />

    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/animate.css') }}">

    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/normalize.css') }}">

    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/main.css') }}">

    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/style.css') }}">

    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('/template/post/css/responsive.css') }}">

    <script src="{{ asset('/template/post/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('/template/post/js/vendor/jquery-1.11.3.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('/template/admin/js/ajaxSetup.js') }}"></script>
    <style>
        .logo-custom {
  color : red;
           font-family: 'Indie Flower', cursive !important;
            font-family: 'Roboto', sans-serif !important;

        }
        .list-auto-complete {
            padding-top: 5px;
            background: white !important;
        }

        .list-auto-complete li {
            margin-top: 12px;
            border-bottom: 1px dotted black;
            padding-bottom: 4px;
        }

        .list-auto-complete img {
            float: left;
        }

        .list-auto-complete strong {
            float: left;
        }

        .list-auto-complete b {
            float: left;
        }

        .list-auto-complete h6 {
            float: left;
        }

        .list-auto-complete b {
            color: red;

        }

        .list-auto-complete h6 {

            font-size: 14px;
            color: black;
        }

        .list-auto-complete strong {
            text-decoration: line-through;
            margin-left: 4px;

        }

    </style>
</head>

<body class="home-one">

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header area start -->
    <header class="short-stor">
        <div class="container-fluid">
            <div class="row">
                <!-- logo start -->
                <div class="col-md-3 col-sm-12 text-center nopadding-right">
                    <div class="top-logo">
                        <a href="/index.html"><h1 class="logo-custom"> Chưa biết tên là gì</h1></a>
                    </div>
                </div>
                <!-- logo end -->
                <!-- mainmenu area start -->
                <div class="col-md-6 text-center">
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <li class="expand"><a href="/index.html">Home</a>
                                    @foreach ($dataPlatForm as $value)
                                <li class="expand"><a
                                        href="/detail/{{ $value->slug }}">{{ $value->name }}</a>
                                    @if ($value->slug == 'phu-kien')
                                        <ul class="restrain sub-menu">


                                            @foreach ($value->getCategory()->where('parent_id', 0)->get() as $child)
                                            <li><a href="/detail/{{$value->slug}}?ca={{$child->id}}">{{$child->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                                @endforeach
                                <li class="expand"><a href="/news">Tin tức</a>


                                </li>


                            </ul>
                        </nav>
                    </div>
                    <!-- mobile menu start -->
                    <div class="row">
                        <div class="col-sm-12 mobile-menu-area">
                            <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                                <span class="mobile-menu-title">Menu</span>
                                <nav>
                                    <ul>
                                        <li><a href="/index.html">Home</a>
                                        @foreach ($dataPlatForm as $value)
                                            <li><a href="/detail/{{ $value->slug }}">{{ $value->name }}</a>
                                        @endforeach
                                        <li><a href="/news">Tin tức</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- mobile menu end -->
                </div>
                <!-- mainmenu area end -->
                <!-- top details area start -->
                <div class="col-md-3 col-sm-12 nopadding-left">
                    <div class="top-detail">
                        <!-- language division start -->
                        @auth
                        <div class="disflow">
                            <div class="expand lang-all disflow">

                                <a href="#">{{ auth()->user()->name }}</a>

                            </div>

                        </div>
                        @endauth

                        <!-- language division end -->
                        <!-- addcart top start -->




                        <div class="disflow">
                            <div id="show-cart" class="circle-shopping expand">
                                @guest
                                    <div class="shopping-carts text-right">
                                        @php
                                            $total = 0;
                                            $sumCart = 0;

                                            foreach ($arrayCarts as $key => $value) {
                                                $sumCart = $sumCart + $value;
                                            }

                                        @endphp
                                        <div class="cart-toggler">
                                            <a href="#"><i class="icon-bag"></i></a>
                                            <a href="#"><span class="cart-quantity">{{ $sumCart }}</span></a>
                                        </div>
                                        <div class="restrain small-cart-content">
                                            <ul class="cart-list">
                                                @foreach ($dataCart as $value)
                                                    <li>
                                                        <a class="sm-cart-product" href="product-details.html">
                                                            <img src="{{ url('storage/library/' . $value->thumb . '') }}"
                                                                alt="">
                                                        </a>
                                                        <div class="small-cart-detail">
                                                            <a data-delete="{{ $value->id }}" class="remove"
                                                                href="#"><i class="fa fa-times-circle"></i></a>

                                                            <a class="small-cart-name"
                                                                href="product-details.html">{{ $value->getProduct->name }}</a>
                                                            <span
                                                                class="quantitys"><strong>{{ $arrayCarts[$value->id] }}</strong>x<span>{{ number_format($value->price_sale, 0, '', '.') }}đ</span></span>
                                                        </div>
                                                    </li>
                                                    @php
                                                        $total = $total + (int) $arrayCarts[$value->id] * (int) $value->price_sale;
                                                    @endphp
                                                @endforeach
                                            </ul>
                                            <p class="total">Subtotal: <span
                                                    class="amount">{{ number_format($total, 0, '', '.') }}đ</span>
                                            </p>
                                            <p class="buttons">
                                                <a href="/cart" class="button">Đi đến giỏ hàng</a>
                                            </p>
                                        </div>
                                    </div>
                                @endguest
                                @auth
                                    @php
                                        $total = 0;
                                        $sumCart = 0;

                                        foreach ($dataCart as $key => $value) {
                                            $sumCart = $sumCart + $value->quantity;
                                        }

                                    @endphp

                                    <div class="shopping-carts text-right">
                                        <div class="cart-toggler">
                                            <a href="#"><i class="icon-bag"></i></a>


                                            <a href="#"><span class="cart-quantity">{{ $sumCart }}</span></a>
                                        </div>
                                        <div class="restrain small-cart-content">
                                            <ul class="cart-list">

                                                @foreach ($dataCart as $value)
                                                    <li>
                                                        <a class="sm-cart-product" href="product-details.html">
                                                            <img src="{{ url('storage/library/' . $value->getColor->thumb . '') }}"
                                                                alt="">
                                                        </a>
                                                        <div class="small-cart-detail">
                                                            <a data-delete="{{ $value->getColor->id }}"
                                                                class="remove" href="#"><i
                                                                    class="fa fa-times-circle"></i></a>

                                                            <a class="small-cart-name"
                                                                href="product-details.html">{{ $value->getColor->getProduct->name }}</a>
                                                            <span
                                                                class="quantitys"><strong>{{ $value->quantity }}</strong>x<span>{{ number_format($value->getColor->price_sale, 0, '', '.') }}đ</span></span>
                                                        </div>
                                                    </li>
                                                    @php
                                                        $total = $total + (int) $value->quantity * (int) $value->getColor->price_sale;
                                                    @endphp
                                                @endforeach

                                            </ul>
                                            <p class="total">Tạm tính: <span
                                                    class="amount">{{ number_format($total, 0, '', '.') }}đ</span>
                                            </p>
                                            <p class="buttons">
                                                <a href="/cart" class="button">Đi đến giỏ hàng</a>
                                            </p>
                                        </div>
                                    </div>

                                @endauth
                            </div>
                        </div>
                        <!-- addcart top start -->
                        <!-- search divition start -->
                        <div class="disflow">
                            <div class="header-search expand">
                                <div class="search-icon fa fa-search"></div>
                                <div class="product-search restrain">
                                    <div class="container nopadding-right">
                                        <form action="{{ asset('/tim-kiem') }}" id="searchform" method="get">
                                            <div class="input-group">
                                                <input name="key" type="text" class="form-control search-ajax"
                                                    maxlength="128" placeholder="Nhập tên sản phẩm ...">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><i
                                                            class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                        <div class="auto-complete">

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!-- search divition end -->
                        <div class="disflow">
                            <div class="expand dropps-menu">
                                <a href="#"><i class="fa fa-align-right"></i></a>
                                <ul class="restrain language">
                                    @auth
                                        <li><a href="login.html">{{ auth()->user()->name }}</a></li>
                                        <li><a href="login.html">Thiết lập tài khoản</a></li>
                                    @endauth

                                    <li><a href="/cart">Giỏ hàng</a></li>
                                    @guest
                                        <li><a href="/login">Đăng nhập</a></li>
                                    @endguest
                                    @auth
                                        <li><a href="/logout">Đăng xuất</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- top details area end -->
            </div>
        </div>
    </header>
    <script>
        $(".search-ajax").keyup(function() {
            var key = $(this).val();

            var url = String("/get-keyboard/search-ajax");
            if (key != '') {
                $.ajax({
                    type: "POST",
                    url: String(url),
                    data: {
                        keyboard: key
                    },
                    dataType: "html",
                    success: function(result) {
                        $('.auto-complete').empty();
                        $('.auto-complete').append(result);
                    },
                });
            } else {
                $('.auto-complete').empty();
            }

        });
    </script>
