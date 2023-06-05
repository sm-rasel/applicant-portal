function deleteApplicants(id){
    swal({
        title: 'Are You Sure !',
        text: "You won't Be able to revert this !",
        icon: 'warning',
        buttons: true,
        dangerMode: false
    }).then(function (e){
        if (e === true){
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "applicants/applicant-delete/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (result){
                    if (result.success == true){
                        toastr.success(result.message);
                        setTimeout(function (){
                            location.reload()
                        }, 500)
                    }else {
                        toastr.error(result.message);
                    }
                }
            });
        }else {
            e.dismiss;
        }
    },function (dismiss){
        return false;
    });
}

 // Slider Section End
