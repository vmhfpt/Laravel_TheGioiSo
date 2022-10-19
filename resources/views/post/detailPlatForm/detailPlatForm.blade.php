<div class="tab-pane fade in active" id="shop-grid-tab">
    <div class="row">
        <div class="shop-product-tab first-sale ">
            @foreach ($dataFilter->get() as $value)
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="two-product">
                        <!-- single-product start -->
                        <div class="single-product">

                            <div class="product-img">
                                <a href="#">
                                    <img class="primary-image"
                                        src="{{ url('storage/products/' . $value->thumb . '') }}" alt="">
                                    <img class="secondary-image"
                                        src="{{ url('storage/products/' . $value->thumb . '') }}" alt="">
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
                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div data-product="{{ $value->id }}" class="compare-button handle-cart">
                                                <a href="javascript:;" title="Add to Cart"><i
                                                        class="icon-bag"></i></a>
                                            </div>
                                        </div>
                                        <div class="quickviewbtn">
                                            <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span
                                        class="new-price">{{ number_format($value->price_sale, 0, '', '.') }}Đ</span>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2 class="product-name"><a href="#">{{ $value->name }}</a></h2>
                                <h2 class="product-name price-init"><a
                                        href="#">{{ number_format($value->price, 0, '', '.') }}Đ</a>
                                </h2>
                                @if ($dataPlatForm->id == 1 || $dataPlatForm->id == 6)
                                <p>Ram:{{ $value->getProductValue()->where('type_id', 2)->first()->getValue->value }},Rom:{{ $value->getProductValue()->where('type_id', 3)->first()->getValue->value }},Chip:{{ $value->getProductValue()->where('type_id', 4)->first()->getValue->value }},Pin:{{ $value->getProductValue()->where('type_id', 6)->first()->getValue->value }}
                                </p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@if ($sumTotal - count($dataFilter->get()) > 0)
<div class="shop-content-bottom">
    <div class="shop-toolbar btn-tlbr">

        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <div class="pages">

                <button data-page="{{$page + 1}}" class="pagination-more"> Xem thêm {{$sumTotal - count($dataFilter->get())}} sảnphẩm</button>
            </div>
        </div>

    </div>
</div>
@endif

