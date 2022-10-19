
$(".type-id").change(function () {
    var type_id = $(this).val();
    url = String("/admin/value-atribute/get-type");
        $.ajax({
            type: "POST",
            url: String(url),
            //data: { city_id: city_id, first_district: false },
              data: { type_id },
            dataType: "html",
            success: function (result) {
                $("#result").empty();
               $("#result").html(result);
            },
        });
});
function deleteItemValue(id, url, namePlatForm) {
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
