$(document).ready(function(){

    $('#addemployeeid').on('keypress',function(){
        $(this).on('keyup',function(){
            $('#addusername').val($(this).val()).change();
        });
    });

    $('#editemail').on('keypress',function(){
        $(this).on('keyup',function(){
            $('#editusername').val($(this).val()).change();
        });
    });
    
    $('#adduser-form').on('submit',function(e){
        e.preventDefault();
        if(!$('#adddepartment').val()){
            $('#adddepartment').attr('style','border-color:red');
            return;
        }else{
            $('#adddepartment').removeAttr('style');
        }
        if(!$('#addstatus').val()){
            $('#addstatus').attr('style','border-color:red');
            return;
        }else{
            $('#addstatus').removeAttr('style');
        }

       
        

        var addform = $(this).serialize();
        $.ajax({
            url: '/Admin/Employee/addEmployee',
            method: 'post',
            data: addform,
            dataType: 'json',
            success: function(data){
                if(data['status'] === 1){
                    Swal.fire({
                        title: 'RESULT',
                        text: data['msg'],
                        icon: 'success',
                        confirmButtonColor: '#2E3543',
                        confirmButtonText: 'OK!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }else{
                    Swal.fire({
                        title: 'RESULT',
                        text: data['msg'],
                        icon: 'error',
                        confirmButtonColor: '#2E3543',
                        confirmButtonText: 'OK!'
                    });
                }
            },
            error: function(data){

            }
        });
    });

    $('#user-table .btneditmodal').on('click',function(){
        var currow = $(this).closest('tr');
        var data = $('#user-table').DataTable().row(currow).data();

        $('#edituserModal').children().find('#editid').val(data[0]).change();
        $('#edituserModal').children().find('#edituserid').val(data[1]).change();
        $('#edituserModal').children().find('#editdepartment').val(data[2]).change();
        $('#edituserModal').children().find('#editfullname').val(data[3]).change();
        $('#edituserModal').children().find('#editemail').val(data[5]).change();
        $('#edituserModal').children().find('#editcontactnumber').val(data[6]).change();
        $('#edituserModal').children().find('#editaddress').val(data[7]).change();
        $('#edituserModal').children().find('#editusername').val(data[5]).change();
        $('#edituserModal').children().find('#editstatus').val(data[8]).change();
        
    });

    $('#edituser-form').on('submit',function(e){
        e.preventDefault();
        var editform = $(this).serialize();
        $.ajax({
            url: '/Admin/Employee/editEmployee',
            method: 'post',
            data: editform,
            dataType: 'json',
            success: function(data){
                if(data['status'] == 1){
                    Swal.fire({
                        title: 'RESULT',
                        text: data['msg'],
                        icon: 'success',
                        confirmButtonColor: '#2E3543',
                        confirmButtonText: 'OK!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }else{
                    Swal.fire({
                        title: 'RESULT',
                        text: data['msg'],
                        icon: 'error',
                        confirmButtonColor: '#2E3543',
                        confirmButtonText: 'OK!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            },
            error: function(data){
                Swal.fire({
                    title: 'RESULT',
                    text: 'SERVER ERROR, INQUIRE TO ADMINISTRATOR',
                    icon: 'error',
                    confirmButtonColor: '#2E3543',
                    confirmButtonText: 'OK!'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                });
            }
        });
    });


    $('#user-table .btnresetmodal').on('click',function(){
        var currow = $(this).closest('tr');
        var data = $('#user-table').DataTable().row(currow).data();

        $('#resetpasswordModal').children().find('#resetuserid').val(data[1]).change();
        $('#resetpasswordModal').children().find('.resetname').text(data[3]);
        $('#resetpasswordModal').children().find('.resetusername').text(data[5]);

    });

    $('#resetpassword-form').on('submit',function(e){
        e.preventDefault();
        var resetdata = $(this).serialize();
        $.ajax({
            url: '/Admin/Employee/resetPassword',
            method: 'post',
            data: resetdata,
            dataType: 'json',
            success: function(data){
                if(data['status'] == 1){
                    Swal.fire({
                        title: 'RESULT',
                        text: data['msg'],
                        icon: 'success',
                        confirmButtonColor: '#2E3543',
                        confirmButtonText: 'OK!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }else{
                    Swal.fire({
                        title: 'RESULT',
                        text: data['msg'],
                        icon: 'error',
                        confirmButtonColor: '#2E3543',
                        confirmButtonText: 'OK!'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            },
            error: function(){

            }
        });
    });

    $('#checkpass').on('change',function(){
        if(this.checked){
            $('#resetnewpassword').attr('type','text');
        }else{
            $('#resetnewpassword').attr('type','password');
        }
    });

});