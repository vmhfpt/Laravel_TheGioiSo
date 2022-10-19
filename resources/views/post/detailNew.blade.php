@extends('post.layout.main')
@section('content_post')
<style>
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
                                <a href="index.html">Tin tức</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $dataItem->title }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-hello-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="f-title text-center">
                        <h3 class="title text-uppercase">{{ $dataItem->title }}</h3>
                    </div>
                    <h5>{{ $dataItem->description }}</h5>
                </div>
            </div>
            <div class="row">

                    <div style=" text-align: center !important" class="about-page-cntent">
                        {!! $dataItem->content !!}
                    </div>


            </div>
        </div>
    </div>
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phẩm liên quan</h2>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($dataPlatForm as $value)
                            <div class="features-curosel">
                                @foreach ($value->getProduct()->take(4)->get()
        as $pr)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product first-sale">
                                            <div class="product-img">
                                                <a href="javascript:;">
                                                    <img class="primary-image" src="{{ url('storage/products/' . $pr->thumb . '') }}" alt="" />
                                                    <img class="secondary-image" src="{{ url('storage/products/' . $pr->thumb . '') }}" alt="" />
                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="/{{ $value->slug }}/{{ $pr->slug }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
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
                                                            <div data-product="{{ $pr->id }}"
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
                                                    <span class="new-price">{{ number_format($pr->price_sale, 0, '', '.') }}Đ</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="/{{ $value->slug }}/{{ $pr->slug }}">{{$pr->name}}</a></h2>
                                                <p>{{$value->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach





                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="/template/post/js/home/home.js"></script>
@endsection
