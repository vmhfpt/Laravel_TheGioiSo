
$(document).on("click", ".handle-cart", function () {
    var product_id = $(this).data("product");

    //1
    var color_id = $(`input[name*='color_${product_id}']:checked`).val();
    //  alert($('input').attr('color_11'));
    if (color_id == undefined) {
        alert("bạn chưa chọn màu sắc");
    } else {
        var url = "/add-cart";
        $.ajax({
            type: "POST",
            url: String(url),
            data: { color_id: color_id, quantity: 1 },
            dataType: "html",
            success: function (result) {
                $("#show-cart").empty();
                $("#show-cart").append(result);
            },
        });
    }
});
$(document).on("click", ".remove", function () {
    var index = $(this).data("delete");
   // alert(index);
    var url = "/delete-cart";
    $.ajax({
        type: "POST",
        url: String(url),
        data:  { index : index},
        dataType: "html",
        success: function (result) {
            $("#show-cart").empty();
            $("#show-cart").append(result);
        },
    });
});
$(document).on("click", ".search-more", function () {
    $('.search-more').removeClass('active-search');
    $(this).addClass('active-search');
  var keyboard = location.search.split('key=')[1];
   var name =  $(this).data("platform");
   var url = '/get-keyboard/platform-ajax';
   $.ajax({
    type: "POST",
    url: String(url),
    data:  { keyboard : keyboard,
           name : name,
           page : 1
    },
    dataType: "html",
    success: function (result) {
        $('.more-product-filter').empty();
        $('.more-product-filter').append(result);
    },
});
});

