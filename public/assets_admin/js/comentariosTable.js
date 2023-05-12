let mesAnyo = ['Enero', 'Febrero', 'Marzo', 'abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
let diaSemana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];




if ($('#tabla-comentarios')[0]) {
    createTable();
}

function createTable() {

    $('#tabla-comentarios').removeAttr('width').DataTable({
        responsive: true,
        ajax: {
            url: './comentarios-show',
            dataSrc: '',
            beforeSend: function () {
                $("#loading").show();
            },
            complete: function () {
                $('#loading').hide();
            }

        },
        columns: [
            {
                data: 'agencia_id'
            },
            {
                "data": 'agencia[0].nombre',
                "render": function (data, type, row, meta) {
                    var text = "";
                    var agencia_id = 0;
                    if (data) {
                        if (data.length > 30) {
                            text = data.substring(0, 30) + "...";
                        } else {
                            text = data;
                        }
                    }
                    if (row.agencia[0] != null) {

                        if (row.agencia[0].id != null) {
                            agencia_id = row.agencia[0].id;
                        } else {
                            agencia_id = 0;
                        }
                    } else {
                        agencia_id = 0;
                    }
                    return "<a target='_blank' title='" + data + "' href='/agencia/" + agencia_id + "' >" + text + "</a>";
                }
            },
            {
                data: 'autor',
                "render": function (data, type, row, meta) {
                    var text = "";
                    if (row.autor) {
                        if (data.length > 20) {
                            text = data.substring(0, 20) + "...";
                        } else {
                            text = data;
                        }
                    } else if (row.user_id != null) {
                        text = row.user[0].name + " " + row.user[0].apellido_p;
                    }

                    return text;
                }
            },
            {
                "data": 'text',
                "render": function (data) {
                    var text = "";
                    if (data) {
                        if (data.length > 30) {
                            text = data.substring(0, 30) + "...";
                        } else {
                            text = data;
                        }
                    }
                    return "<a style='curso:pointer;' title='" + data + "'  >" + text + " </a>";
                }
            },
            {
                data: 'time',
                "render": function (data, type, row, meta) {
                    date = "";
                    if (row.created_at) {
                        date = moment(row.created_at).format('YYYY MMM DD');
                    } else {
                        date = moment.unix(parseInt(row.time)).format('YYYY MMM DD');
                    }
                    return date;
                }
            },
            {
                "data": "id",
                "render": function (data, type, row, meta) {
                    autor = "";
                    if (row.autor) {
                        if (data.length > 20) {
                            autor = data.substring(0, 20) + "...";
                        } else {
                            autor = data;
                        }
                        autor_id = 0;
                    } else if (row.user_id != null) {
                        autor = row.user[0].name + " " + row.user[0].apellido_p;
                        autor_id = row.user[0].id;
                    }
                    var btn_answer = "";
                    if (parseInt(row.answers_count) == 0) {
                        btn_answer = '<a class="btn btn-sm bg-primary-light" data-toggle="modal" data-target="#modalComentario" data-whatever="' + row.text + '" data-autorid="' + autor_id + '" data-autor="' + row.autor + '" data-id="' + row.id + '" onclick="comment(this)" > <i class="fas fa-reply" ></i> Responder</a >';
                    } else {
                        btn_answer = '<span class="badge badge-success badge-pill mr-3 ml-1">Respondido</span>';
                    }

                    btn_delete = '<a class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#modalDeleteComentario" data-id="' + row.id + '" data-autor="' + autor + '"  onclick="commentDelete(this)" > <i class="fas fa-trash" ></i></a >';

                    return btn_answer + '<a class="btn btn-sm bg-info-light" target="_black" href="/admin/comentarios/' + row.id + '" > <i class="fas fa-eye" ></i> Ver</a> ' + btn_delete;

                }
            },
        ],
        "order": [[4, "desc"]],
    });
}