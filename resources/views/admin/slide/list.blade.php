@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Ảnh</th>
      <th>Liên kết (url)</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dataItem as $key => $value)
        <tr id="{{$value->id}}" >
            <td>{{$key + 1}}</td>
            <td> {{$value->name}}
            </td>
            <td> <img src="{{url('storage/products/'.$value->thumb.'')}}" width="210" height="80"/>
            </td>
             <td>{{$value->link}}</td>
            <td>{{$value->created_at}}</td>
            <td><a href="/admin/slide/edit/{{$value->id}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemSlide({{$value->id}}, '/admin/slide/delete', '{{$value->name}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/slide/slide.js"></script>
@endsection

