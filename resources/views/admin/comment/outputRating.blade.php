
  @foreach ($dataItem as $key => $value)
  <tr id="{{$value->id}}">
    <td>{{$key + 1}}</td>
    <td>{{ $value->name}}</td>
    <td>@for ($i = 0; $i < $value->vote; $i ++)
        <span class="fa fa-star checked-icon"></span>
    @endfor</td>
    <td>{{ $value->content}}</td>
    <td>{{ $value->created_at}}</td>
    <td data-id="{{$value->id}}" class="dash-board-show"> <a class="btn btn-primary btn-sm" href="#">
        <i class="fas fa-folder">
        </i>
        Chi tiết
    </a></td>
    <td>
        <a  class="btn btn-danger btn-sm" href="javascript:deleteComment({{$value->id}}, '/admin/comment/delete', '{{$value->name}}');">
            <i class="fas fa-trash">
            </i>
            Xóa
        </a>
    </td>
  </tr>
  @endforeach
