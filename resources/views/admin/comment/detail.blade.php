@extends('admin.layout.main')
@section('content')


<div class="show-here-comment-children">
</div>
<div class="show-here-comment-dashboard">


</div>
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>SĐT</th>
      <th>Nội dung</th>
      <th>Ngày post</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
   @foreach ($dataItem as $key => $value)
   <tr id="{{$value->id}}">
    <td>{{$key + 1}}</td>
    <td>{{$value->name}}
    </td>
    <td> {{$value->number_phone}}</td>
    <td>{{Str_repeat('--',$value['lever'])}} {{$value->content}}</td>
    <td>{{$value->created_at}}</td>
    <td data-id="{{$value->id}}" class="dash-board-show"> <a class="btn btn-primary btn-sm" href="#">
        <i class="fas fa-folder">
        </i>
        Chi tiết
    </a></td>
    <td>
        <td>

{!! count($value->getCommentChild) == 0 ? '' : '<a data-id='.$value->id.' class="show-more btn btn-primary btn-sm" href="javascript:;">
    <i class="fas fa-folder">
    </i>
    Xem thêm '.count($value->getCommentChild).'  câu trả lời
</a>' !!}

            </td>
        <td>
        <a onclick="deleteComment({{$value->id}}, '/admin/comment/delete', '{{$value->name}}')" class="btn btn-danger btn-sm" href="javascript:;">
            <i class="fas fa-trash">
            </i>
            Xóa
        </a>
    </td>

  </tr>
   @endforeach

    </tbody>
  </table>
  <script src="/template/admin/js/comment/comment.js"></script>
@endsection

