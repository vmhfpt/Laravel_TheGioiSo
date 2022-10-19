@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tỉnh</th>
      <th>Huyện</th>
      <th>Xã, Phường</th>
      <th>Phí ship</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dataItem as $key => $value)
        <tr id="{{$value->id}}" >
            <td>{{$key + 1}}</td>
            <td> {{$value->city}}
            </td>
            <td> {{$value->district}}
            </td>
            <td> {{$value->ward}}
            </td>
            <td> {{$value->ship}}
            </td>
            <td>{{$value->created_at}}</td>
            <td><a href="/admin/ship/edit/{{$value->id}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemShip({{$value->id}}, '/admin/ship/delete', '{{$value->city}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <script src="/template/admin/js/ship/ship.js"></script>
@endsection

