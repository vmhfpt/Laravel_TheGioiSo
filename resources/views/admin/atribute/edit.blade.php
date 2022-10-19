@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('atribute.update.submit',['id' => $dataItem->id])}}>

    @csrf
    <div class="card-body">
        @if (Session::has('success'))

        <div class="alert alert-success">
            <strong>Thành công!</strong> {!! Session::get('success') !!}
          </div>
@endif
        @if ($errors->any())
        <div class="alert alert-warning">
            <strong>Lỗi !</strong> Vui vòng kiểm tra lại biểu mẫu!
          </div>
    @endif
      <div class="form-group">
        <label >Tên thuộc tính</label>
        <input  type="text"  name="name" value="{{old('name') ? old('name') :$dataItem->name}}" class="form-control"  placeholder="Nhập tên thuộc tính" >
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror

<div class="form-group">
    <label >Mô tả thuộc tính</label>
    <input  type="text"  name="description" value="{{old('description') ? old('description') :$dataItem->description}}" class="form-control"  placeholder="Nhập tên thuộc tính" >
  </div>
  @error('name')
  <div class="alert alert-danger">
      <strong>Lỗi !</strong> {{ $message }}
    </div>
@enderror

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

