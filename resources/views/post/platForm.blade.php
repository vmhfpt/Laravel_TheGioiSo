@extends('post.layout.main')
@section('content_post')
    <style>
        .price-init {
            text-decoration: line-through;
        }

        .select-color {
            color: red;
        }

        .show-select {
            border: 1px solid red !important;
        }

        .show-result button {
            background: orange;
            padding: 9px;
            border: none;
            color: white;
        }

        .pages button {
            background: orange;
            padding: 9px;
            border: none;
            color: white;
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
                            <li class="category3"><span>{{ $dataPlatForm->name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="img/bar-ping.png" alt=""></div>
                                <h2>Bộ lọc</h2>
                            </div>
                        </aside>


                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Đã chọn</h6>
                            </div>
                            <div class="exp-tags">
                                <div class="tags show-delete">

                                    <!--- show select user-->
                                    <!--  <a data-delete="" href="javascript:;">SamSung &times;</a>-->


                                </div>
                            </div>
                        </aside>
                        <div style="clear:both"></div>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Danh mục</h6>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">

                                    @foreach ($dataPlatForm->getCategory as $value)
                                        <a class="filter-category" data-filter="{{ $value->id }}"
                                            href="javascript:;">{{ $value->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </aside>



                        @foreach ($dataPlatForm->getProductType as $type)
                            @if ($type->getType->id == 2 || $type->getType->id == 3)
                                <div style="clear:both"></div>
                                <aside class="sidebar-content">
                                    <div class="sidebar-title">
                                        <h6>{{ $type->getType->description }}</h6>
                                    </div>
                                    <div class="exp-tags">
                                        <div class="tags">

                                            @foreach ($type->getType->getValue()->orderBy('value', 'desc')->get()
        as $value)
                                                @if ($value->value != 'Chưa xác định')
                                                    <a data-filter="{{ $value->id }}"
                                                        class="filter-{{ $type->getType->name }}"
                                                        href="javascript:;">{{ $value->value }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </aside>
                            @endif
                        @endforeach
                        <!--<aside class="sidebar-content">
                                                <div class="sidebar-title">
                                                    <h6>Ram</h6>
                                                </div>
                                                <div class="exp-tags">
                                                    <div class="tags">
                                                        <a data-filter="2" class="filter-price" href="javascript:;">2 Gb</a>
                                                        <a data-filter="3" class="filter-ram" href="javascript:;">3 Gb</a>
                                                        <a data-filter="4" class="filter-ram" href="javascript:;">4 Gb</a>
                                                        <a data-filter="8" class="filter-ram" href="javascript:;">8 Gb</a>
                                                        <a data-filter="12" class="filter-ram" href="javascript:;">12 Gb</a>
                                                    </div>
                                                </div>
                                            </aside>-->
                        <!--      <div style="clear:both"></div>
                                        <aside class="sidebar-content">
                                            <div class="sidebar-title">
                                                <h6>Bộ nhớ trong</h6>
                                            </div>
                                            <div class="exp-tags">
                                                <div class="tags">
                                                    <a href="#">8 Gb</a>
                                                    <a href="#">16 Gb</a>
                                                    <a href="#">32 Gb</a>
                                                    <a href="#">64 Gb</a>
                                                    <a href="#">128 Gb</a>
                                                    <a href="#">256 Gb</a>
                                                    <a href="#">512 Gb</a>

                                                </div>
                                            </div>
                                        </aside>-->
                        <div style="clear:both"></div>
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Giá</h6>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    <a data-filter="1" class="filter-price" href="javascript:;">Dưới 2 triệu</a>
                                    <a data-filter="2" class="filter-price" href="javascript:;">Từ 2 - 4 triệu</a>
                                    <a data-filter="3" class="filter-price" href="javascript:;">Từ 4 - 7 triệu</a>
                                    <a data-filter="4" class="filter-price" href="javascript:;">Từ 7 - 13 triệu</a>
                                    <a data-filter="5" class="filter-price" href="javascript:;">Từ 13 - 20 triệu</a>
                                    <a data-filter="6" class="filter-price" href="javascript:;">Trên 20 triệu</a>

                                </div>
                            </div>
                        </aside>
                        <div style="clear:both"></div>
                        <div class="show-result">
                            <button class="ajax-quantity-show"> Xem </button>
                        </div>


                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">
                                <form class="tree-most" method="get">
                                    <div class="orderby-wrapper">
                                        <label>Sắp xếp</label>
                                        <select name="orderby" class="orderby">
                                            <option value="asc" selected="selected">Giá tăng dần</option>
                                            <option value="desc">Giá giảm dần</option>
                                            <!--   <option value="rating">Sản phẩm hót</option>
                                                    <option value="date">Mua nhiều nhất</option>
                                                    <option value="price">Bán chạy</option>-->

                                        </select>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content more-product-filter">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale ">
                                    @foreach ($dataFilter->get()
        as $value)
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="two-product">
                                                <!-- single-product start -->
                                                <div class="single-product">

                                                    <div class="product-img">
                                                        <a href="javascript:;">
                                                            <img class="primary-image"
                                                                src="{{ url('storage/products/' . $value->thumb . '') }}"
                                                                alt="">
                                                            <img class="secondary-image"
                                                                src="{{ url('storage/products/' . $value->thumb . '') }}"
                                                                alt="">
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="/{{ $dataPlatForm->slug }}/{{ $value->slug }}"
                                                                    title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="select-color">
                                                                @foreach ($value->getColor as $valueColor)
                                                                    <input type="radio" class="form-check-input"
                                                                        name="color_{{ $value->id }}"
                                                                        value="{{ $valueColor->id }}">{{ $valueColor->name_color }}
                                                                @endforeach



                                                            </div>
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="add-to-wishlist">
                                                                        <a href="#" title="Add to Wishlist"><i
                                                                                class="fa fa-heart"></i></a>
                                                                    </div>
                                                                    <div data-product="{{ $value->id }}"
                                                                        class="compare-button handle-cart">
                                                                        <a href="javascript:;" title="Add to Cart"><i
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
                                                            <span
                                                                class="new-price">{{ number_format($value->price_sale, 0, '', '.') }}Đ</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h2 class="product-name"><a href="#">{{ $value->name }}</a>
                                                        </h2>
                                                        <h2 class="product-name price-init"><a
                                                                href="#">{{ number_format($value->price, 0, '', '.') }}Đ</a>
                                                        </h2>
                                                        @if ($dataPlatForm->id == 1 || $dataPlatForm->id == 6)
                                                        <p>Ram:{{ $value->getProductValue()->where('type_id', 2)->first()->getValue->value }},Rom:{{ $value->getProductValue()->where('type_id', 3)->first()->getValue->value }},Chip:{{ $value->getProductValue()->where('type_id', 4)->first()->getValue->value }},

                                                            Pin:{{ $value->getProductValue()->where('type_id', 6)->first()->getValue->value }}

                                                        </p>
                                                        @endif

                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- product-row end -->
                            <!-- product-row start -->

                            <!-- product-row end -->
                        </div>
                        <!-- list view -->

                        <!-- shop toolbar start -->
                        @if ($sumTotal - count($dataFilter->get()) > 0)
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">

                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">

                                        <button data-page="{{$page + 1}}" class="pagination-more"> Xem thêm
                                            {{$sumTotal - count($dataFilter->get())}} sản
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
    <script src="/template/post/js/home/home.js"></script>
    <script src="/template/post/js/detailplatform/detail.js"></script>
@endsection
