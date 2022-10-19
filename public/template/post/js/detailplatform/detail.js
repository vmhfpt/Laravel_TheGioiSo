var filterCategory = [];
var filterPrice = [];
var filterRam = [];
var filterRom = [];
var arrayFilter = [];
var sort = "";
var page = "";
var stringUrl = "";

function getUrlVars() {

    var parts = window.location.href.replace(
        /[?&]+([^=&]+)=([^&]*)/gi,
        function (m) {
            stringUrl = stringUrl + String(m);
        }
    );
    return stringUrl;
}

var urlFilter = "";
if (getUrlVars() != "") {
    urlFilter = getUrlVars();
}
//?ca=1,2,3&p=1,2,39&r=7
function nullArr(array) {
    if (array.length == 0) {
        return true;
    } else {
        return false;
    }
}
function handleFilter() {

    urlFilter = "";
    var demoArr = [];
    if (nullArr(filterCategory) == false) {
        if (nullArr(demoArr) == true) {
            demoArr.push("?ca=" + String(filterCategory.reverse()));
        } else {
            demoArr.push("&ca=" + String(filterCategory.reverse()));
        }
    }
    if (nullArr(filterPrice) == false) {
        if (nullArr(demoArr) == true) {
            demoArr.push("?pr=" + String(filterPrice.reverse()));
        } else {
            demoArr.push("&pr=" + String(filterPrice.reverse()));
        }
    }
    if (nullArr(filterRam) == false) {
        if (nullArr(demoArr) == true) {
            demoArr.push("?ra=" + String(filterRam.reverse()));
        } else {
            demoArr.push("&ra=" + String(filterRam.reverse()));
        }
    }
    if (nullArr(filterRom) == false) {
        if (nullArr(demoArr) == true) {
            demoArr.push("?ro=" + String(filterRom.reverse()));
        } else {
            demoArr.push("&ro=" + String(filterRom.reverse()));
        }
    }
    if (sort != "") {
        if (nullArr(demoArr) == true) {
            demoArr.push("?sort=" + sort);
        } else {
            demoArr.push("&sort=" + sort);
        }
    }
    if (page != "") {
        if (nullArr(demoArr) == true) {
            demoArr.push("?page=" + page);
        } else {
            demoArr.push("&page=" + page);
        }
    }

    for (var i = 0; i < demoArr.length; i++) {
        urlFilter = urlFilter + demoArr[i];
    }
   //  history.pushState({}, null, window.location.pathname);

     //history.pushState({}, null, window.location.href +  urlFilter);
    var url = String(urlFilter);

 // alert(stringUrl);
    $.ajax({
        type: "POST",
        url: String(url),
        data: {},
        dataType: "json",
        success: function (result) {
            $(".ajax-quantity-show").text(
                "Xem " + result.quantity + " Sản phẩm"
            );
        },
    });
}

$(document).on("click", ".show-select", function () {
    page = 0;
    var elementDelete = Number($(this).data("delete"));
    var type = $(this).data("filter");
    if (type == "ca") {
        filterCategory = filterCategory.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    if (type == "pr") {
        filterPrice = filterPrice.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    if (type == "ro") {
        filterRom = filterRom.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    if (type == "ra") {
        filterRam = filterRam.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    handleFilter();
});
$(document).on("click", ".filter-category", function () {

    if (filterCategory.includes($(this).data("filter")) == false) {
        filterCategory.push($(this).data("filter"));
        page = 0;
        handleFilter();

        $(".show-delete").append(
            ` <a class="show-select" data-filter="ca" data-delete="${$(
                this
            ).data("filter")}" href="javascript:;">${$(
                this
            ).text()} &times;</a>`
        );
    }
});
$(document).on("click", ".pagination-more", function () {
    // handleFilter();
    page = $(this).data("page");
    handleFilter();

    history.pushState({}, null, window.location.pathname);
    history.pushState({}, null, window.location.href + urlFilter);
    var url = String("/get" + window.location.pathname + urlFilter);

    $.ajax({
        type: "POST",
        url: String(url),
        dataType: "html",
        success: function (result) {
            $(".more-product-filter").empty();
            $(".more-product-filter").append(result);
        },
    });
});
//pagination-more
//orderby
$(document).on("change", ".orderby", function () {

    if ($(this).val() == "asc") {
        sort = "asc";
    }
    if ($(this).val() == "desc") {
        sort = "desc";
    }
    handleFilter();
    //  alert(urlFilter);
    history.pushState({}, null, window.location.pathname);
    history.pushState({}, null, window.location.href + urlFilter);
    var url = String("/get" + window.location.pathname + urlFilter);
    $.ajax({
        type: "POST",
        url: String(url),
        dataType: "html",
        success: function (result) {
            $(".more-product-filter").empty();
            $(".more-product-filter").append(result);
            $("html, body").animate(
                {
                    scrollTop: $(".more-product-filter").offset().top,
                },
                1000
            );
        },
    });
});
$(document).on("click", ".ajax-quantity-show", function () {

    history.pushState({}, null, window.location.pathname);
    history.pushState({}, null, window.location.href + urlFilter);
    var url = String("/get" + window.location.pathname + urlFilter);
    $.ajax({
        type: "POST",
        url: String(url),
        dataType: "html",
        success: function (result) {
            $(".more-product-filter").empty();
            $(".more-product-filter").append(result);
            $("html, body").animate(
                {
                    scrollTop: $(".more-product-filter").offset().top,
                },
                1000
            );
        },
    });
});
$(document).on("click", ".filter-ram", function () {

    if (filterRam.includes($(this).data("filter")) == false) {
        filterRam.push($(this).data("filter"));
        page = 0;
        handleFilter();
        $(".show-delete").append(
            ` <a class="show-select" data-filter="ra" data-delete="${$(
                this
            ).data("filter")}" href="javascript:;">${$(
                this
            ).text()} &times;</a>`
        );
    }
});
$(document).on("click", ".filter-rom", function () {

    if (filterRom.includes($(this).data("filter")) == false) {
        filterRom.push($(this).data("filter"));
        page = 0;
        handleFilter();
        $(".show-delete").append(
            ` <a class="show-select" data-filter="ro" data-delete="${$(
                this
            ).data("filter")}" href="javascript:;">${$(
                this
            ).text()} &times;</a>`
        );
    }
});
$(document).on("click", ".filter-price", function () {

    if (filterPrice.includes($(this).data("filter")) == false) {
        filterPrice.push($(this).data("filter"));
        page = 0;
        handleFilter();
        $(".show-delete").append(
            ` <a class="show-select" data-filter="pr" data-delete="${$(
                this
            ).data("filter")}" href="javascript:;">${$(
                this
            ).text()} &times;</a>`
        );
    }
});
