<div class="tab-pane fade in active" id="shop-grid-tab">
    <div class="row">
        <div class="shop-product-tab first-sale ">


            @foreach ($dataItem->getCategory as $ct)
                @foreach ($ct->getProduct()->where('name', 'LIKE', "%{$keyBoard}%")->take($page * 9)->get()
    as $pr)

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="two-product">

                            <div class="single-product">

                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-image"
                                            src="{{ url('storage/products/' . $pr->thumb . '') }}" alt="">
                                        <img class="secondary-image"
                                            src="{{ url('storage/products/' . $pr->thumb . '') }}" alt="">
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="/{{ $dataItem->slug }}/{{ $pr->slug }}" title="Quick View"><i
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
                                                <div data-product="{{ $pr->id }}"
                                                    class="compare-button handle-cart">
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
                                            class="new-price">{{ number_format($pr->price_sale, 0, '', '.') }}Đ</span>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name"><a href="#">{{ $pr->name }}</a>
                                    </h2>
                                    <h2 class="product-name price-init"><a
                                            href="#">{{ number_format($pr->price, 0, '', '.') }}Đ</a>
                                    </h2>
                                    @if ($dataItem->id == 1 || $dataItem->id == 6)
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



        </div>
    </div>
    <!-- product-row end -->
    <!-- product-row start -->

    <!-- product-row end -->
</div>
<!-- list view -->

<!-- shop toolbar start -->
@if ($total - ( $page * 9) > 0)
<div class="shop-content-bottom">
    <div class="shop-toolbar btn-tlbr">

        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
            <div class="pages">

                <button data-page="{{$page + 1}}" class="pagination-more"> Xem thêm
                    {{$total - $page * 9}} sản
                    phẩm</button>
            </div>
        </div>

    </div>
</div>

@endif
