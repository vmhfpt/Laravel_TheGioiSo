@extends('post.layout.main')
@section('content_post')
    @php
    $listColor = $detailProduct->getColor;
    $dataColor = $detailProduct->getColor()->first();
    $libraryColor = $dataColor->getLibraryColor;
    if (count($libraryColor) == 0) {
        $libraryColor = [];
    }
    $voteRating = [];
    $sumVote = 0;
    $sumTotal = 0;
    for ($i = 1; $i <= 5; $i++) {
        $voteRating[$i] = count(
            $detailProduct
                ->getComment()
                ->where('vote', $i)
                ->where('vote', '!=', 0)
                ->get(),
        );
        $sumVote =
            $sumVote +
            $i *
                count(
                    $detailProduct
                        ->getComment()
                        ->where('vote', $i)
                        ->where('vote', '!=', 0)
                        ->get(),
                );
        $sumTotal =
            $sumTotal +
            count(
                $detailProduct
                    ->getComment()
                    ->where('vote', $i)
                    ->where('vote', '<>', 0)
                    ->get(),
            );
    }

    @endphp
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .active-vote {
            color: orange !important;
        }

        .active-custom {
            background: red !important;
        }

        .showWidth {
            width: 100% !important;
            height: 900px !important;
            overflow: hidden;
        }

        .quantyti-button {
            background: white;
            padding: 4px 10px 4px 10px;
            border: 1px solid rgb(194, 191, 191);
        }

        .custom-error-color {
            position: relative;
            top: 13px;
            color: red;
        }

        .custom-sale {
            font-size: 18px;
            color: rgb(194, 191, 191);
            text-decoration: line-through;
        }

        .commets-child {

            margin-left: 70px !important;
        }

        /*.custom-left {
                      float : left !important;
                            }
                            .custom-right {
                                float : right !important;
                                position: relative;
                                top : -55px;
                                left : 15px;
                            }*/
        .active-page {
            background: rgba(255, 0, 0, 0.411) !important;
        }


        .alert-rating {
            color: red;

        }

        .pro-rating {
            position: relative;
            top: 6px;
        }

        .custum-button-send {
            background: orange;
            padding: 13px;
            border: none;
            color: white;
        }

        .reply-comment-submit {
            background: orange;
            padding: 13px;
            border: none;
            color: white;
        }
        .select-color {
    color : red;
}
    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="index.html">Chi tiết sản phẩm</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $detailProduct->name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-details-area">
        <div class="container">
            <div id="result-detail-color" class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img class="change-zoom" id="zoom1"
                                    src="{{ url('storage/library/' . $dataColor->thumb . '') }}"
                                    data-zoom-image="{{ url('storage/library/' . $dataColor->thumb . '') }}"
                                    alt="{{ $dataColor->thumb }}">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                @foreach ($libraryColor as $key => $value)
                                    <li>
                                        <a href="javascript:;" class="elevatezoom-gallery"
                                            data-image="{{ url('storage/library/' . $value->thumb . '') }}"
                                            data-zoom-image="{{ url('storage/library/' . $value->thumb . '') }}"><img
                                                src="{{ url('storage/library/' . $value->thumb . '') }}"
                                                alt="zo-th-2"></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{ $detailProduct->name }}</a></h2>
                                <div class="rating-price">
                                    <div class="pro-rating pro-rating-rank">

                                        @php
                                            if ($sumVote == 0 || $sumTotal == 0) {
                                                echo str_repeat('<a href="#"><i class="fa fa-star"></i></a>', 5);
                                            } else {
                                                echo str_repeat('<a href="#"><i class="active-vote fa fa-star"></i></a>', ceil($sumVote / $sumTotal));
                                                echo str_repeat('<a href="#"><i class="fa fa-star"></i></a>', 5 - ceil($sumVote / $sumTotal));
                                            }

                                        @endphp
                                        <b>
                                            {{ $sumVote != 0 || $sumTotal != 0 ? round($sumVote / $sumTotal, 2) : 'chưa xếp hạng' }}/5</b>
                                    </div>
                                    <div class="price-boxes">
                                        <span
                                            class="custom-sale new-price">{{ number_format($dataColor->price, 0, '', '.') }}đ</span>
                                    </div>
                                    <div class="price-boxes">
                                        <span
                                            class="new-price">{{ number_format($dataColor->price_sale, 0, '', '.') }}đ</span>
                                    </div>


                                </div>
                                <div class="product-desc">
                                    <p>{{ $detailProduct->description }}</p>
                                </div>
                                <p class="availability in-stock">Tồn kho: <span>{{ $dataColor->quantity }} sản
                                        phẩm</span>
                                </p>

                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Số lượng:</label>
                                            <button id="prev" class="quantyti-button"> - </button>
                                            <input type="number" name="qty" id="qty" min="1" max="3" value="1" title="Qty"
                                                class="input-text qty">
                                            <button id="next" class="quantyti-button"> + </button>
                                        </div>
                                        <div class="add-to-cart add-cart-custom">
                                            <a href="javascript:;">Thêm vào giỏ hàng</a>
                                        </div>
                                        <br /><br />
                                        @foreach ($listColor as $key => $value)
                                            <div data-color="{{ $value->id }}" class="add-to-cart change-color ">
                                                <a href="javascript:;">{{ $value->name_color }}</a>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                <div class="singl-share">
                                    <a href="#"><img src="img/single-share.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="perfect-service">
                <div class="container">
                    <div class="row">
                        <div class="creative-banner">
                            <div class="col-md-4 creative-info">
                                <div class="creative-icon">
                                    <i class="fa fa-plane"></i>
                                </div>
                                <div class="creative-text">
                                    <h3>Miễn phí vận chuyển</h3>
                                    <p>Miễn phí vận chuyển cho các đơn hàng thuộc khu vực gần shop.Trả hàng trong vòng 30
                                        ngày.</p>
                                </div>
                            </div>
                            <div class="col-md-4 creative-info">
                                <div class="creative-icon">
                                    <i class="fa fa-history "></i>
                                </div>
                                <div class="creative-text">
                                    <h3>Hỗ trợ giải đáp 24/7</h3>
                                    <p>Dịch vụ tư vấn chăm sóc khách hàng mở cửa 24/07.</p>
                                </div>
                            </div>
                            <div class="col-md-4 creative-info">
                                <div class="creative-icon">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="creative-text">
                                    <h3>Sản phẩm độc đáo</h3>
                                    <p>Chúng tôi luôn mang lại sự tin tưởng với những sản phẩm tốt,chất lượng tốt, giá cả
                                        phù hợp với khách hàng.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                    <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Nội dung</a></li>
                        <li class=""><a href="#messages" data-toggle="tab"> Đánh giá
                                ({{ count($detailProduct->getComment) }})</a></li>
                        <li><a href="#config" data-toggle="tab">Cấu hình chi tiết</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content showWidth">
                                {!! $detailProduct->content !!}
                            </div>
                            <br /><br />
                            <center>
                                <div class="add-to-cart show-custom">
                                    <a class="show-more hidden-content" style="background: orange !important"
                                        href="javascript:;"> Đọc thêm</a>
                                </div>
                            </center>
                            <br /><br />
                        </div>
                        <div style="clear:both"></div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="single-post-comments col-md-6 col-md-offset-3">
                                @php
                                    $pageCurrent = 1;

                                    $limitPage = 8;

                                    //  dd( count(($detailProduct->getComment()->where('parent_id', 0)->get())) );
                                    $totalPage = ceil(
                                        count(
                                            $detailProduct
                                                ->getComment()
                                                ->where('parent_id', 0)
                                                ->get(),
                                        ) / $limitPage,
                                    );
                                    //   dd($totalPage);
                                    if ($pageCurrent + 2 < $totalPage) {
                                        $next = true;
                                    } else {
                                        $next = false;
                                    }

                                @endphp
                                <div class="comments-area">
                                    <h3 class="comment-reply-title">{{ count($detailProduct->getComment) }} Đánh giá cho
                                        sản phẩm</h3>
                                    <div id="result-comment" class="comments-list">
                                        <ul>

                                            @foreach ($detailProduct->getComment()->where('parent_id', 0)->orderBy('id', 'desc')->offset(0)->limit($limitPage)->get()
        as $value)
                                                <li>
                                                    <div class="comments-details">
                                                        <div class="comments-list-img">
                                                            <img width="40" height="40"
                                                                src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png"
                                                                alt="">
                                                        </div>
                                                        <div class="comments-content-wrap">
                                                            <span>
                                                                <b><a href="#">{{ $value->name }} - </a></b>
                                                                <span
                                                                    class="post-time">{{ $value->created_at }}</span>
                                                            </span>
                                                            <div class="pro-rating">
                                                                @php
                                                                    if ($value->vote != 0) {
                                                                        echo str_repeat('<a href="#"><i class="fa active-vote fa-star"></i></a>', $value->vote);
                                                                        echo str_repeat('<a href="#"><i class="fa fa-star-o"></i></a>', 5 - $value->vote);
                                                                    }

                                                                @endphp
                                                            </div>

                                                            <p>{{ $value->content }}</p>
                                                            <a class="reply-comment add-template-comment-{{ $value->id }}"
                                                                data-reply="{{ $value->id }}" href="javascript:;">
                                                                <span> Trả lời</span></a>


                                                        </div>

                                                    </div>
                                                    @foreach ($value->getCommentChild as $value)
                                                <li>
                                                    <div class="commets-child comments-details">
                                                        <div class="comments-list-img">
                                                            <img width="40" height="40"
                                                                src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png"
                                                                alt="">
                                                        </div>
                                                        <div class="comments-content-wrap">
                                                            <span>
                                                                <b><a href="#">{{ $value->name }} - </a></b>
                                                                <span
                                                                    class="post-time">{{ $value->created_at }}</span>
                                                            </span>

                                                            <p>{{ $value->content }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                            <div class="pages">
                                                <ul>


                                                    @for ($page = 1; $page <= 3; $page++)
                                                        @if ($page <= $totalPage)
                                                            <li data-page="{{ $page }}"
                                                                class="current {{ $page == 1 ? 'active-page' : '' }}">
                                                                {{ $page }}</li>
                                                        @endif
                                                    @endfor
                                                    @if ($next == true)
                                                        <li data-page="2" class="current custom-right"><a
                                                                href="javascript:;" class="next i-next" title="Next"><i
                                                                    class="fa fa-arrow-right"></i></a></li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="comment-respond comment-respond-add">
                                    <h3 class="comment-reply-title">Thêm một bình luận</h3>
                                    <span class="email-notes email-notes-add">Địa chỉ Email, số điện thoại của bạn sẽ không
                                        bị công
                                        bố,vui lòng điền các thông tin bắt buộc nhập *</span>
                                    <form id="sendComment">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Tên *</p>
                                                <input id="name" type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <p>Email *</p>
                                                <input id="email" type="email">
                                            </div>
                                            <div class="col-md-12">
                                                <p>Số điện thoại *</p>
                                                <input id="phone_number" type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <p>Xếp hạng của bạn</p>
                                                <div class="pro-rating">
                                                    <a href="javascript:;"><i id="rating1" data-rating="1"
                                                            class=" fa fa-star-o send-rating"></i></a>
                                                    <a href="javascript:;"><i id="rating2" data-rating="2"
                                                            class="fa fa-star-o send-rating"></i></a>
                                                    <a href="javascript:;"><i id="rating3" data-rating="3"
                                                            class="fa fa-star-o send-rating"></i></a>
                                                    <a href="javascript:;"><i id="rating4" data-rating="4"
                                                            class="fa fa-star-o send-rating"></i></a>
                                                    <a href="javascript:;"><i id="rating5" data-rating="5"
                                                            class="fa fa-star-o send-rating"></i></a>
                                                </div>
                                                <span class="alert-rating"> </span>
                                            </div>
                                            <div class="col-md-12 comment-form-comment">
                                                <p>Đánh giá của bạn</p>
                                                <textarea name="content" id="message" cols="30" rows="10"></textarea>
                                                <button class="custum-button-send" type="button">Gửi </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="config">
                            <table>
                                <tr>
                                    <th>Tên</th>
                                    <th>Giá trị</th>
                                </tr>
                                @foreach ($detailProduct->getProductValue as $value)
                                    <tr>
                                        <td>{{ $value->getType->description }}</td>
                                        <td>{{ $value->getValue->value }}</td>

                                    </tr>
                                @endforeach
                                <!-- <tr>
                                                      <td>Alfreds Futterkiste</td>
                                                      <td>Maria Anders</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Alfreds Futterkiste</td>
                                                        <td>Maria Anders</td>

                                                      </tr> -->

                            </table>
                        </div> <br /> <br />
                    </div>
                </div>
            </div>
        </div>


        <div class="our-product-area new-product">
            <div class="container">
                @foreach ($suggest as $key => $plat)
                <div class="area-title">
                    <h2>{{$key == 0 ? 'Sản phầm đề xuất' : 'Phụ kiện kèm theo'}}</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="features-curosel">

                                @foreach ($plat->getProduct->whereBetween('price_sale', [0, 200000000])->take(10) as $value)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            <a href="/{{$plat->slug}}/{{$value->slug}}">
                                                <img class="primary-image" src="{{ url('storage/products/' . $value->thumb . '') }}" alt="" />
                                                <img class="secondary-image" src="{{ url('storage/products/' . $value->thumb . '') }}" alt="" />
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="/{{$plat->slug}}/{{$value->slug}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="select-color">
                                                    @foreach ($value->getColor as $valueColor)
                                                    <input type="radio" class="form-check-input"
                                                     name="color_{{$value->id}}" value="{{$valueColor->id}}">{{$valueColor->name_color}}
                                                    @endforeach



                                                </div>
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div data-product="{{$value->id}}" class="compare-button handle-cart">
                                                            <a   href="javascript:;" title="Add to Cart"><i
                                                                    class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="javascript:;" title="Add to Compare"><i
                                                                class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">{{ number_format($value->price, 0, '', '.') }}đ</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="#">{{$value->name}}</a></h2>
                                            <p>Nunc facilisis sagittis ullamcorper...</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="latest-post-area">
            <div class="container">
                <div class="area-title">
                    <h2>Tin tức liên quan</h2>
                </div>
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @foreach ($newsSuggest as $value)
                        <div style="height: 500px" class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="/news/{{$value->slug}}">
                                        <img src="{{url('storage/news/'.$value->thumb.'')}}" alt="">
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="/news/{{$value->slug}}">{{$value->title}}</a>

                                    </div>
                                    <div class="postexcerpt">
                                        <p>{{$value->description}}...</p>
                                        <a href="/news/{{$value->slug}}" class="read-more">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        <script src="/template/post/js/detail/detail.js"></script>
        <script src="/template/post/js/home/home.js"></script>
    @endsection
