@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('color.add.submit')}} enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="product_id" value={{$idProduct}}>
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
        <input value="{{old('name')}}" name="name" type="text" class="form-control"  placeholder="VD : Màu Đỏ">
      </div>
      @error('name')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
<div class="form-group">
    <label >Giá gốc</label>
    <input value="{{old('price')}}" name="price" type="number" class="form-control"  placeholder="Nhập giá gốc sản phẩm">
  </div>
  @error('price')
  <div class="alert alert-danger">
      <strong>Lỗi !</strong> {{ $message }}
    </div>
@enderror

<div class="form-group">
<label >Giá ưu đãi</label>
<input value="{{old('price_sale')}}" name="price_sale" type="number" class="form-control"  placeholder="Nhập giá ưu đãi sản phẩm">
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
      <img id="imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" style="margin-top : 30px" class="rounded"  width="304" height="236"><br/> <br/>
      <div class="form-group">
        <label >Chọn trạng thái</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio1" name="active" value="1" checked>
            <label class="form-check-label" for="radio1">Kinh doanh</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="radio2" name="active" value="2">
            <label class="form-check-label" for="radio2">Tạm hết hàng</label>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" id="radio3" name="active" value="3">
            <label class="form-check-label">Ngừng kinh doanh</label>
          </div>
      </div>
      <div class="form-group">
        <label >Số lượng sản phẩm</label>
        <input value="{{old('quantity')}}" name="quantity" type="number" class="form-control"  placeholder="Nhập số lượng sản phẩm">
      </div>
      @error('quantity')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
    <div class="custom-file">
        <input accept="image/*" name="library[]"  type="file" class="custom-file-input" id="uploadMultiple" multiple>
        <label class="custom-file-label multiple" for="uploadMultiple">Chọn nhiều nhất 12 ảnh làm thư viện cho sản phẩm</label>
      </div>
      @error('library')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror
  <br/> <br/>
      <div class="filter-container custom-upload p-0 row">

      </div>

    </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script src="/template/admin/js/color/color.js"></script>
@endsection

