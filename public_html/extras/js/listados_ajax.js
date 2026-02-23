$(document).ready(function(){
    $.fn.dataTable.moment( 'DD-MM-YYYY' );

    if(urlpagina1 == 'admin' && urlpagina2 == 'users'){
        cargar_usuarios_sistema();
    }
    if(urlpagina1 == 'admin' && urlpagina2 == 'newsletter'){
        cargar_newslettter();
    }
});

function cargar_usuarios_sistema()
{
    $('#listado_usuarios_sistema').DataTable({
        "headers": {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        "processing": true,
        "serverSide": false,
        "stateSave": false,
        "order": [[ 1, "asc" ]],
        "ajax": {
            "url": baseurl+"admin/usuarios/listado/sistema",
        },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
        "language": {
            url: baseurl+"extras/js/Spanish.json",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
        },
        "responsive": false,
        "columns":[
            {data: 'checknomina', name: 'checknomina', class: 'text-center', orderable: false, searchable: false},
            {data: 'name'},
            {data: 'last_name'},
            {data: 'mothers_last_name'},
            {data: 'email'},
            {data: 'phone'},
            {
                data: "status",
                render: function ( status ) {
                    if(status == 0)
                        return '<span class="badge badge-danger">Deshabilitado</span>';
                    else
                        return '<span class="badge badge-success">Activo</span>'
                },
                defaultContent: ""
            },
            {data: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-left"}
        ],
        "createdRow": function( row, data, dataIndex ) {
            $(row).addClass('trfilausuarios');
        },
    });
}

function cargar_newslettter()
{
    $('#listado_newsletter').DataTable({
        "headers": {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        "processing": true,
        "serverSide": false,
        "stateSave": false,
        "order": [[ 1, "asc" ]],
        "ajax": {
            "url": baseurl+"admin/listado_newsletter",
        },
        "pagingType": "simple_numbers",
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
        "language": {
            url: baseurl+"extras/js/Spanish.json",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
        },
        "responsive": false,
        "columns":[
            {data: 'email',defaultContent: ""},
            {data: 'fechaformateado',defaultContent: ""},
        ],
    });
}
