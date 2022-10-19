@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dataItem as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}
            </td>

            <td>{{$value->created_at}}</td>
            <td><a href="/admin/config-footer/edit/{{$value->slug}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemPlatForm({{$value->id}}, '/admin/config-footer/delete', '{{$value->name}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

