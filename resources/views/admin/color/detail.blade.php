@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên Màu</th>
      <th>Số lượng</th>
      <th>Ảnh đại diện</th>
      <th>Giá gốc</th>
      <th>Giá ưu đãi</th>
      <th>Trạng thái</th>
      <th>Thư viện ảnh</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($listItem as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td> {{$value->name_color}}
            </td>
            <td> {{$value->quantity}} </td>
            <td> <img src="{{url('storage/library/'.$value->thumb.'')}}" width="80" height="80"/>
            </td>
             <td>{{$value->price}}</td>
             <td>{{$value->price_sale}}</td>

<!--<td>{!!$value->active == 1 ? '<span class="badge bg-primary">Kinh doanh</span>' : '<span class="badge bg-danger">Ngừng kinh doanh</span>'!!}</td> -->

             <td> {!!$value->active == 1 ? '<span class="badge bg-primary">Kinh doanh</span>' : ''!!}
                {!!$value->active == 3 ? '<span class="badge bg-danger">Ngừng kinh doanh</span>' : ''!!}
                {!!$value->active == 2 ? '<span class="badge bg-warning">Tạm hết hàng</span>' : ''!!}
            </td>
            <td> <a href="/admin/color/library/{{$value->id}}"> <button type="button" class="btn btn-info">Xem</button></a></td>
            <td><a href="/admin/color/edit/{{$value->id}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemProduct({{$value->id}}, '/admin/product/delete', '{{$value->name}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/color/color.js"></script>
@endsection

