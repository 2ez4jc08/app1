$(document).ready(function(){
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    var cururi = window.location.pathname;
    var url = cururi.split("/");
    var nav = url[2]; 
    $('.nav-link:contains('+nav+')').addClass('active');

    $('#attendance-table').DataTable({
        "order": [],
        "columnDefs": [
            {
                "targets": [ 0,1 ],
                "visible": false,
                "searchable": false
            }
        ]
    });

    $('#employee-table').DataTable({
        "order": [],
        "columnDefs": [
            {
                "targets": [ 0,1,2,9 ],
                "visible": false,
                "searchable": false
            }
        ]
    });

    $('#leave-table').DataTable({
        "order": [],
        "columnDefs": [
            {
                "targets": [0,1,4,6],
                "visible": false,
                "searchable": false
            }
        ]
    });

    $('#submittedleave-table').DataTable({
        "order": [],
        "columnDefs": [
            {
                "targets": [0,2,6,9],
                "visible": false,
                "searchable": false
            }
        ]
    });

});