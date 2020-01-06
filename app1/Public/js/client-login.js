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
            url: '/Home/Login/verifyLogin',
            method: 'post',
            data: toSubmit,
            dataType: 'json',
            success: function(data){
                if(data['status'] === 1){
                    location.href = "/Admin/Index"
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

    $('#btnuseradd').on('click',function(){
        console.log("test");
    });
});