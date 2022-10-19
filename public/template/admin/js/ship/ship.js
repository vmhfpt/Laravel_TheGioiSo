$(".city").change(function () {
    $("#more-wards").empty();
    $("#more-district").empty();
    //district
    var city_id = $(this).val();
    url = String("/admin/ship/get-district");
    if(city_id != 'null'){
        $.ajax({
            type: "POST",
            url: String(url),
            data: { city_id: city_id, first_district: false },
            //  data: { city_id },
            dataType: "html",
            success: function (result) {
                $("#result").html(result);
            },
        });
    }

});
$(document).on("change", ".district",  function(){
    $('#more-wards').empty();
    var district_id = $(this).val();
    url = String("/admin/ship/get-wards");
    $.ajax({
        type: "POST",
        url: String(url),
        data: { district_id },
        dataType: "html",
        success: function (result) {

          $('#more-wards').html(result);
        },
    });
 });
 function deleteItemShip(id, url, nameUser) {
    var name = nameUser;
    if (confirm("Bạn có chắc muốn xóa phí vận chuyển: " + name + " Không !")) {
        $.ajax({
            type: "DELETE",
            url: String(url),
            data: { id },
            // data: { name: "John", location: "Boston" },
            dataType: "json",
            success: function (result) {
                alert("Xóa phí vận chuyển: " + name + " Thành Công");
             $( "#" + id ).fadeOut( "slow" );
            },
        });
    }
}
