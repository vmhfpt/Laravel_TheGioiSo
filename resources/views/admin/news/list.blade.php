@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tiêu đề</th>
      <th>Ảnh</th>
      <th>Sản Phẩm</th>
      <th>Danh mục</th>
      <th>Ngày tạo</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dataItem as $key => $value)
        <tr id="{{$value->id}}">
            <td>{{$key + 1}}</td>
            <td> {{$value->title}}
            </td>
            <td> <img src="{{url('storage/news/'.$value->thumb.'')}}" width="80" height="80"/>
            </td>
             <td> {{$value->getProduct->name }}</td>
             <td> {{$value->getCategoryNews->name }}</td>
            <td>{{$value->created_at}}</td>
            <td><a href="/admin/news/edit/{{$value->slug}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
            <td><button onclick="deleteItemNews({{$value->id}}, '/admin/news/delete', '{{$value->title}}')" type="button" class="btn btn-danger">Xóa</button></td>
          </tr>
        @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/news/news.js"></script>
@endsection

