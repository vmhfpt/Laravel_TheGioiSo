$(".city").change(function () {
    //   $("#more-wards").empty();
    // $("#more-district").empty();

    var city_id = $(this).val();
 //alert(city_id)
    url = String("/get-district");
    if (city_id != "") {
        $.ajax({
            type: "POST",
            url: String(url),
            data: { city_id: city_id},
            //  data: { city_id },
            dataType: "html",
            success: function (result) {

                $("#result").empty();
                $("#result").append(result);

            },
        });
    } else {
        $("#result").empty();
    }
});
$(document).on("change", "#more-district", function () {
    $("#more-wards").empty();
    var district_id = $(this).val();
    url = String("/get-wards");
    $.ajax({
        type: "POST",
        url: String(url),
        data: { district_id },
        dataType: "html",
        success: function (result) {
            $("#more-wards").empty();
            $("#more-wards").append(result);

        },
    });
});
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(
        /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
    );
    return pattern.test(emailAddress);
}
$(".login-ajax").click(function () {
    var emailAjax = $("#email-ajax").val();
    var passWordAjax = $("#password-ajax").val();
    if( passWordAjax == ''){
        $("#error-password").text("* Mật khẩu không được để trống");
        return (false);
    } else {
        $("#error-password").text("");
    }
    if(isValidEmailAddress(emailAjax) == false){

       $("#error-email").text("* Email không hợp lệ");
    }else {
        $("#error-email").text("");
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
                    $('.alert-config').remove();
                    $("#error-password").after(' <a class="alert-config"><span>Cảnh báo!</span> Email hoặc mật khẩu không chính xác!</a>');
                }
            },
        });
    }

});
