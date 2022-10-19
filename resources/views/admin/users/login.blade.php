<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.header')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Quản trị viên</b> Đăng nhập</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if ($errors->any())
                    <div class="alert alert-warning">
                        <strong>Cảnh báo!</strong> Vui lòng kiểm tra lại biểu mẫu.
                    </div>
                @endif







                <form action="{{ route('admin.submit') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email"
                            @if (Cookie::has('email')) value="{{ Cookie::get('email') }}" @endif />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">
                            <strong>Lỗi !</strong> {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password"
                            @if (Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">
                            <strong>Lỗi !</strong> {{ $message }}
                        </div>
                    @enderror
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <strong>Cảnh báo!</strong> {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input checked name="remember" type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->

        </div>
    </div>
    <!-- /.login-box -->
    @include('admin.layout.footer')
    <!-- jQuery -->

</body>

</html>
