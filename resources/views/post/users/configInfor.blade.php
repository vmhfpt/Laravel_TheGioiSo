@extends('post.layout.main')
@section('content_post')
    <style>
        .alert-config {
            background: rgba(255, 0, 0, 0.378);
            color: white;
            padding: 12px;
        }

        .add-btn-custom {
            background: orange;
            border: none;
            padding: 5px;
            color: white;
        }

        .error-custom {
            position: relative;
            top: 12px;
            color: red;
        }

    </style>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thiết lập thông tin</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                @if (session('error'))
                    <a class="alert-config">
                        <span>Cảnh báo!</span> {{ session('error') }}
                    </a>
                @endif

                <div class="contact-us-form">
                    <div class="sec-heading-area">
                        <h2>Xin chào {{ auth()->user()->name }}</h2>
                    </div>
                    <div class="contact-form">
                        <span class="legend">Thiết lập thông tin cho tài khoản</span>
                        <form action="/set-infor" method="POST">
                            @csrf
                            <div class="form-top">
                                <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                    <label>Tỉnh/Thành phố<sup>*</sup></label>



                                    <select class="form-control city" name="city">
                                        <option value="">-- Lựa chọn --</option>

                                        @foreach ($listCity as $key)
                                            <option value="{{$key->matp}}"> {{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <span class="error-custom"> {{ $message }}</span>
                                @enderror
                                </div>
                                <div id="result">
                                    <!--  <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Quận/Huyện<sup>*</sup></label>
                                            <select class="form-control city" name="city">
                                                <option value="null">-- Lựa chọn --</option>
                                                <option value=""> 23213</option>
                                                <option value=""> 23213</option>
                                                <option value=""> 23213</option>
                                                <option value=""> 23213</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Xã/Phường<sup>*</sup></label>
                                            <select class="form-control city" name="city">
                                                <option value="null">-- Lựa chọn --</option>
                                                <option value=""> 23213</option>
                                                <option value=""> 23213</option>
                                                <option value=""> 23213</option>
                                                <option value=""> 23213</option>
                                            </select>
                                        </div> -->
                                </div>


                                <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                    <label>Số điện thoại <sup>*</sup></label>
                                    <input value="{{old('number')}}"  type="number" name="number" class="form-control">
                                    @error('number')
                                        <span class="error-custom"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                    <label>Số nhà/Thôn/Ấp/Xóm <sup>*</sup></label>
                                    <input value="{{old('address-detail')}}"  type="text" name="address-detail" class="form-control">
                                    @error('address-detail')
                                        <span class="error-custom"> {{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="submit-form form-group col-sm-12 submit-review">
                                <p><sup>*</sup> Bắt buộc nhập</p>
                                <button type="submit" class="add-tag-btn add-btn-custom">Hoàn tất</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/template/post/js/home/home.js"></script>
    <script src="/template/post/js/configInfor/configInfor.js"></script>
@endsection
