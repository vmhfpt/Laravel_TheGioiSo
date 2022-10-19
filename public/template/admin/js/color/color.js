$(".event-delete").click(function () {
    var id = $('option').data("id");

    var url = "/admin/color/delete";
    if (confirm("Bạn có chắc muốn xóa ảnh này Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            // data: { name: "John", location: "Boston" },
            dataType: "json",
            success: function (result) {
                $("#" + id + "").remove();
            },
        });
    }
});
function preview_image(event) {
    var total_file = document.getElementById("uploadMultiple").files.length;
    for (var i = 0; i < total_file; i++) {
        $(".custom-upload").append(
            ' <div class="filtr-item custom-upload-item col-sm-2" data-category="1" data-sort="white sample">' +
                "<img class='img-fluid mb-2' src='" +
                URL.createObjectURL(event.target.files[i]) +
                "'>" +
                "</div>"
        );
    }
}

$("#uploadMultiple").change(function (event) {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".multiple").addClass("selected").html(fileName);
    $(".custom-upload-item").remove();
    preview_image(event);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imgSrc").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#customFile").change(function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFile").addClass("selected").html(fileName);
    readURL(this);
});
