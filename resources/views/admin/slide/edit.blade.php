@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('slides.update.submit',['id' => $dataItem->id])}} enctype="multipart/form-data">

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
        <label >Tên slide</label>
        <input value="{{old('name') ? old('name') :$dataItem->name}}" name="name" type="text" class="form-control"  placeholder="Nhập tên slide">
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
<div class="form-group">
    <label >Đường dẫn liên kết (URL) :</label>
    <input value="{{old('url') ? old('url') :$dataItem->link}}" name="url" type="text" class="form-control"  placeholder="vd: https://banhang/">
  </div>
  @error('url')
  <div class="alert alert-danger">
      <strong>Lỗi !</strong> {{ $message }}
    </div>
@enderror
      <div class="custom-file">

        <input value="{{url('storage/products/'.$dataItem->thumb.'')}}" accept="image/*" name="thumb[]"  type="file" class="custom-file-input" id="customFile">
        <label class="customFile custom-file-label" for="customFile">Chọn một ảnh đại diện slide</label>
      </div> <br/> <br/>
      @error('thumb')
     <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
      <img id="imgSrc" src="{{url('storage/products/'.$dataItem->thumb.'')}}" style="margin-top : 30px" class="rounded"  width="830" height="300">
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script src="/template/admin/js/color/color.js"></script>

@endsection

