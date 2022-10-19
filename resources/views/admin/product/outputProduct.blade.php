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
        <tr id="{{$value->id}}" {!!$value->view_model != 0 ? 'class="lockCheck-custom"' : ''!!}>
            <td>{{ $key + 1 }}</td>
            <td> {{ $value->name }}
            </td>
            <td> <img src="{{ url('storage/products/' . $value->thumb . '') }}" width="80" height="80" />
            </td>
            <td id="text{{$value->id}}"> <b> @php
                if ($value->view_model == $viewType) {
                    echo '<b>Đã Thêm</b>';
                } else {
                    if ($value->view_model == 1) {
                        echo '<b>Mua nhiều nhất</b>';
                    }
                    if ($value->view_model == 2) {
                        echo '<b>Sản phẩm hót</b>';
                    }
                    if ($value->view_model == 3) {
                        echo '<b>sản phẩm bán chạy</b>';
                    }
                    if ($value->view_model == 0) {
                        echo '<b>Chưa xác định</b>';
                    }
                }
            @endphp</b>
            <td id="change{{$value->id}}">
                <div class="custom-control custom-checkbox">
                    <input name="product[]" value={{$value->id}} @php
                    if($value->view_model != 0){
                        echo 'disabled';
                    }

                    @endphp class="custom-control-input custom-control-input-danger product-checked" type="checkbox"
                        id="customCheckbox{{ $key }}">
                    <label for="customCheckbox{{ $key }}" class="custom-control-label" ></label>
                </div>
            </td>
        </tr>
    @endforeach
    <!--  <tr class="check-success">
            <td>1</td>
            <td> Samsung
            </td>
            <td> <img src="" width="80" height="80"/>
            </td>
            <td> <b > Chưa xác định</b>
             <td><i class='fas fa-check-circle' style='font-size:20px;color:rgb(10, 218, 89)'></i></td>
          </tr>
        <tr>
            <td>1</td>
            <td> Samsung
            </td>
            <td> <img src="" width="80" height="80"/>
            </td>
            <td> <b > Chưa xác định</b>
             <td><div class="custom-control custom-checkbox">
                <input class="custom-control-input custom-control-input-danger" type="checkbox" id="customCheckbox4" >
                <label for="customCheckbox4" class="custom-control-label"></label>
              </div></td>
          </tr>
          <tr class="lockCheck-custom">
            <td>1</td>
            <td> Samsung
            </td>
            <td> <img src="" width="80" height="80"/>
            </td>
            <td> <b class="red-color-text-custom"> đã thêm</b>
            </td>
             <td><div class="custom-control custom-checkbox">
                <input disabled class="custom-control-input custom-control-input-danger" type="checkbox" id="customCheckbox5" >
                <label for="customCheckbox5" class="custom-control-label"></label>
              </div></td>
          </tr>-->

</tbody>
