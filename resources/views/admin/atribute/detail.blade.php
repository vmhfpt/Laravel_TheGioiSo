@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">

    <thead>
    <tr>
      <th>STT</th>
      <th>Thuộc tính (biến thể sản phẩm)</th>
      <th>Ngày tạo</th>
      <th>Gỡ</th>
    </tr>
    </thead>
    <tbody id="result">
       @foreach ($dataItem->getProductType as $key => $value)
        <tr id="{{$value->id}}">
            <td>{{$key + 1}}</td>
            <td>{{$value->getType->description}}
            </td>
            <td>{{$value->created_at}}</td>
            <td><button onclick="deleteItemDetail({{$value->id}}, '/admin/atribute/delete-detail', '{{$value->getType->description}}')" type="button" class="btn btn-danger">Gỡ</button></td>
          </tr>
        @endforeach

    </tbody>

  </table>
  <a href="/admin/atribute/add-type"> <button type="button" class="btn btn-warning">Thêm thuộc tính cho nền tảng</button></a>
  <script src="/template/admin/js/type/type.js"></script>
@endsection

