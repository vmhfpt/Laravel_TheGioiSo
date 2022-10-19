<div class="form-group col-sm-6 col-md-6 col-lg-5">
    <label>Quận/Huyện<sup>*</sup></label>
    <select id="more-district" class="form-control city" name="district">
        @foreach ($dataItem->getDistrict as $value)
            <option value="{{ $value->maqh }}"> {{ $value->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6 col-md-6 col-lg-5">
    <label>Xã/Phường<sup>*</sup></label>
    <select id="more-wards" class="form-control city" name="wards">
        @foreach ($dataItem->getDistrict()->first()->getWards as $value)
            <option value="{{ $value->xaid }}"> {{ $value->name }}</option>
        @endforeach
    </select>
</div>
