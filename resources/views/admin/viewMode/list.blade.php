@extends('admin.layout.main')
@section('content')
<style>
   .lockCheck-custom{
       opacity: 0.4;
       background: #fd02022f;
   }
   .red-color-text-custom {
       color :red;
   }
   .check-success {
       background: rgba(6, 231, 6, 0.452);
   }
   .check-success-remove {
    background: #fd02022f;
   }
</style>
<form method="POST" id="submit-ajax" action="javascript:;">

    <div class="card-body">
       <!-- <div class="alert alert-warning">
            <strong>Xin lỗi!</strong> Bạn chưa chọn nền tảng nào.
          </div> -->
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
    <div class="row">
        <div class="col-sm-6">
          <!-- select -->
          <div class="form-group">
            <label>Nền tảng</label>
           <select name="platform_id" class="get-platform form-control">
            <option value="0">-- Lựa Chọn --</option>
              @foreach ($listPlatForm  as $value)
              <option value="{{$value->id}}">{{$value->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6" id="result">
          </div>
      </div>

    </div>
    <table id="example2" class="table table-bordered table-hover">

      </table>

    <div class="card-footer">
      <button type="submit" class="btn btn-danger submit-delete-custom">Gỡ sản phẩm khỏi danh sách</button>
    </div>
  </form>
  <script src="/template/admin/js/viewModel/viewModel.js"></script>
@endsection

