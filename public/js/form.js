function deleteGrid(param,param2){
		var arrNotif = {'success':'Sukses','error':'Terjadi Kesalahan','warning':'Peringatan'};
		swal({
            title: 'Anda yakin ingin menghapus ?',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes!',
            closeOnConfirm: true
        },
        function (isConfirm) {
        	if (isConfirm) {
				$.ajax({
					url		: param,
					type	: 'post',
	                data 	: {_method: 'delete', _token: param2},
					success : function(data){
						var d = JSON.parse(data);
						new PNotify({
							title: arrNotif[d.respond],
							text: d.text,
							type: d.respond,
							styling: 'bootstrap3'
						});
						$('table').DataTable().ajax.reload();
					}
				});
			}
		});
	}
