$(document).ready(function(){

    $('#fileimport').on('change',function(){
        var form_data = new FormData();
        var file_data = $('#fileimport').prop("files")[0];
        form_data.append('file', file_data);
        $.ajax({
            url: '/Admin/Attendance/import_attendance',
            method: 'post',
            data: form_data,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                showMsg(data.status, data.msg);
            },
            error: function(data){
            }
        });
    });

    function showMsg(status,msg){
        if(status === 1){
            Swal.fire({
                title: 'RESULT',
                text: msg,
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
                text: msg,
                icon: 'error',
                confirmButtonColor: '#2E3543',
                confirmButtonText: 'OK!'
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            });
        }
    }
    
    $('#datefrom').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#dateto').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    
    $('#username').select2({
        placeholder: "Select a user",
        allowClear: true
    });

    $('#department').on('change',function(){
        $('#userdropdown').empty();
        var dept = $(this).val();
        $.ajax({
            url: '/Admin/Attendance/userDropdown',
            method: 'post',
            data: { department: dept },
            dataType: 'json',
            success: function(data){
                if(data.status === 1){
                    var datalength = data.result.length;
                    $('#userdropdown').append(
                        '<li class="dropdown-item"><input type="checkbox" value="all" id="alluser">  ALL USERS</li>'
                    );
                    for(i = 0; i < datalength; i++){
                        $('#userdropdown').append(
                            '<li class="dropdown-item"><input type="checkbox" name="username" value="'+data.result[i]['EmployeeId']+'"> '+data.result[i]['FullName']+ ' ('+data.result[i]['Email']+')'+'</li>'
                        );
                    }
                }else{
                    $('#userdropdown').html('<li >NO USER</li>');
                }
            },
            error: function(){
                $('#userdropdown').html('<li >NO USER</li>');
            }
        });
    });

    $('#userdropdown').on('change','#alluser',function(){
        if(this.checked){
            $('#userdropdown input:checkbox').attr('checked',true);
        }else{
            $('#userdropdown input:checkbox').attr('checked',false);
        }
    });

    $('#printdtr-form').on('submit',function(e){
        e.preventDefault();
        
        var tmpuserarr = Array();
        var datefrom = $('#datefrom').val();
        var dateto  = $('#dateto').val();

        $('#printdtr-form input:checkbox[name=username]:checked').each(function(){
            tmpuserarr.push($(this).val());
        });

        $.ajax({
            url: '/Admin/Attendance/printDTR',
            method: 'post',
            data: {userids: tmpuserarr, datefrom : datefrom, dateto:dateto},
            dataType: 'json',
            success: function(data){
                console.log(data);
            },
            error: function(){

            }
        });
    });

});