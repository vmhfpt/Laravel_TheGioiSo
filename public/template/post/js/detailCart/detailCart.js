var templateOderSuccess = "";
var transportfeeShip = 0;
var email = "";
function getTransPortFee() {
    url = String("/get-transportfee");
    var city_ship = $(".city").val();
    var district_ship = $("#more-district").val();
    var wards_ship = $("#more-wards").val();
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            city_id: city_ship,
            district_id: district_ship,
            wards_id: wards_ship,
        },
        //  data: { city_id },
        dataType: "json",
        success: function (result) {
            //console.log(result);
            if (result.transportfee == 0) {
                $(".transportfee").text("Miễn phí");
                transportfeeShip = 0;
                getTotal();
            } else {
                transportfeeShip = Number(result.transportfee);
                $(".transportfee").text(
                    String(result.transportfee).replace(
                        /\B(?=(\d{3})+(?!\d))/g,
                        "."
                    ) + "đ"
                );
                getTotal();
            }
        },
    });
}
$(".city").change(function () {
    //   $("#more-wards").empty();
    // $("#more-district").empty();

    var city_id = $(this).val();

    url = String("/post/address/get-district");
    if (city_id != "null") {
        $.ajax({
            type: "POST",
            url: String(url),
            data: { city_id: city_id, first_district: false },
            //  data: { city_id },
            dataType: "html",
            success: function (result) {
                $("#result-address").empty();
                $("#result-address").append(result);
                getTransPortFee();
            },
        });
    } else {
        $("#result-address").empty();
    }
});
$(document).on("change", "#more-district", function () {
    $("#more-wards").empty();
    var district_id = $(this).val();
    url = String("/post/address/get-wards");
    $.ajax({
        type: "POST",
        url: String(url),
        data: { district_id },
        dataType: "html",
        success: function (result) {
            $("#more-wards").empty();
            $("#more-wards").append(result);
            getTransPortFee();
        },
    });
});
$(document).on("change", "#more-wards", function () {
    getTransPortFee();
});
function callbackShopingCart() {
    var url = "/get-cart";
    $.ajax({
        type: "POST",
        url: String(url),
        dataType: "html",
        success: function (result) {
            $("#show-cart").empty();
            $("#show-cart").append(result);
        },
    });
}
$(document).on("click", "#prev", function () {
    var color_id = $(this).data("id");
    var quantity = $("#" + color_id).val();
    if (quantity != 1) {
        var url = "/update-cart";
        $.ajax({
            type: "POST",
            url: String(url),
            data: { color_id: color_id, quantity: quantity - 1 },
            dataType: "html",
            success: function (result) {
                $("#result-cart").empty();
                $("#result-cart").append(result);
                getTotal();
            },
        });
        $("#" + color_id).val(quantity - 1);
        callbackShopingCart();
    }
});
$(document).on("click", "#next", function () {
    var color_id = $(this).data("id");
    var quantity = $("#" + color_id).val();
    quantity++;
    var url = "/update-cart";
    $.ajax({
        type: "POST",
        url: String(url),
        data: { color_id: color_id, quantity: quantity },
        dataType: "html",
        success: function (result) {
            $("#result-cart").empty();
            $("#result-cart").append(result);
            getTotal();
        },
    });
    $("#" + color_id).val(quantity);
    callbackShopingCart();
});
$(document).on("change", ".input-quantity", function () {
    var color_id = $(this).attr("id");
    var quantity = $(this).val();

    var url = "/update-cart";
    $.ajax({
        type: "POST",
        url: String(url),
        data: { color_id: color_id, quantity: quantity },
        dataType: "html",
        success: function (result) {
            $("#result-cart").empty();
            $("#result-cart").append(result);
            getTotal();
        },
    });
    callbackShopingCart();
});
//delete-cart
$(document).on("click", ".delete-cart", function () {
    var index = $(this).data("delete");

    var url = "/delete-cart-detail";
    $.ajax({
        type: "POST",
        url: String(url),
        data: { index: index },
        dataType: "html",
        success: function (result) {
            $("#result-cart").empty();
            $("#result-cart").append(result);
            getTotal();
        },
    });
    callbackShopingCart();
});
$(document).on("click", ".remove", function () {
    // alert();
    var id_delete = $(this).data("delete");
    $("#delete-detail-" + id_delete).remove();
    getTotal();
});
function getTotal() {
    var item = $(".cart-subtotal").get();
    var total = 0;
    for (var i = 0; i < item.length; i++) {
        var string = String(item[i].textContent);
        var newTotal = string
            .replace(/\s/g, "")
            .replace(/\./g, "")
            .replace(/đ/g, "");
        total = total + Number(newTotal);
    }
    if (total == 0) {
        var templateEmptyCart =
            '<div class="not-found"><div class="container"><div class="row"><div class="col-md-12"><div class="page-not-found"><center><img class="empty-cart" src="https://sethisbakery.com/assets/website/images/empty-cart.png"> </center><h2 class="small-title ">Không có sản phẩm nào trong giỏ hàng.</h2><p><strong>Vui lòng thêm sản phẩm vào trong giỏ hàng để đi đến thanh toán ! <a title="Back to Home" href="index.html">Home</a> and start over.</strong></p><a class="go-to-home" href="/index.html">Tiếp tục mua sắm</a><br/></div></div></div></div></div>';
        $(".cart-area-start").empty();
        $(".cart-area-start").append(templateEmptyCart);
        return false;
    }

    var sum = total + transportfeeShip;
    $("#post").text(String(total).replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ");
    $("#sum").text(String(sum).replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ");
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(
        /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
    );
    return pattern.test(emailAddress);
}
function validateFormCustom(objectForm) {
    var address_detail = "",
        name = "",
        city = "",
        number = "",
        email = "";
    //  console.log(objectForm)

    for (var i = 0; i < objectForm.length; i++) {
        if (objectForm[i].name == "address-detail") {
            if (objectForm[i].value == "") {
                address_detail = true;
                $("#error-address-detail").text(
                    "* Địa chỉ số nhà không được để trống"
                );
                $(".input-address-detail").css(
                    "background",
                    "rgba(255, 0, 0, 0.116)",
                    "!important"
                );
                $(".input-address-detail").css(
                    "border",
                    "1px solid red",
                    "!important"
                );
            } else {
                address_detail = "";
                $("#error-address-detail").text("");
                $(".input-address-detail").css(
                    "background",
                    "rgba(0, 128, 0, 0.316)",
                    "!important"
                );
                $(".input-address-detail").css(
                    "border",
                    "2px solid green",
                    "!important"
                );
                //    background: none repeat scroll 0 0 #f0f0f0;
            }
        }
        if (objectForm[i].name == "name") {
            if (objectForm[i].value == "") {
                name = true;
                $("#error-name").text("* Tên  không được để trống");
                $(".input-name").css(
                    "background",
                    "rgba(255, 0, 0, 0.116)",
                    "!important"
                );
                $(".input-name").css("border", "1px solid red", "!important");
            } else {
                name = "";
                $("#error-name").text("");
                $(".input-name").css(
                    "background",
                    "rgba(0, 128, 0, 0.316)",
                    "!important"
                );
                $(".input-name").css("border", "2px solid green", "!important");
            }
        }
        if (objectForm[i].name == "city") {
            if (objectForm[i].value == "null") {
                city = true;
                $(".city").css(
                    "background",
                    "rgba(255, 0, 0, 0.116)",
                    "!important"
                );
                $(".city").css("border", "1px solid red", "!important");
            } else {
                city = "";
                $(".city").css("background", "white");
                $(".city").css("border", "2px solid green", "!important");
            }
        }
        if (objectForm[i].name == "number") {
            if (objectForm[i].value == "") {
                number = true;
                $("#error-phone-number").text(
                    "* Số điện thoại không được để trống"
                );
                $(".input-phone-number").css(
                    "background",
                    "rgba(255, 0, 0, 0.116)",
                    "!important"
                );
                $(".input-phone-number").css(
                    "border",
                    "1px solid red",
                    "!important"
                );
            } else {
                number = "";
                $("#error-phone-number").text("");
                $(".input-phone-number").css(
                    "background",
                    "rgba(0, 128, 0, 0.316)",
                    "!important"
                );
                $(".input-phone-number").css(
                    "border",
                    "2px solid green",
                    "!important"
                );
            }
        }
        if (objectForm[i].name == "email") {
            if (isValidEmailAddress(objectForm[i].value) != true) {
                email = true;
                $("#error-email").text("* email không hợp lệ");
                $(".input-email").css(
                    "background",
                    "rgba(255, 0, 0, 0.116)",
                    "!important"
                );
                $(".input-email").css("border", "1px solid red", "!important");
            } else {
                email = "";
                $("#error-email").text("");
                $(".input-email").css(
                    "background",
                    "rgba(0, 128, 0, 0.316)",
                    "!important"
                );
                $(".input-email").css(
                    "border",
                    "2px solid green",
                    "!important"
                );
            }
        }
    }

    if (
        address_detail == "" &&
        name == "" &&
        city == "" &&
        number == "" &&
        email == ""
    ) {
        return false;
    } else {
        return true;
    }
}
$(document).on("click", ".proceedbtn", function () {
    $(".otp-custum").remove();
    var objectForm = $("#submit-address-shipping").serializeArray();
    for (var i = 0; i < objectForm.length; i++) {
        if (objectForm[i].name == "email") {
            email = objectForm[i].value;
            break;
        }
    }
    var checkForm = validateFormCustom(objectForm);
    if (checkForm) {
        $("html, body").animate(
            {
                scrollTop: $(".top-information").offset().top,
            },
            1000
        );
    } else {
        var formOTP =
            ' <div class="shipping coupon hidden-sm otp-custum"><span type="button" class="close-custom"> <a href="javascript:;"> &times;</a></span><div class=""><h5>Xác thực mã OTP (Xác thực mua hàng)</h5></div><p id="email-name"> </p><form><input id="otp" type="number" class="coupon-input"> <span class="error-otp">  </span> <br/><button class="otp-auth pull-left" type="button">Xác thực</button></form></div>';
        var text =
            "Mã xác thực bao gồm 8 chữ số đã được gửi đến Email : " +
            email +
            "(Xác thực trong vòng 3 phút) !";

        $(".breadcrumbs").after(formOTP);
        $(".otp-custum").fadeIn(1000);
        $("#email-name").text(text);

        var url = "/handle-otp";
        $.ajax({
            type: "POST",
            url: String(url),
            data: { objectForm: objectForm },
            dataType: "html",
            success: function (result) {
                templateOderSuccess = result;
            },
        });
    }
});

$(document).on(
    "click",
    ".close-custom, .table-responsive, #show-cart, #submit-address-shipping",
    function () {
        $(".otp-custum").remove();
    }
);
$(document).on("click", ".otp-auth", function () {
    $(".error-otp").empty();
    $(".error-otp").append(
        '<strong>* Vui lòng đợi giây lát </strong> <i class="fa fa-spinner fa-pulse"></i>'
    );
    var codeOTP = $("#otp").val();
    if (codeOTP == "") {
        $(".error-otp").empty();
        $(".error-otp").append(
            "<strong>* Mã OTP không được để trống </strong>"
        );
    } else {
        var objectForm = $("#submit-address-shipping").serializeArray();
        var url = "/auth-otp";
        $.ajax({
            type: "POST",
            url: String(url),
            data: { codeOTP: codeOTP, objectForm: objectForm },
            dataType: "json",
            success: function (result) {
                if (result.status == "error") {
                    $(".error-otp").empty();
                    $(".error-otp").append(
                        "<strong>" + result.messenger + "</strong>"
                    );
                } else {

                    $(".otp-custum").remove();
                    $(".cart-area-start").empty();
                    $(".cart-area-start").append(templateOderSuccess);
                    $("html, body").animate(
                        {
                            scrollTop: $(".cart-area-start").offset().top,
                        },
                        1000
                    );
                    callbackShopingCart();
                }
            },
        });
    }
});
//login-ajax
$(".login-ajax").click(function () {
    var emailAjax = $("#email-ajax").val();
    var passWordAjax = $("#password-ajax").val();
    if( passWordAjax == ''){
        $("#error-login").text("Mật khẩu không được để trống");
        return (false);
    }
    if(isValidEmailAddress(emailAjax) == false){
        $("#error-login").text("Email không hợp lệ");
    }else {
        var url = "/login";
        $.ajax({
            type: "POST",
            url: String(url),
            data: {
                emailAjax: emailAjax,
                passWordAjax: passWordAjax,
            },
            dataType: "json",
            success: function (result) {
                if (result.status == "success") {
                    window.location.replace("/cart");
                } else {
                    $("#error-login").text("Email hoặc mật khẩu không chính xác");
                }
            },
        });
    }

});
$('.check-out-gues').click(function(){
    $("html, body").animate(
        {
            scrollTop: $(".top-information").offset().top,
        },
        1000
    );

});
