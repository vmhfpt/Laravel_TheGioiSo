@foreach ($dataItem as $key => $value)
<tr id="{{$value->getType->id}}">
    <td>{{$key + 1}}</td>
    <td>{{$value->getType->name}}
    </td>
     <td>{{$value->getType->description}}</td>
    <td>{{$value->getType->created_at}}</td>
    <td><a href="/admin/atribute/edit/{{$value->getType->id}}"> <button type="button" class="btn btn-primary">Sửa</button></a></td>
    <td><button onclick="deleteItemAtribute({{$value->getType->id}}, '/admin/atribute/delete', '{{$value->getType->description}}')" type="button" class="btn btn-danger">Xóa</button></td>
  </tr>
@endforeach
