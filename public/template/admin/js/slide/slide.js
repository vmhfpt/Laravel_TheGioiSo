function deleteItemSlide(id, url, nameProduct) {
    var name = nameProduct;
    if (confirm("Bạn có chắc muốn xóa " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            dataType: "json",
            success: function (result) {
                $( "#" + id ).fadeOut( "slow" );
            },
        });
    }
}
