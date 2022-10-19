@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Trạng thái</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($listItem as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}
            </td>
             <td>{!!$value->active == 1 ? '<span class="badge bg-primary">Kích hoạt</span>' : '<span class="badge bg-danger">Tạm khóa</span>'!!}</td>
            <td>{{$value->created_at}}</td>
            <td><a href="/admin/brands/edit/{{$value->id}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItem({{$value->id}}, '/admin/brands/delete', '{{$value->name}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

