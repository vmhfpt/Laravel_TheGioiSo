@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Nền tảng</th>
      <th>Thuộc tính sản phẩm</th>
    </tr>
    </thead>
    <tbody >
        @foreach ($listPlatForm as $key => $value )
        <tr>
             <td> {{$key + 1}}</td>
             <td> {{$value->name}}</td>
            <td> <a href="/admin/atribute/show-detail/{{$value->slug}}"> <button type="button" class="btn btn-success">Xem thêm {{count($value->getProductType)}} Thuộc tính</button></a></td>
             </tr>
        @endforeach
    </tbody>

  </table>

  <script src="/template/admin/js/type/type.js"></script>
@endsection

