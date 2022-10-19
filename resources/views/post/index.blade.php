@extends('post.layout.main')
@section('content_post')
<style>
.select-color {
    color : red;
}
</style>
    <div class="slider-area an-1 hm-1">
        <!-- slider -->
        <div class="bend niceties preview-2">
            <!--  <div id="ensign-nivoslider" class="slides">
                                           <img src="https://usabilitygeek.com/wp-content/uploads/2017/11/sliders-web-design.jpg" alt="" title="#slider-direction-1"  />
                                           <img src="https://usabilitygeek.com/wp-content/uploads/2017/11/sliders-web-design.jpg" alt="" title="#slider-direction-2"  />
                                       </div>-->
            <div id="ensign-nivoslider" class="slides">
                @foreach ($dataSlide as $key => $value)
                    <img src="{{ url('storage/products/' . $value->thumb . '') }}" alt=""
                        title="#slider-direction-{{ $key + 1 }}" />
                @endforeach
            </div>
            @foreach ($dataSlide as $key => $value)
                <div id="slider-direction-{{ $key + 1 }}" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-cn s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <h2 class="title1">{{ $value->name }}</h2>
                            <h3 class="title2">collection</h3>
                            <h4 class="title2">Bắt đầu từ ngày {{ $value->created_at }} </h4>
                            <a class="btn-title" href="">Xem ngay</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <!-- slider end-->
    </div>
    <div class="our-product-area">
        <div class="container">
    @foreach ($dataPlatForm as $value)

                <!-- area title start -->
                <div class="area-title">
                    <h2>{{ $value->name }}</h2>
                </div>
                <!-- area title end -->
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="features-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">Sản phẩm
                                        hót</a>
                                </li>

                            </ul>
                            <!-- Tab pans -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="row">
                                        <div class="features-curosel">
                                            @php
                                                $dataProduct = $value->getProduct;
                                            @endphp
                                            @for ($i = 0, $index = -1; $i < ceil(count($dataProduct) / 2); $i++)
                                                <div class="col-lg-12 col-md-12">
                                                    @for ($j = 0; $j < 2; $j++)
                                                        @php
                                                            $index++;
                                                            if ($j == 2 || $index == count($dataProduct)) {
                                                                break;
                                                            }
                                                        @endphp
                                                        <div class="single-product first-sale">
                                                            <div class="product-img">
                                                                <a href="javascript:;">
                                                                    <img class="primary-image"
                                                                        src="{{ url('storage/products/' . $dataProduct[$index]->thumb . '') }}"
                                                                        alt="" />
                                                                    <img class="secondary-image"
                                                                        src="{{ url('storage/products/' . $dataProduct[$index]->thumb . '') }}"
                                                                        alt="" />
                                                                </a>
                                                                <div class="action-zoom">
                                                                    <div class="add-to-cart">
                                                                        <a href="/{{ $value->slug}}/{{$dataProduct[$index]->slug}}" title="Xem chi tiết"><i
                                                                                class="fa fa-search-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">

                                                                  <div class="select-color">
                                                                        @foreach ($dataProduct[$index]->getColor as $valueColor)
                                                                        <input type="radio" class="form-check-input"
                                                                         name="color_{{$dataProduct[$index]->id}}" value="{{$valueColor->id}}">{{$valueColor->name_color}}
                                                                        @endforeach



                                                                    </div>

                                                                    <div class="action-buttons">
                                                                        <div class="add-to-links">
                                                                            <div class="add-to-wishlist">
                                                                                <a href="#" title="Add to Wishlist"><i
                                                                                        class="fa fa-heart"></i></a>
                                                                            </div>
                                                                            <div data-product="{{$dataProduct[$index]->id}}" class="compare-button handle-cart">
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
                                                                    <span
                                                                        class="new-price">{{ $dataProduct[$index]->price }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <h2 class="product-name"><a
                                                                        href="#">{{ $dataProduct[$index]->name }}</a></h2>
                                                                <p>Mô tả</p>
                                                            </div>
                                                        </div>
                                                    @endfor

                                                </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
    </div>
    </div>
    <script src="/template/post/js/home/home.js"></script>
@endsection
