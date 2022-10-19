<div class="form-group">
    <label>Quận, Huyện :</label>
    <select id="more-district" name="district" class="district form-control">
        @foreach ($dataItem->getDistrict as $value)
            <option value="{{ $value->maqh }}"> {{ $value->name }}</option>
        @endforeach
    </select>
</div>
{{-- {{$dataItem->getDistrict()->first()->maqh}}--}}
<div class="form-group">
    <label>Xã,phường,thị trấn :</label>
    <select id="more-wards" name="wards" class="form-control">
        @foreach ($dataItem->getDistrict()->first()->getWards as $value)
            <option  value="{{ $value->xaid}}" > {{ $value->name }}</option>
        @endforeach
    </select>
</div>
