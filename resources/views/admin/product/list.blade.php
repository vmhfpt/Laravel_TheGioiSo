@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Ảnh</th>
      <th>Trạng thái</th>
      <th>Danh mục</th>
      <th>Nền tảng</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($listProduct as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td> {{$value->name}}
            </td>
            <td> <img src="{{url('storage/products/'.$value->thumb.'')}}" width="80" height="80"/>
            </td>
             <td>{!!$value->active == 1 ? '<span class="badge bg-primary">Kích hoạt</span>' : '<span class="badge bg-danger">Tạm khóa</span>'!!}</td>
             <td> {{$value->getCategory->name }}</td>
             <td> {{$value->getCategory->getBusiness->name }}</td>
            <td>{{$value->created_at}}</td>
            <td><a href="/admin/product/edit/{{$value->slug}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemProduct({{$value->id}}, '/admin/product/delete', '{{$value->name}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/product/product.js"></script>
@endsection

