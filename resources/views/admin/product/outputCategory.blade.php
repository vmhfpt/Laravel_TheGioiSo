

<div class="col-sm-6">
    <!-- select -->
    <div class="form-group">
      <label>Danh mục :</label>
     <select  name="platform_id" class="change-category form-control">
        @foreach ($dataItem as $value)
        <option value="{{ $value->id }}"> {{ $value->name }}</option>
    @endforeach
      </select>
    </div>
  </div>

<div class="col-sm-6">
    <div class="form-group">
      <label>Kiểu xem</label>
      <select  name="view_model" class="change-view-model form-control" >
          <option id="default-select" value="0">-- Lựa Chọn --</option>
        <option value="1">Mua nhiều nhất</option>
        <option value="2">Sản phẩm hot</option>
        <option value="3">Sản phẩm bán chạy</option>
      </select>
    </div>
  </div>
