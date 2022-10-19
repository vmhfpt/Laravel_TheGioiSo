@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('platform.add.submit')}}>

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
        <label >Tên nền tảng</label>
        <input name="name" type="text" class="form-control"  placeholder="Nhập tên nền tảng">
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror

      <div class="form-group">
        <div class="custom-control custom-switch">
          <input name="active" type="checkbox" class="custom-control-input" id="customSwitch1">
          <label class="custom-control-label" for="customSwitch1">Trạng thái kích hoạt</label>
        </div>
      </div>
    </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

