@extends('admin.layout.main')
@section('content')
<style>
    .custom-btn {
        margin-top : 12px;
    }
</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <form method="POST" action={{ route('config.add.submit', ['slug' => $dataItem->slug]) }}>
        @csrf
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Thành công!</strong> {!! Session::get('success') !!}
            </div>
        @endif
            @foreach ($listProductType as $value)
                <div class="dropdown dropend">
                    <button type="button" class="custom-btn btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
                        {{ $value->getType->description }}
                    </button>
                    <div class="dropdown-menu">
                        <div class="form-group">
                         <center>    <label>Lựa chọn giá trị phù hợp cho thuộc tính {{ $value->getType->description }}</label></center>
                            <select multiple name="value[]" class="custom-select">
                                @foreach ($value->getType->getValue as $key =>  $value)
                                <option {{$key == 0 ? 'selected' : ''}} value={{$value->id}}>{{$value->value}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưa lại</button>
        </div>
    </form>
    <script src="/template/admin/js/product/product.js"></script>
@endsection
