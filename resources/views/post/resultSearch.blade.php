@extends('post.layout.main')
@section('content_post')
    <style>
        .active-search {
            background: orange !important;
            color: white !important;
        }

        .pages button {
            background: orange;
            padding: 9px;
            border: none;
            color: white;
        }

        .select-color {
            color: red;
        }
        .price-init {
            text-decoration: line-through;
        }
    </style>




    @if ($total == 0)
        <div class="our-services-info">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-headss">Không tìm thấy sản phẩm nào</h3>
                        </div>
                    </div>
                </div><!-- End .row -->
                <div class="row text-center">
                    <div class="our-services-inner">
                        <div class="col-sm-4">
                            <div class="single-service">
                                <p><i class="fa fa-star"></i></p>
                                <h4>Kiểm tra lỗi chính tả của từ khóa đã nhập
                                </h4>

                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                        <div class="col-sm-4">
                            <div class="single-service">
                                <p><i class="fa fa-heart"></i></p>
                                <h4> Thử lại bằng từ khóa khác
                                </h4>

                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                        <div class="col-sm-4">
                            <div class="single-service">
                                <p><i class="fa fa-camera-retro"></i></p>
                                <h4> Thử lại bằng những từ khóa tổng quát hơn
                                </h4>

                            </div><!-- End .single-service -->
                        </div><!-- End .col-sm-4 -->
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    @else
        <div class="shop-with-sidebar">
            <div class="container">
                <div class="row">
                    <!-- left sidebar start -->

                    <!-- left sidebar end -->
                    <!-- right sidebar start -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <h3> Tìm thấy {{ $total }} kết quả cho "{{ $keyBoard }}"</h3>
                        <!-- shop toolbar start -->
                        <div class="shop-content-area">
                            <div class="shop-toolbar">
                                <div class="exp-tags">
                                    <div class="tags">

                                        @foreach ($arrayResult as $key => $value)
                                            <a data-platform="{{ $value['name'] }}" class="search-more {{ $activePlatForm == $key ? 'active-search' : '' }}"
                                                href="javascript:;">{{ $value['name'] }} ({{ $value['quantity'] }})</a>
                                        @endforeach
                                    </div>
                                </div>


                            </div>
                        </div>
                        @php
                            $demo = 'lap';
                        @endphp
                        <!-- shop toolbar end -->
                        <!-- product-row start -->
                        <div class="tab-content more-product-filter">
                            <div class="tab-pane fade in active" id="shop-grid-tab">
                                <div class="row">
                                    <div class="shop-product-tab first-sale ">
                                        @foreach ($dataItem->where('name', $arrayResult[$activePlatForm]['name']) as $value)
                                            @foreach ($value->getCategory as $ct)
                                                @foreach ($ct->getProduct()->where('name', 'LIKE', "%{$keyBoard}%")->take(9)->get()
        as $pr)
                                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                                        <div class="two-product">

                                                            <div class="single-product">

                                                                <div class="product-img">
                                                                    <a href="#">
                                                                        <img class="primary-image"
                                                                            src="{{ url('storage/products/' . $pr->thumb . '') }}"
                                                                            alt="">
                                                                        <img class="secondary-image"
                                                                            src="{{ url('storage/products/' . $pr->thumb . '') }}"
                                                                            alt="">
                                                                    </a>
                                                                    <div class="action-zoom">
                                                                        <div class="add-to-cart">
                                                                            <a href="/{{ $value->slug }}/{{ $pr->slug }}"
                                                                                title="Quick View"><i
                                                                                    class="fa fa-search-plus"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div class="select-color">
                                                                            @foreach ($pr->getColor as $valueColor)
                                                                                <input type="radio" class="form-check-input"
                                                                                    name="color_{{ $pr->id }}"
                                                                                    value="{{ $valueColor->id }}">{{ $valueColor->name_color }}
                                                                            @endforeach



                                                                        </div>
                                                                        <div class="action-buttons">
                                                                            <div class="add-to-links">
                                                                                <div class="add-to-wishlist">
                                                                                    <a href="#" title="Add to Wishlist"><i
                                                                                            class="fa fa-heart"></i></a>
                                                                                </div>
                                                                                <div data-product="{{$pr->id}}"
                                                                                    class="compare-button handle-cart">
                                                                                    <a href="javascript:;"
                                                                                        title="Add to Cart"><i
                                                                                            class="icon-bag"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="quickviewbtn">
                                                                                <a href="#" title="Add to Compare"><i
                                                                                        class="fa fa-retweet"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box">
                                                                        <span class="new-price">{{number_format($pr->price_sale , 0, '', '.')}}Đ</span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-content">
                                                                    <h2 class="product-name"><a href="#">{{$pr->name}}</a>
                                                                    </h2>
                                                                    <h2 class="product-name price-init"><a
                                                                            href="#">{{number_format($pr->price , 0, '', '.')}}Đ</a>
                                                                    </h2>
                                                                    @if ($dataItem->where('name', $arrayResult[$activePlatForm]['name'])->first()->id == 1 && $dataItem->where('name', $arrayResult[$activePlatForm]['name'])->first()->id == 6)
                                                                    <p>Ram:{{ $pr->getProductValue()->where('type_id', 2)->first()->getValue->value }},Rom:{{ $pr->getProductValue()->where('type_id', 3)->first()->getValue->value }},Chip:{{ $pr->getProductValue()->where('type_id', 4)->first()->getValue->value }},

                                                                        Pin:{{ $pr->getProductValue()->where('type_id', 6)->first()->getValue->value }}

                                                                    </p>
                                                                    @endif

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                        <!-- -->


                                    </div>
                                </div>
                                <!-- product-row end -->
                                <!-- product-row start -->

                                <!-- product-row end -->
                            </div>
                            <!-- list view -->

                            <!-- shop toolbar start -->
                            @if ($arrayResult[$activePlatForm]['quantity'] > 9)
                                <div class="shop-content-bottom">
                                    <div class="shop-toolbar btn-tlbr">

                                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                            <div class="pages">

                                                <button data-page="2" class="pagination-more"> Xem thêm
                                                    {{ $arrayResult[$activePlatForm]['quantity'] - 9 }} sản
                                                    phẩm</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif

                            <!-- shop toolbar end -->
                        </div>
                    </div>
                    <!-- right sidebar end -->
                </div>
            </div>
        </div>
    @endif
    <script src="/template/post/js/home/home.js"></script>
    <script src="/template/post/js/search/search.js"></script>
@endsection
