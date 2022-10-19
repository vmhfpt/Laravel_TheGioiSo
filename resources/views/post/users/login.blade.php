@extends('post.layout.main')
@section('content_post')
    <style>
        .custom-error {
            color: red;
            position: relative;
            top: 8px;
        }

        .alert-config {
            position: relative;
            top : 15px;
            background: rgba(255, 0, 0, 0.378);
            color: white;
            padding: 12px;

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
                            <li class="category3"><span>Đăng nhập</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-login my-account">
                        <form method="post" class="login">
                            <div class="form-fields">
                                <h2>Đăng nhập</h2>
                                <p class="form-row form-row-wide">
                                    <label for="email-ajax">Email<span class="required">*</span></label>
                                    <input placeholder="Enter email" type="text" class="input-text" id="email-ajax">
                                    <span id="error-email" class="custom-error"></span>
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password-ajax">Mật khẩu <span class="required">*</span></label>
                                    <input placeholder="Enter password" class="input-text" type="password"
                                        id="password-ajax">
                                    <span id="error-password" class="custom-error"></span>

                                </p><br/>
                                <div class="socialite">
                                  <a href="auth/facebook"> <center>  <img width="200"  src="https://cdn.iphoneincanada.ca/wp-content/uploads/2018/03/fb_login_default.png"></center> </a>
                                  <a href="auth/google"> <center>  <img width="200"  src="https://onymos.com/wp-content/uploads/2020/10/google-signin-button-1024x260.png"></center> </a>
                             </div>

                            </div>

                            <div class="form-action">
                                <p class="lost_password"> <a href="#">Quên mật khẩu?</a></p>
                                <div class="actions-log">
                                    <button type="button" class="login-ajax"> Đăng nhập </button>
                                </div>
                                <label for="rememberme" class="inline">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Ghi nhớ
                                </label>
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
