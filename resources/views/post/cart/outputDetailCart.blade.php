@foreach ($dataCart as $key => $value)

<tr id="delete-detail-{{$value->id}}">
    <td class="width-custom">
        <a href="#"><img src="{{ url('storage/library/' . $value->thumb . '') }}"
                class="img-responsive" alt="" /></a>
    </td>
    <td>
        <h6>{{ $value->getProduct->name }}</h6>
    </td>
    <td><a href="#">{{ $value->name_color }}</a></td>
    <td>
        <div class="cart-price">
            {{ number_format($value->price_sale, 0, '', '.') }}đ </div>
    </td>
    <td class="width-custom-button">
            <button data-id="{{$value->id}}" id="prev" class="quantyti-button"> - </button>
            <input class="input-quantity" id="{{$value->id}}" type="number" value="@php
            echo $arrayQuantity[$value->id];
        @endphp">
         <button data-id="{{$value->id}}" id="next" class="quantyti-button"> + </button>
    </td>
    <td>
        <div class="cart-subtotal">
            @php
                echo number_format($value->price_sale * $arrayQuantity[$value->id], 0, '', '.');
            @endphp
            đ</div>
    </td>
    <td><a class="delete-cart" data-delete="{{$value->id}}" href="javascript:;"><i class="fa fa-times"></i></a></td>
</tr>
@endforeach
