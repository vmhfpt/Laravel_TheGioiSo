@extends('admin.layout.main')
@section('content')
<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>SĐT</th>
      <th>Địa chỉ</th>
      <th>Tổng</th>
      <th>Trạng thái</th>
      <th>Ngày đặt</th>
      <th>Chi tiết</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dataItem as $key =>$value)
        <tr>
          <td>{{$key + 1}}</td>
          <td>{{$value->name}}</td>
          <td>{{$value->phone_number}}</td>
          <td>{{$value->address_detail}}</td>
          <td>  {{number_format($value->total, 0, '', '.') }}VNĐ</td>
          <td>@php
              if($value->active == 0){
                  echo '<span class="badge badge-danger">Chưa tiếp nhận</span>';
              }
              if($value->active == 1){
                  echo '<span class="badge badge-warning">Đã tiếp nhận</span>';
              }
              if($value->active == 2){
                  echo '<span class="badge badge-secondary">Đã xuất kho</span>';
              }
              if($value->active == 3){
                  echo '<span class="badge badge-info">Đang di chuyển</span>';
              }
              if($value->active == 4){
                  echo '<span class="badge badge-primary">Đã đến nơi</span>';
              }
              if($value->active == 5){
                  echo '<span class="badge badge-success">Hoàn thành</span>';
              }
              if($value->active == 6){
                  echo '<span class="badge badge-dark">Đã hủy</span>';
              }
          @endphp</td>
          <td>
            <div class="sparkbar" >{{$value->updated_at}}</div>
          </td>
          <td><a href="/admin/oder/detail/{{$value->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
        </tr>

        @endforeach
    </tbody>
  </table>

@endsection

