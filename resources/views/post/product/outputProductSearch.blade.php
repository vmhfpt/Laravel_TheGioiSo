<span> Sản phẩm gợi ý</span>
<ul class="list-auto-complete">
    @foreach ($dataItem  as $value )
    <a href="/{{$value->getCategory->getBusiness->slug }}/{{$value->slug}}">
        <li>

            <img width="65" height="65"
                src="{{url('storage/products/'.$value->thumb.'')}}">
            <h6> {{$value->name}}</h6><br /><br />
            <b> {{number_format($value->price_sale , 0, '', '.')}}đ </b> <strong>  {{number_format($value->price , 0, '', '.')}}đ</strong>
            <div style="clear:both"> </div>
        </li>

    </a>

    @endforeach
</ul>
