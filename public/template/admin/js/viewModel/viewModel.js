var category_id = 0;
var view_type = 0;
$(".submit-delete-custom").click(function () {
    var arrayProduct = [];
    $(".product-checked:checked").each(function () {
        arrayProduct.push($(this).val());
    });
    if (arrayProduct.length == 0) {
        alert("Bạn chưa chọn sản phẩm nào");
    }else {
       url = String("/admin/view-mode/remove-view-product");
       $.ajax({
           type: "POST",
           url: String(url),
           data: {
               array_product: arrayProduct
           },
           dataType: "html",
           success: function (result) {
               for(var i = 0; i < arrayProduct.length; i++){
                   console.log(arrayProduct[i]);
                   $( "#" +  arrayProduct[i]).addClass("check-success-remove" );
                   $( "#change" +  arrayProduct[i]).empty();
                   var icon = "<i class='fas fa-check-circle' style='font-size:20px;color:rgb(10, 218, 89)'></i>";
                   $( "#change" +  arrayProduct[i]).append(icon);
                   $( "#text" +  arrayProduct[i]).html("Đã gỡ");

               }
           },
       });
    }
});
$(".submit-custom").click(function () {
    var arrayProduct = [];
    $(".product-checked:checked").each(function () {
        arrayProduct.push($(this).val());
    });
    if (arrayProduct.length == 0) {
        alert("Bạn chưa chọn sản phẩm nào");
    } else {
        url = String("/admin/view-mode/submit-change-view-model-product");
        $.ajax({
            type: "POST",
            url: String(url),
            data: {
                array_product: arrayProduct,
                view_type: view_type,
            },
            dataType: "html",
            success: function (result) {
                for(var i = 0; i < arrayProduct.length; i++){
                    console.log(arrayProduct[i]);
                    $( "#" +  arrayProduct[i]).addClass("check-success" );
                    $( "#change" +  arrayProduct[i]).empty();
                    var icon = "<i class='fas fa-check-circle' style='font-size:20px;color:rgb(10, 218, 89)'></i>";
                    $( "#change" +  arrayProduct[i]).append(icon);
                    $( "#text" +  arrayProduct[i]).html("Đã Thêm");

                }
              //  $("#result").html(result);
            },
        });
        //submit-change-view-model-product
      //  console.log('gửi request');
     //   console.log('Array', arrayProduct);
      //  console.log('type_view', view_type);

    }
});
$(".get-platform").change(function () {
    $("#example2").empty();
    var platForm_id = $(this).val();
    $("#result").empty();
    if (platForm_id != 0) {
        url = String("/admin/view-mode/get-category");
        $.ajax({
            type: "POST",
            url: String(url),
            data: { platForm_id: platForm_id },
            //  data: { city_id },
            dataType: "html",
            success: function (result) {
                $("#result").html(result);
            },
        });
    }
});
//.change-view-model
$(document).on("change", ".change-view-model", function () {
    var textSelect = $(".change-view-model>option:selected").text();
   // alert(textSelect);
   $(".submit-custom").text('Thêm vào mục ' + textSelect);
    var type_url = $(location).attr('pathname');
    view_type = $(this).val();
    category_id = $(".change-category").val();
    if (view_type == 0) {
        $("#example2").empty();
    } else {
        if ( type_url != '/admin/view-mode/list'){
            url = String("/admin/view-mode/get-product");
        }else {
            url = String("/admin/view-mode/get-product-list");
        }
        $.ajax({
            type: "POST",
            url: String(url),
            data: {
                category_id: category_id,
                view_type: view_type,
            },
            dataType: "html",
            success: function (result) {
                $("#example2").html(result);
            },
        });
    }
});

$(document).on("change", ".change-category", function () {
    $("#example2").empty();
    $("#default-select").prop("selected", true);
});
