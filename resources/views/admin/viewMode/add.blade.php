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
      <!-- <thead>
        <tr>
          <th>STT</th>
          <th>Tên</th>
          <th>Ảnh</th>
          <th>Kiểu hiện thị</th>
          <th>Đánh dấu</th>
        </tr>
        </thead>
        <tbody>
            <tr class="check-success">
                <td>1</td>
                <td> Samsung
                </td>
                <td> <img src="" width="80" height="80"/>
                </td>
                <td> <b > Chưa xác định</b>
                 <td><i class='fas fa-check-circle' style='font-size:20px;color:rgb(10, 218, 89)'></i></td>
              </tr>
            <tr>
                <td>1</td>
                <td> Samsung
                </td>
                <td> <img src="" width="80" height="80"/>
                </td>
                <td> <b > Chưa xác định</b>
                 <td><div class="custom-control custom-checkbox">
                    <input class="custom-control-input custom-control-input-danger" type="checkbox" id="customCheckbox4" >
                    <label for="customCheckbox4" class="custom-control-label"></label>
                  </div></td>
              </tr>
              <tr class="lockCheck-custom">
                <td>1</td>
                <td> Samsung
                </td>
                <td> <img src="" width="80" height="80"/>
                </td>
                <td> <b class="red-color-text-custom"> đã thêm</b>
                </td>
                 <td><div class="custom-control custom-checkbox">
                    <input disabled class="custom-control-input custom-control-input-danger" type="checkbox" id="customCheckbox5" >
                    <label for="customCheckbox5" class="custom-control-label"></label>
                  </div></td>
              </tr>
        </tbody>
    -->
      </table>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary submit-custom">Thêm mới</button>
    </div>
  </form>
  <script src="/template/admin/js/viewModel/viewModel.js"></script>
@endsection

