//success-1
$(document).on("click", ".success", function () {
    var that = this;
    //   $(this).removeClass("success");

    var button = $(this).data("active");
    var url = window.location.pathname + "/active";
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            active: button,
            type: "check",
        },
        dataType: "json",
        success: function (result) {
            if (result.status == true) {
                $(that).removeClass("success");
                $(".slider-" + button).removeClass("un-success");
                $(".timeline-" + button).empty();
                $(".timeline-" + button).append(
                    `<div class="form-group form-group-${button}"><label>Nội dung</label><textarea id="content-${button}" class="form-control" rows="3" placeholder="Enter ...">   </textarea></div>`
                );
                $(".success-" + button).addClass("submit");
            }
        },
    });
});
$(document).on("click", ".submit", function () {
    var button = $(this).data("active");

    var content = $("#content-" + button).val();
    var url = window.location.pathname + "/active";
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            active: button,
            type: "update",
            content: content,
        },
        dataType: "json",
        success: function (result) {

            var name = result.user_name;
            var date = result.date;

            var templateTime = `<i class="fas fa-clock"</i> ${date}`;
            $(`.time-${button}`).empty();
            $(`.time-${button}`).append(templateTime);
            $(`.success-${button}, .form-group-${button}`).remove();
            var template =
                `<div class="timeline-body">${content}</div>` +
                '<div class="timeline-footer">' +
                ` <a href=":;" class="btn btn-primary btn-sm">Nhân viên : ${name}</a>` +
                ' <a href="javascript:;" class="btn btn-warning btn-sm">Đã xác nhận</a></div>';
            $(".timeline-header-" + button).after(template);
        },
    });
});
$(document).on("click", ".fa-pen", function () {
    var button = $(this).data("edit");
    $("." + button).empty();
    $("." + button).append(
        `<input name="${button}" type="text" placeholder="Enter ..."> <i data-edit="${button}" class='far fa-check-circle'></i>`
    );
    //alert(button);
    //value_input = $("input[name*='xxxx']").val();
});
$(document).on("click", ".fa-check-circle", function () {
    var url = window.location.pathname;

    var button = $(this).data("edit");
    value_input = $(`input[name*='${button}']`).val();
    // alert(value_input);
    $("." + button).empty();
    $("." + button).append(
        `${value_input}<i data-edit="${button}" class='fas fa-pen'></i>`
    );
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            changeColumn: button,
            value: value_input,
        },
        dataType: "json",
        success: function (result) {},
    });
});
$(document).on("click", ".address-change", function () {
    $(".over-layer").fadeIn(200);
    $(".address-custum").fadeIn(400);
});
$(document).on("click", ".over-layer", function () {
    $(this).fadeOut(200);
    $(".address-custum").fadeOut(400);
});

$(document).on("click", ".submit-address-oder", function () {
    var city_id = $('select[name*="city"]').val();
    var district_id = $(`select[name*='district']`).val();
    var ward_id = $(`select[name*='wards']`).val();
    var address_detail = $(`input[name*='address-detail']`).val();

    var url = window.location.pathname;
    $.ajax({
        type: "POST",
        url: String(url),
        data: {
            changeColumn: "address-detail",
            city_id: city_id,
            district_id: district_id,
            ward_id: ward_id,
            address_detail: address_detail,
        },
        dataType: "json",
        success: function (result) {
            var address = result.address_detail;
            var transportFee = result.transport_fee;
            var total = $(".get-total").text();
            var temp = String(
                total.replace(/\s/g, "").replace(/\./g, "").replace(/đ/g, "")
            );
            var endTotal = Number(temp) + Number(result.transport_fee);
            $(".total").text(
                String(endTotal).replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "đ"
            );
            $(".address-change-ajax").empty();
            $(".address-change-ajax").append(
                address +
                    '<i data-edit="address-detail"class="address-change fas fa-eraser"></i>'
            );
            $(".transport-change-ajax").empty();
            $(".transport-change-ajax").append(transportFee + "đ");
            $(".over-layer").fadeOut(200);
            $(".address-custum").fadeOut(400);
        },
    });
});
