$(document).ready(function(){

    $('#login-form').on('submit',function(e){
        e.preventDefault();
        var loginform = $(this).serialize();
        $.ajax({
            method: 'post',
            url: 'Admin/Login/validate',
            data : loginform,
            dataType: 'json',
            success: function(check){
                console.log(check);
            },
            error: function(check){

            }
        });
    });
});