@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('value.add.submit')}}>

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
    <div  class=" form-group">
        <label>Lựa chọn một thuộc tính :</label>
        <select name="type_id" class="form-control">
          @foreach ($dataAtribute as $value)
          <option value="{{$value->id}}" >{{$value->description}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label >Nhập giá trị :</label>
        <input name="value" type="text" class="form-control"  placeholder="VD : màn hình có giá trị : 6.5 Full HD+">
      </div>
      @error('value')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
@enderror

    </div>


    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

@endsection

