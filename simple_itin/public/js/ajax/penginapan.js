//Hapus Penginapan
$("#example1").on("click", ".btnRemovePenginapan", function(){
    let varId = $(this).data("penginapan_id");

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
                    url       : "/backend/inn/delete",
                    async     : true,
                    dataType  : "JSON",
                    data      : {
                        penginapan_id      : varId
                    },
                    success:function(data){
                        // console.log(data);

                        if(data.response == "success"){
                            Swal.fire({
                                type: 'success',
                                title: 'Success',
                                text: data.message,
                            }).then(function () {
                                window.location.href = "inn";
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
