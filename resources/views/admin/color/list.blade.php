@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Hình ảnh</th>
      <th>Tổng màu sắc</th>
      <th>Tổng số lượng</th>
      <th></th>
      <th>Chi tiết</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($listItem as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td> {{$value->name}}
            </td>
            <td> <img src="{{url('storage/products/'.$value->thumb.'')}}" width="80" height="80"/>
            </td>
             <td>{{count($value->getColor)}} màu sắc</td>
            <td>{{$value->getColor->sum('quantity')}} sản phẩm</td>
            <td><a href="/admin/color/add/{{$value->id}}"> <button type="button" class="btn btn-success">Thêm màu sắc</button></a></td>
            <td><a href="/admin/color/detail/{{$value->id}}"> <button type="button" class="btn btn-primary">Chi tiết</button></a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection

