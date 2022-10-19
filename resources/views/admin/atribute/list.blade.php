@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <div  class=" form-group">
        <label>Lọc theo nền tảng :</label>
        <select name="type_id" class="filter-platform form-control">
          @foreach ($dataPlatForm as $value)
          <option value="{{$value->id}}" >{{$value->name}}</option>
          @endforeach
        </select>
      </div>
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Mô tả</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody id="result">
        @foreach ($dataItem as $key => $value)
        <tr id="{{$value->id}}">
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}
            </td>
             <td>{{$value->description}}</td>
            <td>{{$value->created_at}}</td>
            <td><a href="/admin/atribute/edit/{{$value->id}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemAtribute({{$value->id}}, '/admin/atribute/delete', '{{$value->description}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>

  </table>

  <script src="/template/admin/js/type/type.js"></script>
@endsection

