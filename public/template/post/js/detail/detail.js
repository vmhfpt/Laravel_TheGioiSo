var parent_id = 0;
var color_id = 0;
var rating = 0;
var page_current = 1;
$(document).on("click", ".add-cart-custom", function () {
    var quantity = $("#qty").val();
    if (color_id == 0) {
        $(".custom-error-color").remove();
        var element =
            '<span class="custom-error-color"> * Vui lòng chọn một màu sắc</span>';
        $(".action-buttons-single").after(element);
    } else {
        //|| Number.isInteger()
        if (
            quantity == "" ||
            quantity == 0 ||
            Number.isInteger(Number(quantity)) == false
        ) {
            $(".custom-error-color").remove();
            var element =
                '<span class="custom-error-color"> * Vui lòng điền số lượng phù hợp</span>';
            $(".action-buttons-single").after(element);
        } else {
            $(".custom-error-color").remove();

            var url = "/add-cart";
            $.ajax({
                type: "POST",
                url: String(url),
                data: { color_id: color_id, quantity: quantity },
                dataType: "html",
                success: function (result) {
                    $("#show-cart").empty();
                    $("#show-cart").append(result);
                },
            });
        }
    }
});
$(document).on("click", ".change-color", function () {
    var element_vote = $(".pro-rating-rank").html();
  //  console.log(elemet_vote);
    color_id = $(this).data("color");
    var url = "/get-detail-color";
    $.ajax({
        type: "POST",
        url: String(url),
        data: { color_id: color_id },
        dataType: "html",
        success: function (result) {
            $("#result-detail-color").empty();
            $("#result-detail-color").append(result);
            $(".pro-rating-rank").empty();
            $(".pro-rating-rank").append(element_vote);
            $(".bxslider").bxSlider({
                slideWidth: 80,
                slideMargin: 15,
                minSlides: 3,
                maxSlides: 4,
                pager: false,
                speed: 500,
                pause: 3000,
                adaptiveHeight: false,
            });
            $("#zoom1").elevateZoom({
                gallery: "gallery_01",
                cursor: "pointer",
                galleryActiveClass: "active",
                imageCrossfade: true,
            });
        },
    });
});

$(document).on("click", ".hidden-content", function () {
    $(".product-tab-content").removeClass("showWidth");
    $(".show-custom").empty();
    var button =
        ' <a class="show-more collapse" style="background: orange !important"  href="javascript:;"> Thu gọn</a>';
    $(".show-custom").append(button);
});
$(document).on("click", ".collapse", function () {
    $(".product-tab-content").addClass("showWidth");
    $(".show-custom").empty();
    var button =
        ' <a class="show-more hidden-content" style="background: orange !important"  href="javascript:;"> Đọc Thêm</a>';
    $(".show-custom").append(button);
});
$(document).on("mouseover", ".elevatezoom-gallery", function () {
    var url = $(this).data("image");

    $(".change-zoom").attr("src", url);

    $("#zoom1").attr("data-zoom-image", "Undertaker");
});
$(document).on("keyup", "#qty", function () {
    $("#next, #prev").removeAttr("disabled");
    var valueQuantity = $(this).val();
    Number;
    //console.log(valueQuantity);
    if (Number(valueQuantity) > 3 || 0 > Number(valueQuantity)) {
        $(this).val(1);
    }
});
$(document).on("click", "#prev", function () {
    var value = $("#qty").val();
    value--;
    if (value > 0) {
        $("#qty").val(value);
        $("#next").removeAttr("disabled");
    } else {
        $(this).prop("disabled", true);
    }
});
$(document).on("click", "#next", function () {
    var value = $("#qty").val();
    value++;
    if (value <= 3) {
        $("#qty").val(value);
        $("#prev").removeAttr("disabled");
    } else {
        $(this).prop("disabled", true);
    }
});

$(document).on("click", ".current", function () {
    var page = $(this).data("page");
    page_current = page;
    var url = window.location.pathname;
    $.ajax({
        type: "POST",
        url: String(url),
        data: { page: page },
        dataType: "html",
        success: function (result) {
            //$("#result-comment").empty();
            $("#result-comment").empty();
            $("#result-comment").append(result);
            $("html, body").animate(
                {
                    scrollTop: $(".single-product-tab").offset().top,
                },
                1000
            );
        },
    });
});
//send-rating
$(document).on("click", ".send-rating", function () {
    $(".send-rating").removeClass("active-vote");
    $(".send-rating").addClass("fa-star-o");
    rating = $(this).data("rating");
    if (rating == 1) {
        $(".alert-rating").text("* Rất tệ");
    }
    if (rating == 2) {
        $(".alert-rating").text("* Tệ");
    }
    if (rating == 3) {
        $(".alert-rating").text("* Bình thường");
    }
    if (rating == 4) {
        $(".alert-rating").text("* Tốt");
    }
    if (rating == 5) {
        $(".alert-rating").text("* Rất tốt");
    }

    for (var i = 1; i <= Number(rating); i++) {
      //  $("#rating" + i).removeClass("fa-star-o");
        $("#rating" + i).addClass("active-vote");
    }
});
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(
        /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
    );
    return pattern.test(emailAddress);
}
function isNum(val) {
    return !isNaN(val);
}
$(document).on("click", ".custum-button-send", function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone_number = $("#phone_number").val();
    var content = $("#message").val();
    if (
        name == "" ||
        isNum(phone_number) == false ||
        content == "" ||
        isValidEmailAddress(email) == false
    ) {
        $(".email-notes-add").css("color", "red");
        $(".email-notes-add").text("* Vui lòng điền đầy đủ thông tin chính xác!");
        $("html, body").animate(
            {
                scrollTop: $(".comment-respond-add").offset().top,
            },
            1000
        );
    } else {
        if (rating > 5 || rating < 0) {
            alert("Xếp hạng không hợp lệ");
        } else {
            var url = "/add-comment" + window.location.pathname;

            $.ajax({
                type: "POST",
                url: String(url),
                data: {
                    rating: rating,
                    email: email,
                    name: name,
                    phone_number: phone_number,
                    content: content,
                    parent_id: 0,
                    page_current : 1,
                },
                dataType: "html",
                success: function (result) {
                    $("#result-comment").empty();
                    $("#result-comment").append(result);
                    $("html, body").animate(
                        {
                            scrollTop: $(".single-product-tab").offset().top,
                        },
                        1000
                    );
                },
            });
        }
    }
});
$(document).on("click", ".reply-comment", function () {
    var templateComment = ` <div class="comment-respond  reply">
<span class="email-notes email-notes-reply">Địa chỉ Email, số điện thoại của bạn sẽ không bị công
    bố,vui lòng điền các thông tin bắt buộc nhập *</span>
<form id="sendComment">
    <div class="row">
        <div class="col-md-12">
            <p>Tên *</p>
            <input id="name-reply" type="text">
        </div>
        <div class="col-md-12">
            <p>Email *</p>
            <input  id="email-reply" type="email">
        </div>
        <div class="col-md-12">
            <p>Số điện thoại *</p>
            <input id="phone_number-reply"  type="text">
        </div>

        <div class="col-md-12 comment-form-comment">
            <p>Đánh giá của bạn</p>
            <textarea id="message" class="message-reply" cols="30" rows="10"></textarea>
           <button class="reply-comment-submit" type="button">Gửi </button>
        </div>
    </div>
</form>
</div>`;
    $('.reply').remove();
    parent_id = $(this).data("reply");
   // alert(dataTemplate);
    $(".add-template-comment-" + parent_id).after(templateComment);
});
$(document).on("click", ".reply-comment-submit", function () {
    var name = $("#name-reply").val();
    var email = $("#email-reply").val();
    var phone_number = $("#phone_number-reply").val();
    var content = $(".message-reply").val();

    if (
        name == "" ||
        isNum(phone_number) == false ||
        content == "" ||
        isValidEmailAddress(email) == false
    ) {
        $(".email-notes-reply").css("color", "red");
        $(".email-notes-reply").text("* Vui lòng điền đầy đủ thông tin chính xác!");
        $("html, body").animate(
            {
                scrollTop: $(".add-template-comment-" + parent_id).offset().top,
            },
            1000
        );
    } else {
      //  console.log(name);
       // console.log(email);
       // console.log(phone_number);
       // console.log(content);
       // console.log(parent_id);

        var url = "/add-comment" + window.location.pathname;


        $.ajax({
            type: "POST",
            url: String(url),
            data: {
                rating: 0,
                email: email,
                name: name,
                phone_number: phone_number,
                content: content,
                parent_id: parent_id,
                page_current : page_current,
            },
            dataType: "html",
            success: function (result) {
                $("#result-comment").empty();
                $("#result-comment").append(result);
                $("html, body").animate(
                    {
                        scrollTop: $(".single-product-tab").offset().top,
                    },
                    1000
                );
            },
        });
    }
});
