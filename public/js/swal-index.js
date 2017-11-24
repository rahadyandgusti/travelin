function delete_data(el,token){
    swal({
        title: 'Are you sure to delete this data?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#DD6B55',
        showLoaderOnConfirm: true,
        preConfirm: function () {
            return new Promise(function (resolve) {
                $.ajax({
                    url: el.href,
                    type: 'post',
                    data: {_method: 'delete', _token: token},
                    success: function (result) {
                        if(result.respond) {
                            resolve();
                        } else {
                            if(result.message){
                                swal.showValidationError(
                                    result.message
                                );
                            } else {
                                swal.showValidationError(
                                    "Request fail to delete"
                                );
                            }
                        }
                    }
                });
            })
        },
        allowOutsideClick: false
    }).then(function (result) {
        if (result.value) {
            $('table').DataTable().ajax.reload();
            swal({
                type: 'success',
                title: 'Success!',
                html: 'Request has been deleted'
            })
        }
    })
}