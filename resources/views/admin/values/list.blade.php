@extends('admin.layout.main')
@section('content')

<table id="example2" class="table table-bordered table-hover">
    <div  class=" form-group">
        <label>Lọc theo</label>
        <select name="type_id" class="type-id form-control">
          @foreach ($dataAtribute as $value)
          <option value="{{$value->id}}" >{{$value->description}}</option>
          @endforeach
        </select>
      </div>
    <thead>
    <tr>
      <th>STT</th>
      <th>Thuộc tính</th>
      <th>Giá trị</th>
      <th>Ngày tạo</th>

      <th>Xóa</th>
    </tr>
    </thead>
    <tbody id="result">
        @foreach ($dataItem as $key => $value)
        <tr id="{{$value->id}}">
            <td>{{$key + 1}}</td>
            <td>{{$value->getAtribute->description}}
            </td>
            <td>{{$value->value}}
            </td>
            <td>{{$value->created_at}}</td>

            <td><button onclick="deleteItemValue({{$value->id}}, '/admin/value-atribute/delete', '{{$value->value}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/value/value.js"></script>
@endsection

