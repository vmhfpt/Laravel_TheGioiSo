<div class="col-md-5 col-sm-5 col-xs-12">
    <div class="zoomWrapper">
        <div id="img-1" class="zoomWrapper single-zoom">
            <a href="#">
                <img class="change-zoom" id="zoom1" src="{{url('storage/library/'.$dataItem->thumb.'')}}" data-zoom-image="{{url('storage/library/'.$dataItem->thumb.'')}}" alt="{{$dataItem->thumb}}">
            </a>
        </div>
        <div class="single-zoom-thumb">
            <ul class="bxslider" id="gallery_01">
                @foreach ( $dataItem->getLibraryColor as $key => $value)
                <li class="">
                    <a href="javascript:;" class="elevatezoom-gallery" data-image="{{url('storage/library/'.$value->thumb.'')}}" data-zoom-image="{{url('storage/library/'.$value->thumb.'')}}"><img src="{{url('storage/library/'.$value->thumb.'')}}" alt="zo-th-2"></a>
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
                <h2 class="product-name"><a href="#">{{$dataItem->getProduct->name}}</a></h2>
                <div class="rating-price">
                    <div class="pro-rating pro-rating-rank">

                    </div>
                    <div class="price-boxes">
                        <span class="custom-sale new-price">{{ number_format( $dataItem->price, 0, '', '.') }}đ</span>
                    </div>
                    <div class="price-boxes">
                        <span class="new-price">{{ number_format($dataItem->price_sale, 0, '', '.') }}đ</span>
                    </div>
                </div>
                <div class="product-desc">
                    <p>{{$dataItem->getProduct->description}}</p>
                </div>
                <p class="availability in-stock">Tồn kho: <span>{{$dataItem->quantity}} sản phẩm</span></p>

                <div class="actions-e">
                    <div class="action-buttons-single">
                        <div class="inputx-content">
                            <label for="qty">Số lượng:</label>
                            <button id="prev" class="quantyti-button"> - </button>
                            <input type="number" name="qty" id="qty" min="1" max="3" value="1" title="Qty" class="input-text qty">
                            <button id="next" class="quantyti-button"> + </button>
                        </div>
                        <div class="add-cart-custom add-to-cart">
                            <a href="#">Thêm vào giỏ hàng</a>
                        </div>
                        <br/><br/>
                            @foreach ($dataItem->getProduct->getColor as $value)
                            <div data-color="{{$value->id}}" class="add-to-cart change-color">
                                <a class={{$dataItem->id == $value->id ? "active-custom" : ''}} href="javascript:;">{{$value->name_color}}</a>
                            </div>
                            @endforeach

                    </div>
                </div>
                <div class="singl-share">
                    <a href="#"><img src="" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
