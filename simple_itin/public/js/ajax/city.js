$("#example1").on("click", ".btnEditCity", function(){
    var cityId = $(this).data("city_id");
    var city = $(this).data("city");

    $("#city_id").val(cityId);
    $("#city").val(city);
    $("#editModalCity").modal("show");
});

$("#btnUpdateCity").on("click", function (e) {
    e.preventDefault();

    var cityId = $("#city_id").val();
    var city = $("#city").val();


});
