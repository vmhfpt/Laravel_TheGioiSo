@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('ship.add.submit')}}>

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
    <label>Tỉnh,Thành phố :</label>
    <select  name="city" class="city form-control">
        <option  value="null"> -- Lựa chọn --</option>
        @foreach ($listCity as $key )
        <option  value="{{$key->matp}}"> {{$key->name}}</option>
        @endforeach
    </select>
  </div>
  @if (session('city'))
  <div class="alert alert-danger">
    <strong>Lỗi !</strong>  {{ session('city') }}
  </div>
@endif

  <div id="result">
      <div class="form-group">
        <label>Quận, Huyện :</label>
        <select id="more-district" name="district" class="district form-control">
            <option  value="null"> -- Lựa chọn --</option>
        </select>
    </div>
    <div class="form-group">
        <label>Xã,phường,thị trấn :</label>
        <select id="more-wards" name="wards" class="form-control">
            <option  value="null"> -- Lựa chọn --</option>
        </select>
    </div>
</div>
    <div class="form-group">
        <label >Phí vận chuyển</label>
        <input name="price" type="number" class="form-control"  placeholder="Nhập phí vận chuyển">
      </div>
      @error('price')
      <div class="alert alert-danger">
          <strong>Lỗi !</strong> {{ $message }}
        </div>
    @enderror

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <script src="/template/admin/js/ship/ship.js"></script>
@endsection

