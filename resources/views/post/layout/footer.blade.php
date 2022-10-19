
<footer>

    <!-- top footer area start -->
    <div class="top-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Thông tin công ty</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <p class="footer-des">Mang đến những thương hiệu kèm theo các sản phẩm chất lượng ...</p>
                            <a href="/infor/ve-cong-ty" class="read-more">Đọc thêm</a>
                        </div>
                    </div>
                </div>

<div class="col-md-3 col-sm-4">
    <div class="single-snap-footer">
        <div class="snap-footer-title">
            <h4>Chính sách</h4>
        </div>

        <div class="cakewalk-footer-content">
            <ul>
                @foreach ($dataFooter as $key => $value )
                @if ($key < 4)
                <li><a href="/infor/{{$value->slug}}">{{$value->name}}</a></li>
                @endif

                @endforeach
            </ul>
        </div>
    </div>
</div>


<div class="col-md-3 col-sm-4">
    <div class="single-snap-footer">
        <div class="snap-footer-title">
            <h4>Đọc thêm</h4>
        </div>

        <div class="cakewalk-footer-content">
            <ul>
                @foreach ($dataFooter as $key => $value )
                @if ($key >= 4)
                <li><a href="/infor/{{$value->slug}}">{{$value->name}}</a></li>
                @endif

                @endforeach
            </ul>
        </div>
    </div>
</div>






                <div class="col-md-2 hidden-sm">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Theo dõi chúng tôi</h4>
                        </div>
                        <div class="cakewalk-footer-content social-footer">
                            <ul>
                                <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a><span> Google Plus</span></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><span> Twitter</span></li>
                                <li><a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top footer area end -->
    <!-- info footer start -->
    <div class="info-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Địa chỉ</h3>
                            <p>Trùng Khánh, Vũ Hán</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Số điện thoại hỗ trợ</h3>
                            <p>0359932904</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Email</h3>
                            <p>vuminhhugltt904@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Giờ làm việc</h3>
                            <p>Thứ hai - thứ 7 : 7:00 am - 22:00 pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="address-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <address>Copyright © <a href="http://bootexperts.com/">Vũ Minh Hùng.</a> All Rights Reserved</address>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="footer-payment pull-right">
                        <a href="#"><img src="{{asset('/template/post/img/payment.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer address area end -->
</footer>
<!-- FOOTER END -->

<!-- JS -->

 <!-- jquery-1.11.3.min js
============================================ -->


 <!-- bootstrap js
============================================ -->
<script src="{{asset('/template/post/js/bootstrap.min.js')}}"></script>

<!-- Nivo slider js
============================================ -->
<script src="{{asset('/template/post/custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{asset('/template/post/custom-slider/home.js')}}" type="text/javascript"></script>

   <!-- owl.carousel.min js
============================================ -->
<script src="{{asset('/template/post/js/owl.carousel.min.js')}}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{asset('/template/post/js/jquery.scrollUp.min.js')}}"></script>

<!-- price-slider js
============================================ -->
<script src="{{asset('/template/post/js/price-slider.js')}}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{asset('/template/post/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{asset('/template/post/js/jquery.bxslider.min.js')}}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{asset('/template/post/js/jquery.meanmenu.js')}}"></script>

   <!-- wow js
============================================ -->
<script src="{{asset('/template/post/js/wow.js')}}"></script>

   <!-- plugins js
============================================ -->
<script src="{{asset('/template/post/js/plugins.js')}}"></script>

   <!-- main js
============================================ -->
<script src="{{asset('/template/post/js/main.js')}}"></script>
</body>
</html>
