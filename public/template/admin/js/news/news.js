 function deleteItemNews(id, url, namePlatForm){
    var name = namePlatForm;
    if (confirm("Bạn có chắc muốn xóa tin tức " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            dataType: "html",
            success: function (result) {
                $( "#" + id ).fadeOut( "slow" );
            },
        });
    }
 }
