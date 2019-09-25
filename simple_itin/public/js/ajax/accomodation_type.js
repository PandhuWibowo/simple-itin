//Add Room
$("#btnAddRoom").on("click", function (e) {
    e.preventDefault();

    let roomType = $("#room_type").val();

    if(roomType == "" || roomType == undefined){
        Swal.fire({
            type: 'info',
            title: 'Required',
            text: 'Room is required',
        });
    }else{
        try {
            $.ajax({
                type    : "POST",
                url     : "/backend/accomodation-types/store",
                async   : true,
                dataType: "JSON",
                data    : {
                    nama_jenis_penginapan   : roomType
                },
                success:function(data){
                    if(data.response == "success"){
                        $("#addModalRoom").modal("hide");
                        $("#room_type").val("");
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(function () {
                            window.location.href = "accomodation-types";
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

//Modal Edit Room
$("#example1").on("click", ".btnEditRoom", function () {
    let roomId = $(this).data("jenis_penginapan_id");
    let room = $(this).data("nama_jenis_penginapan");

    $("#room_id").val(roomId);
    $("#edit_room_type").val(room);
    $("#editModalRoom").modal("show");
});

//Update Room
$("#btnUpdateRoom").on("click", function (e) {
    e.preventDefault();
    let roomId = $("#room_id").val();
    let roomType = $("#edit_room_type").val();

    if(roomType == "" || roomId == undefined){
        Swal.fire({
            type: 'info',
            title: 'Required',
            text: 'Room is required',
        });
    }else{
        try {
            $.ajax({
                type    : "PUT",
                url     : "/backend/accomodation-types/update",
                async   : true,
                dataType: "JSON",
                data    : {
                    jenis_penginapan_id     : roomId,
                    nama_jenis_penginapan   : roomType
                },
                success:function(data){
                    if(data.response == "success"){
                        $("#editModalRoom").modal("hide");
                        Swal.fire({
                            type: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(function () {
                            window.location.href = "accomodation-types";
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
$("#example1").on("click", ".btnRemoveRoom", function(){
    let varId = $(this).data("jenis_penginapan_id");


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
                    url       : "/backend/accomodation-types/delete",
                    async     : true,
                    dataType  : "JSON",
                    data      : {
                        id      : varId
                    },
                    success:function(data){
                        // console.log(data);
                        $("#editModalRoom").modal("hide")
                        if(data.response == "success"){
                            Swal.fire({
                                type: 'success',
                                title: 'Success',
                                text: data.message,
                            }).then(function () {
                                window.location.href = "accomodation-types";
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
