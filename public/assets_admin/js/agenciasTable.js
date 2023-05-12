if ($('#tabla-index-agency')[0]) {
    createTable();
}

function createTable() {
    $('#tabla-index-agency').DataTable({
        responsive: true,
        ajax: {
            url: '/admin/agencias-show',
            dataSrc: '',
            beforeSend: function () {
                $("#loading").show();
            },
            complete: function () {
                $('#loading').hide();
            }
        },
        dom: '<"row" <"col-sm-4" l> <"col-sm-4 offset-4" <"pull-right" f><"float-right" B> > >r<"mt-30" t><"row mt-30" <"col-sm-5" i> <"col-sm-7" p> >',
        buttons: [
            {
                extend: 'excel',
                className: 'btn btn-sm btn-success ',
                exportOptions: {
                    columns: ':not(:last-child)',
                },
                init: function (api, node, config) {
                    $(node).removeClass('dt-button');
                }
            },
        ],
        columns: [

            { data: 'id' },
            { data: 'nombre' },
            { data: 'marca[0].nombre' },
            { data: 'ciudad' },
            { data: 'estado' },
            { data: 'rating' },
            {
                "data": "id",
                "render": function (data) {

                    return `  <button id="btn-delete" class="btn btn-sm btn-primary text-white"
                        data-toggle="modal" data-id='${data}' data-target="#exampleModal">
                        <i class="delete-dash fas fa-trash-alt"></i>

                    </button>
                    <a
                        class="btn btn-sm btn-warning text-white"
                        href="./agencias/editar${data}" 

                    >
                        <i class="fas fa-edit"></i>
                    </a>`;

                }
            },
        ],


    });
}

if ($('#table-asign-user')[0]) {
    createTableAsing($("#user_id").val());
}

function createTableAsing(user_id) {
    $('#table-asign-user').DataTable({
        responsive: true,
        ajax: {
            url: '/admin/agencias-show',
            dataSrc: ''
        },
        columns: [

            { data: 'id' },
            { data: 'nombre' },
            { data: 'marca[0].nombre' },
            { data: 'ciudad' },
            { data: 'estado' },
            { data: 'rating' },
            {
                "data": "id",
                "render": function (data) {
                    return `
                    <a
                        class="btn btn-sm btn-primary text-white"
                        href="/admin/usuarios/asignar-agencia/`+ user_id + `/${data}"

                    >
                        <i class="fas fa-plus"></i> Asignar
                    </a>`;

                }
            },
        ],


    });
}
