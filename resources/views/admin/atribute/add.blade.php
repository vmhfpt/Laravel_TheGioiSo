@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('atribute.add.submit')}}>

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
        <input name="name" type="text" class="form-control"  placeholder="Nhập tên thuộc tính">
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
<div class="form-group">
    <label >Mô tả :</label>
    <input name="description" type="text" class="form-control"  placeholder="VD : bộ nhớ trong">
  </div>
  @error('description')
  <div class="alert alert-danger">
      <strong>Lỗi !</strong> {{ $message }}
    </div>
@enderror

    </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

