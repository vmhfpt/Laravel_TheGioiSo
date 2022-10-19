$(".filter-platform").change(function () {
   var type_id = $(this).val();
   url = String("/admin/atribute/get-product-type");
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
function deleteItemAtribute(id, url, namePlatForm) {
    var name = namePlatForm;
    if (confirm("Bạn có chắc muốn xóa " + name + " Không !")) {
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
function deleteItemDetail(id, url, namePlatForm){
    var name = namePlatForm;
    if (confirm("Bạn có chắc muốn gỡ " + name + " Không !")) {
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
