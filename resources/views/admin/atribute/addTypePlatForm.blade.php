@extends('admin.layout.main')
@section('content')
    <form method="POST" action={{ route('atributePlatForm.add.submit') }}>

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
            <div class=" form-group">
                <label>Lựa chọn nền tảng:</label>
                <select name="platform" class="type-id form-control">
                    <option value="0">-- lựa chọn --</option>
                    @foreach ($listPlatForm as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            @if (Session::has('msg'))
            <div class="alert alert-danger">
                <strong>Thất bại!</strong> {!! Session::get('msg') !!}
            </div>
        @endif
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Lựa chọn thuộc tính:</label>
                    @foreach ($listType as $key => $value)
                        <div class="custom-control custom-checkbox">
                            <input name="type[]" class="custom-control-input custom-control-input-danger" type="checkbox"
                                id="customCheckbox{{$key}}" value="{{$value->id}}">
                            <label for="customCheckbox{{$key}}" class="custom-control-label">{{$value->description}}</label>
                        </div>
                    @endforeach
                </div>
                @error('type')
                <div class="alert alert-danger">
                    <strong>Lỗi !</strong> {{ $message }}
                  </div>
          @enderror
            </div>
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
    <script src="/template/admin/js/category/category.js"></script>
@endsection
