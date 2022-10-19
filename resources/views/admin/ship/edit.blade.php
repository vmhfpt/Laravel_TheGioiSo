@extends('admin.layout.main')
@section('content')
<form method="POST" action={{route('ship.update.submit',['id' => $dataItem->id])}}>

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
        @foreach ($listCity as $key )
        <option {{$dataItem->city ==  $key->name ? 'selected' : ''}} value="{{$key->matp}}"> {{$key->name}}</option>
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
            @foreach ($listDistrict as $key )
            <option  {{$dataItem->district ==  $key->name ? 'selected' : ''}} value="{{$key->maqh}}"> {{$key->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Xã,phường,thị trấn :</label>
        <select id="more-wards" name="wards" class="form-control">
            @foreach ($listWards as $key )
            <option {{$dataItem->ward ==  $key->name ? 'selected' : ''}} value="{{$key->xaid}}"> {{$key->name}}</option>
            @endforeach
        </select>
    </div>
</div>
    <div class="form-group">
        <label >Phí vận chuyển</label>
        <input value="{{old('price') ? old('price') :$dataItem->ship}}" name="price" type="number" class="form-control"  placeholder="Nhập phí vận chuyển">
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

