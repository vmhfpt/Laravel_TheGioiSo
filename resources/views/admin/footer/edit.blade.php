@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('footer.update.submit',['slug' => $dataItem->slug])}}>

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
        <label >Tên</label>
        <input  type="text"  name="name" value="{{old('name') ? old('name') :$dataItem->name}}" class="form-control"  placeholder="Nhập tên danh mục" >
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
<div class="form-group">
    <label >Nội dung</label>
    <textarea type = "text" class="form-control" rows="5" id="content" name="content"> {{old('content') ? old('content') :$dataItem->content}} </textarea>
  </div>
  @error('content')
  <div class="alert alert-danger">
      <strong>Lỗi !</strong> {{ $message }}
    </div>
@enderror
    </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
  <script src="/template/admin/ckeditor/ckeditor.js"></script>
  <script src="/template/admin/js/category/category.js"></script>
@endsection

