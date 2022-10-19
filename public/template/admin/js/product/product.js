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
CKEDITOR.replace('content');
