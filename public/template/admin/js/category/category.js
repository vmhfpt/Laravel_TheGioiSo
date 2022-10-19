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
function deleteItemCategoryNews(id, url, namePlatForm) {
    var name = namePlatForm;
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
CKEDITOR.replace('content');
