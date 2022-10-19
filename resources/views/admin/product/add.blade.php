@extends('admin.layout.main')
@section('content')
    <form method="POST" action={{ route('product.add.submit') }} enctype="multipart/form-data">

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
                <label>Tên sản phẩm</label>
                <input value="{{ old('name') }}" name="name" type="text" class="form-control"
                    placeholder="Nhập tên sản phẩm">
            </div>
            @error('name')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label>Danh mục</label>
                <select name="category" class="form-control">
                    @foreach ($listCategory as $key => $value)
                        <option value={{ $value->id }}>{{ Str_repeat('--', $value['lever']) }} {{ $value->name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label>Giá gốc</label>
                <input value="{{ old('price') }}" name="price" type="number" class="form-control"
                    placeholder="Nhập giá gốc sản phẩm">
            </div>
            @error('price')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                </div>
            @enderror

            <div class="form-group">
                <label>Giá ưu đãi</label>
                <input value="{{ old('price_sale') }}" name="price_sale" type="number" class="form-control"
                    placeholder="Nhập giá ưu đãi sản phẩm">
            </div>
            @error('price_sale')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label>Mô tả</label>
                <input value="{{ old('description') }}" name="description" type="text" class="form-control"
                    placeholder="Nhập mô tả">
            </div>
            @error('description')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                </div>
            @enderror



            <div class="form-group">
                <label>Nội dung</label>
                <textarea type="text" class="form-control" rows="5" id="content" name="content">  {{ old('content') }}</textarea>

            </div>
            @error('content')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input name="active" value="{{ old('active') }}" type="checkbox" class="custom-control-input"
                        id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Trạng thái kích hoạt</label>
                </div>
            </div>
            <div class="custom-file">

                <input accept="image/*" name="thumb[]" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Chọn một ảnh đại diện sản phẩm</label>
            </div> <br /> <br />
            @error('thumb')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                </div>
            @enderror
            <img id="imgSrc" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png"
                style="margin-top : 30px" class="rounded" width="304" height="236">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
    <script src="/template/admin/js/color/color.js"></script>
    <script src="/template/admin/js/product/product.js"></script>
@endsection
