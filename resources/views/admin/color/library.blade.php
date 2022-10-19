@extends('admin.layout.main')
@section('content')
<br/> <br/><div class="filter-container p-0 row">

  @foreach ($dataItem->getLibraryColor  as  $value)
  <div id={{$value->id}} style="border : 1px solid black;" class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
    <button  data-id="{{$value->id}}" type="submit" class="event-delete btn btn-primary">Xóa</button>
      <img src="{{url('storage/library/'.$value->thumb.'')}}" class="img-fluid mb-2" alt="white sample"/>
  </div>
  @endforeach
  </div>
  <form method="POST" action={{route('library.add.submit', ['id' => $dataItem->id])}} enctype="multipart/form-data">

    @csrf
    <div class="card-body">
        @if (Session::has('success'))

        <div class="alert alert-success">
            <strong>Thành công!</strong> {!! Session::get('success') !!}
          </div>
@endif
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
      <button type="submit" class="btn btn-primary">Thêm vào thư viện</button>
    </div>
  </form>
  <script src="/template/admin/js/color/color.js"></script>
@endsection

