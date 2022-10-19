<thead>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Kiểu hiển thị</th>
        <th>Đánh dấu</th>
    </tr>
</thead>
<tbody>
    @foreach ($dataItem as $key => $value)
        <tr id="{{$value->id}}">
            <td>{{ $key + 1 }}</td>
            <td> {{ $value->name }}
            </td>
            <td> <img src="{{ url('storage/products/' . $value->thumb . '') }}" width="80" height="80" />
            </td>
            <td id="text{{$value->id}}"> <b> @php
                    if ($value->view_model == 1) {
                        echo '<b>Mua nhiều nhất</b>';
                    }
                    if ($value->view_model == 2) {
                        echo '<b>Sản phẩm hót</b>';
                    }
                    if ($value->view_model == 3) {
                        echo '<b>sản phẩm bán chạy</b>';
                    }

            @endphp</b>
            <td id="change{{$value->id}}">
                <div class="custom-control custom-checkbox">
                    <input name="product[]" value={{$value->id}} class="custom-control-input custom-control-input-danger product-checked" type="checkbox"
                        id="customCheckbox{{ $key }}">
                    <label for="customCheckbox{{ $key }}" class="custom-control-label" ></label>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
