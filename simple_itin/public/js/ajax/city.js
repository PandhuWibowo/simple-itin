$("#btnAddCity").on("click", function(e){
    e.preventDefault();
    let city = $("#city").val();

    if(city == "" || city == undefined){
        Swal.fire({
            type: 'info',
            title: 'Required',
            text: 'City is required',
        });
    }else{
        try {
            $.ajax({
                type    : "POST",
                url     : "/backend/cities/store",
                async   : true,
                dataType: "JSON",
                data    : {
                    nama_kota   : city
                },
                success:function(data){
                    if(data.response == "success"){
                        $("#addModalCity").modal("hide");
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(function () {
                            window.location.href = "cities";
                        });
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Failed',
                            text: data.message,
                        });
                    }
                },
                error:function(data){
                    console.log(data);
                }
            })
        }
        catch (e){
            console.log(e);
        }
    }
});


//Modal Edit City
$("#example1").on("click", ".btnEditCity", function(){
    let cityId = $(this).data("city_id");
    let city = $(this).data("city");

    $("#city_id").val(cityId);
    $("#city").val(city);
    $("#editModalCity").modal("show");
});

//Update Kota
$("#btnUpdateCity").on("click", function (e) {
    e.preventDefault();

    let cityId = $("#city_id").val();
    let city = $("#city").val();

    if(city == "" || city == undefined){
        Swal.fire({
            type: 'info',
            title: 'Required',
            text: 'City is required',
        });
    }else{
        try {
            $.ajax({
                type    : "PUT",
                url     : "/backend/cities/update",
                async   : true,
                dataType: "JSON",
                data    : {
                    kota_id     : cityId,
                    nama_kota   : city
                },
                success:function(data){
                    if(data.response == "success"){
                        $("#editModalCity").modal("hide");
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(function () {
                            window.location.href = "cities";
                        });
                    }else{
                        Swal.fire({
                            type: 'error',
                            title: 'Failed',
                            text: data.message,
                        });
                    }
                },
                error:function(data){
                    console.log(data);
                }
            })
        }
        catch (e){
            console.log(e);
        }
    }
});

//Hapus Kota
$("#example1").on("click", ".btnRemoveCity", function(){
    let varId = $(this).data("city_id");


    try {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.value){
                $.ajax({
                    type      : "DELETE",
                    url       : "/backend/cities/delete",
                    async     : true,
                    dataType  : "JSON",
                    data      : {
                        id      : varId
                    },
                    success:function(data){
                        // console.log(data);
                        $("#editModalCity").modal("hide")
                        if(data.response == "success"){
                            Swal.fire({
                                type: 'success',
                                title: 'Success',
                                text: data.message,
                            }).then(function () {
                                window.location.href = "cities";
                            });
                        }
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
            }
        });
    } catch (e) {
        console.log(e);
    } finally {

    }
});
