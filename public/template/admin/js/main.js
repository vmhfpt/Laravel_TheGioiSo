/*$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(".event-delete").click(function () {
    var id = $(this).data("id");
    var url = "/admin/color/delete";
    if (confirm("Bạn có chắc muốn xóa ảnh này Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            // data: { name: "John", location: "Boston" },
            dataType: "html",
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
function deleteItem(id, url, nameCategory) {
    var name = nameCategory;
    if (confirm("Bạn có chắc muốn xóa " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            // data: { name: "John", location: "Boston" },
            dataType: "json",
            success: function (result) {
                alert("Xóa " + name + " Thành Công");
                location.reload();
            },
        });
    }
}
function deleteComment(id, url, nameUser) {
    var name = nameUser;
    if (confirm("Bạn có chắc muốn xóa đánh giá của " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            // data: { name: "John", location: "Boston" },
            dataType: "json",
            success: function (result) {
                alert("Xóa đánh giá của " + name + " Thành Công");
                location.reload();
            },
        });
    }
}
function deleteItemProduct(id, url, nameProduct) {
    var name = nameProduct;
    if (confirm("Bạn có chắc muốn xóa " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            dataType: "json",
            success: function (result) {
                alert("Xóa " + name + " Thành Công");
                location.reload();
            },
        });
    }
}
function deleteItemPlatForm(id, url, namePlatForm) {
    var name = namePlatForm;
    if (confirm("Bạn có chắc muốn xóa " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            dataType: "json",
            success: function (result) {
                alert("Xóa " + name + " Thành Công");
                location.reload();
            },
        });
    }
}


function handleComment(data){
    //console.log(data);
    var  templateCmt = '';
    for(var i = 0; i < data.length; i++){
        templateCmt = templateCmt +
        `<tr id= ${data[i].id} >` +
        "<td> " + (i+1) + " </td> " +
        "<td> " + data[i].name + " </td> " +
        "<td> " + data[i].number_phone + " </td> " +
        "<td> " + data[i].content + " </td> " +
        "<td> " + data[i].created_at + " </td> " +
        "<td> " +  '<a class="btn btn-primary btn-sm" href="javascript:;">' +
        '<i class="fas fa-folder">' +
        '</i> Chi Tiết</a>' +  " </td> " +

        `<td onclick='deleteCommentAjax("${data[i].id}","/admin/comment/delete","${data[i].name}")' > ` +  '<a class="btn btn-danger btn-sm" href="javascript:;">' +
        '<i  class="fas fa-folder">' +
        '</i> Xóa</a>' +  " </td> " + '</tr>';
        ;
      //  console.log(data[i].name);
    }
    var template =
    " <section class='content custom-show-more'>" +
    "<button type='button' class='close-custom btn btn-warning'>&times;</button>" +
    ' <table id="example2" class="table table-bordered table-hover">' +
    "<thead>" +
    "<tr>" +
    " <th>STT</th>" +
    "<th>Tên</th>" +
    "<th  >SĐT</th>" +
    "<th class='click-here' >Nội dung</th>" +
    "<th>Ngày post</th>" +
    "<th></th>" +
    " <th></th>" +
    "</tr>" +
    "</thead>" +
    " <tbody>" +
    templateCmt +
    "</tbody>" +
    "</table>" +
    "</section>";

    //console.log(templateCmt);
$(".show-here-comment-children").append(template);
}




$(document).on("click", ".show-more",  function(){
    var id = $(this).data("id");
    var url = "/admin/comment/show-comment-children";
    $.ajax({
        type: "POST",
        url: String(url),
        data: { id },
        dataType: "json",
        success: function (result) {
            handleComment(result);
        },
    });
 });
 $(document).on("click", ".close-custom",  function(){
    $(".custom-show-more").remove();
 });


function deleteCommentAjax(id, url, nameUser) {
    var name = nameUser;

    if (confirm("Bạn có chắc muốn xóa đánh giá của " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            // data: { name: "John", location: "Boston" },
            dataType: "json",
            success: function (result) {
                alert("Xóa đánh giá của " + name + " Thành Công");
                $("#" + id + "").remove();
            },
        });
    }
}

*/

