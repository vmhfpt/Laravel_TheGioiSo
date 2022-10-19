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
             $( "#" + id ).fadeOut( "slow" );
            },
        });
    }
}
$(document).on("click", ".show-more",  function(){
   var id = $(this).data("id");
    var url = "/admin/comment/show-comment-children";
   // alert(id);
     $.ajax({
        type: "POST",
        url: String(url),
        data: { id },
        dataType: "html",
        success: function (result) {
           $(".show-here-comment-children").append(result);
           $( ".custom-show-more" ).fadeIn("slow");
        },
    });
 });
 $(document).on("click", ".close-comment",  function(){
    $(".custom-show-more").remove();
 });
 $(document).on("click", ".dash-board-show",  function(){
    var id = $(this).data("id");
     var url = "/admin/comment/show-dashboard";
     $.ajax({
        type: "POST",
        url: String(url),
        data: { id },
        dataType: "html",
        success: function (result) {
            //console.log(result);
           // handleComment(result);
           $(".show-here-comment-dashboard").append(result);
           $( ".dash-board" ).fadeIn("slow");
        },
    });

  });
  $(document).on("click", ".close-comment",  function(){
    $(".custom-show-more").remove();
 });
 $(document).on("click", ".close-custom",  function(){
      $(".dash-board").remove();
  });

