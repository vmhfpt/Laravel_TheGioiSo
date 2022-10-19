$(document).on("click", ".nav-link",  function(){
    $( ".nav-link" ).removeClass( "active" );
    $(this).addClass( "active" );
    var id = $(this).data("id");
    var slug = $(this).data("slug");
    var url = "/admin/rating/show-rating";
    $.ajax({
        type: "POST",
        url: String(url),
        data: { id: id, slug: slug },
        dataType: "html",
        success: function (result) {

            $("#get-more").html(result);
        },
    });
 });
