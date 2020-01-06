$(document).ready(function(){

    $('#showpass').on('change',function(){
        if(this.checked){
            $('#firstpass').attr('type','text');
            $('#secondpass').attr('type','text');
        }else{
            $('#firstpass').attr('type','password');
            $('#secondpass').attr('type','password');
        }
    });
    
    $('#login-form').on('submit',function(e){
        var toSubmit = $(this).serialize();
        e.preventDefault();
        $('.login-error').empty();
        $('.login-error').append('<img style="height: 30px; width: 70px;" src="/img/loading.gif">');
        $('.btn-submit').attr('disabled', true);
        $.ajax({
            url: '/Admin/Login/verifyLogin',
            method: 'post',
            data: toSubmit,
            dataType: 'json',
            success: function(data){
                if(data['status'] === 1){
                    location.href = "/Admin/Dashboard"
                }else if(data['status'] === 0){
                    $('.login-error').empty();
                    $('.login-error').append('<small style="color:#ff0000">'+data['msg']+'</small>');
                    $('.btn-submit').removeAttr('disabled');
                }
            },
            error: function(){

            }
        });
    });

    // $('#reg-form').on('submit',function(e){
    //     var toSubmit = $(this).serialize();
    //     e.preventDefault();
    //     $('.reg-error').empty();
    //     $('.reg-error').append('<img style="height: 30px; width: 70px;" src="/img/loading.gif">');
    //     $('.btn-submit').attr('disabled', true);
    //     $.ajax({
    //         url: '/Home/Register/verifyRegister',
    //         method: 'post',
    //         data: toSubmit,
    //         dataType: 'json',
    //         success: function(data){
    //             if(data['status'] === 0){
    //                 $('.reg-error').empty();
    //                 $('.reg-error').append('<small style="color:#ff0000">'+data['msg']+'</small>');
    //                 $('.btn-submit').removeAttr('disabled');
    //             }
    //             if(data['status'] === 1){
    //                 $('#reg-form input').val('');
    //                 $('.reg-error').empty();
    //                 $('.reg-error').append('<small style="color:#016087">REGISTRATION SUCCESSFUL</small><br><small style="color:#016087">Check your email for verification.</small>');
    //                 $('.btn-submit').removeAttr('disabled');
    //             }
    //         },  
    //         error: function(data){
    //             $('.reg-error').empty();
    //             // $('.reg-error').append('<small style="color:#ff0000">SERVER ERROR, TRY AGAIN LATER</small>');
    //             $('.reg-error').append('<small style="color:#016087">REGISTRATION SUCCESSFUL</small><br><small style="color:#016087">Check your email for verification.</small>');
    //             $('.btn-submit').removeAttr('disabled');
    //         }
    //     });
    // });

});