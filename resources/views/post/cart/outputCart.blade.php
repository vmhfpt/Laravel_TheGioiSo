@php
$total = 0;
$sumCart = 0;

foreach ($arrayCarts as $key => $value) {

    $sumCart = $sumCart + $value;
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
                        <img src="{{ url('storage/library/' . $value->thumb . '') }}" alt="">
                    </a>
                    <div class="small-cart-detail">
                        <a data-delete="{{$value->id}}" class="remove" href="#"><i class="fa fa-times-circle"></i></a>

                        <a class="small-cart-name" href="product-details.html">{{ $value->getProduct->name }}</a>
                        <span
                            class="quantitys"><strong>{{ $arrayCarts[$value->id] }}</strong>x<span>{{ number_format($value->price_sale, 0, '', '.') }}đ</span></span>
                    </div>
                </li>
                @php
                    $total = $total + (int) $arrayCarts[$value->id] * (int) $value->price_sale;
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
