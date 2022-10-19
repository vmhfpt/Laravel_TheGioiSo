
$(document).on("click", ".pagination-more", function () {
    var keyboard = location.search.split('key=')[1];
    var platForm = $('.active-search').data("platform");
    var url = '/get-keyboard/platform-ajax';
    var page = $(this).data("page");
    $.ajax({
     type: "POST",
     url: String(url),
     data:  { keyboard : keyboard,
            name : platForm,
            page : page
     },
     dataType: "html",
     success: function (result) {
         $('.more-product-filter').empty();
         $('.more-product-filter').append(result);
     },
 });
});
