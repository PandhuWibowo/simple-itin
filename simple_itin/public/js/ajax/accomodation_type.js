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
