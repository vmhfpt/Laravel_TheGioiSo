<div class="container">
    <!-- Shopping Cart Table -->
    @php
        $total = 0;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <blockquote class="oder-success">
                    <b class="title-oder-success">- Cảm ơn anh chị '{{ $information['name'] }}' đã tin tưởng mua hàng tại
                        shop.<br />- Vui lòng giữ lại thông tin đặt hàng như số điện thoại
                        ({{ $information['number'] }}), email để liên lạc với bộ phận vận chuyển trong vòng 24h.<br />-
                        Chi tiết đơn hàng đã mua bên dưới (Đã gửi đến email : '{{ $information['email'] }}'). <br />
                        - Mọi chi tiết xin liên hệ với tổng đài chăm sóc khác hàng : 03599328904. <br />
                        - Chỉnh sử đơn hàng liên hệ với SĐT : 0359932904 (Trong vòng 30 phút).</b>
                </blockquote>
                <table class="cart-table">

                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody id="result-cart">

                        @foreach ($dataCart as $key => $value)
                            <tr>
                                <td class="width-custom">
                                    <a href="#"><img src="{{ url('storage/library/' . $value->thumb . '') }}"
                                            class="img-responsive" alt=""></a>
                                </td>
                                <td>
                                    <h6>{{ $value->getProduct->name }}</h6>
                                </td>
                                <td><a href="#">{{ $value->name_color }}</a></td>
                                <td>
                                    <div class="cart-price">
                                        {{ number_format($value->price_sale, 0, '', '.') }}đ </div>
                                </td>
                                <td>



                                    <span> {{ $arrayQuantity[$value->id] }}</span>

                                </td>
                                <td>
                                    <div class="cart-subtotal">
                                        @php
                                            echo number_format($value->price_sale * $arrayQuantity[$value->id], 0, '', '.');
                                        @endphp
                                        đ</div>
                                </td>

                            </tr>
                            @php
                                $total = $total + $value->price_sale * $arrayQuantity[$value->id];
                            @endphp
                        @endforeach

                    </tbody>

                    <tr>
                        <td class="actions-crt" colspan="7">
                            <div class="">
                                <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn"
                                        href="/index.html">Tiếp tục mua sắm</a></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Table -->
    <!-- Shopping Coupon -->
    <div class="row">
        <div class="col-md-12 vendee-clue">
            <!-- Shopping Estimate -->
            <div class="shipping coupon">
                <h4>Thông tin khách hàng</h4>
                <h6 class="title-shopping">* Họ và tên : <b class="shopping-used"> {{ $information['name'] }}</b></h6>
                <h6 class="title-shopping">* Số điện thoại : <b class="shopping-used"> {{ $information['number'] }}</b>
                </h6>
                <h6 class="title-shopping">* Email : <b class="shopping-used"> {{ $information['email'] }}</b></h6>
                <h6 class="title-shopping">* Xã/huyện/tỉnh : <b class="shopping-used">
                        {{ $information['wards']->name }}/{{ $information['district']->name }}/{{ $information['city']->name }}</b>
                </h6>
                <h6 class="title-shopping">* Địa chỉ nhận hàng : <b class="shopping-used">
                        {{ $information['address-detail'] }}</b></h6>
                <h6 class="title-shopping">* Nội dung : <b class="shopping-used"> '{{ $information['content'] }}'</b>
                </h6>
                <h6 class="title-shopping">* Ngày giờ  : <b class="shopping-used"> {{ date('Y-m-d H:i:s') }}</b>
                </h6>
            </div>
            <div class="shipping coupon cart-totals">
                <ul>
                    <li class="cartSubT">Tổng sản phẩm:
                        <span id="sum">{{count($dataCart)}} sản phẩm</span>
                    </li>
                    <li class="cartSubT">Tổng cộng:
                        <span id="sum">{{ number_format($total, 0, '', '.') }}đ</span>
                    </li>
                </ul>
            </div>
            <!-- Shopping Totals -->
        </div>
    </div>
    <!-- Shopping Coupon -->
</div>
