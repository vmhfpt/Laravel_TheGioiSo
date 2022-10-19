@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('color.update.submit',['id' => $name->id])}} enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="product_id" value="{{$name->getProduct->id}}">
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
        <label >Tên màu</label>
        <input value="{{old('name') ? old('name') : $name->name_color }}" name="name" type="text" class="form-control"  placeholder="VD : Màu Đỏ">
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
<div class="form-group">
    <label >Giá gốc</label>
    <input value="{{old('price') ? old('price') : $name->price }}" name="price" type="number" class="form-control"  placeholder="Nhập giá gốc sản phẩm">
  </div>
  @error('price')
  <div class="alert alert-danger">
      <strong>Lỗi !</strong> {{ $message }}
    </div>
@enderror

<div class="form-group">
<label >Giá ưu đãi</label>
<input value="{{old('price_sale') ? old('price_sale') : $name->price_sale }}" name="price_sale" type="number" class="form-control"  placeholder="Nhập giá ưu đãi sản phẩm">
</div>
@error('price_sale')
<div class="alert alert-danger">
  <strong>Lỗi !</strong> {{ $message }}
</div>
@enderror
    <div class="custom-file">
        <input accept="image/*" name="thumb[]"  type="file" class="custom-file-input" id="customFile">
        <label class="customFile custom-file-label" for="customFile">Chọn một ảnh đại diện sản phẩm</label>
      </div> <br/> <br/>
      @error('thumb')
     <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
      <img id="imgSrc" src="{{url('storage/library/'.$name->thumb.'')}}" style="margin-top : 30px" class="rounded"  width="304" height="236"><br/> <br/>
      <div class="form-group">
        <label >Chọn trạng thái</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio1" name="active" value="1" {{$name->active == 1 ? 'checked' : ''}}>
            <label class="form-check-label" for="radio1">Kinh doanh</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="radio2" name="active" value="2" {{$name->active == 2 ? 'checked' : ''}}>
            <label class="form-check-label" for="radio2">Tạm hết hàng</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="radio3" name="active" value="3" {{$name->active == 3 ? 'checked' : ''}}>
            <label class="form-check-label">Ngừng kinh doanh</label>
          </div>
      </div>
      <div class="form-group">
        <label >Số lượng sản phẩm</label>
        <input value="{{old('quantity') ? old('quantity') : $name->quantity}}" name="quantity" type="number" class="form-control"  placeholder="Nhập số lượng sản phẩm">
      </div>
      @error('quantity')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror


      <div class="filter-container p-0 row">

      </div>

    </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script src="/template/admin/js/color/color.js"></script>
@endsection

