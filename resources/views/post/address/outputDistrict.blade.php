


<div class="shippingTitle">
    <p>Quận/Huyện</p>
</div>
<div class="selectOption">
    <div class="selectParent">
        <select id="more-district" name="district">
            @foreach ($dataItem->getDistrict as $value)
                <option value="{{ $value->maqh }}"> {{ $value->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="shippingTitle">
    <p>Xã/Phường/Thị trấn</p>
</div>
<div class="selectOption">
    <div class="selectParent">
        <select id="more-wards" name="wards">
            @foreach ($dataItem->getDistrict()->first()->getWards as $value)
                <option value="{{ $value->xaid }}"> {{ $value->name }}</option>
            @endforeach
        </select>
    </div>
</div>
