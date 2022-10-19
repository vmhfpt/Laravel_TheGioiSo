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
