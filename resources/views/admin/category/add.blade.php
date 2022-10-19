@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('category.add.submit')}}>

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
        <label >Tên danh mục</label>
        <input name="name" type="text" class="form-control"  placeholder="Nhập tên danh mục">
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
<div class="form-group">
    <label>Nền tảng</label>
    <select name="business-platform" class="form-control">
        @foreach ($listBusinessPlatform as $key )
        <option value={{$key->id}}> {{$key->name}}</option>
        @endforeach
    </select>
  </div>
      <div class="form-group">
        <label>Danh mục</label>
        <select name="category" class="form-control">
            <option value="0"> Danh mục cha</option>
            @foreach ($listCategoryParent as $key )
            <option value={{$key->id}}> {{$key->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label >Mô tả</label>
        <input name="description" type="text" class="form-control"  placeholder="Nhập mô tả">
      </div>
      @error('description')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
      <div class="form-group">
        <label >Nội dung</label>
        <textarea type = "text" class="form-control" rows="5" id="content" name="content">  </textarea>
      </div>
      @error('content')
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
  <script src="/template/admin/ckeditor/ckeditor.js"></script>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

