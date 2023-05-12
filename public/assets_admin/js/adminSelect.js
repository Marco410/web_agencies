
// Optener el nombre , marca , etc de la fila seleccionada

// let estado , marca , ciudad , estado;
let id;
let nombre;
let marcaName; 
let ciudadName;
let estadoName;
$('#tabla-index').on('click', '#btn-edit', function (event) {
    //Se limpian los option para que no se sobreescriban
    $('#marcas-agencias option').remove();
    $('#select-estados option').remove();

    //Se optienen los campos de la tabla
    id = $(this).parents('tr').find('td:nth-child(1)').text();
    nombre = $(this).parents('tr').find('td:nth-child(2)').text();
    marcaName = $(this).parents('tr').find('td:nth-child(3)').text();
    ciudadName = $(this).parents('tr').find('td:nth-child(4)').text();
    estadoName = $(this).parents('tr').find('td:nth-child(5)').text();

    // Se pone como valor el campo seleccionado de nombre en el input nombre
    const inputName = document.getElementById('name-agencia').value = nombre;


    // Se Agrega los option al select de marcas

    const inputMarca = $('#marcas-agencias');
    let showMarcas = getMarcas();

    showMarcas.map(marca => {

        if (marca.nombre == marcaName.trim()) {
            inputMarca.append(`<option value = ${marca.id} selected>${marca.nombre}</option>`);
        } else {
            inputMarca.append(`<option value = ${marca.id} >${marca.nombre}</option>`);
        }
    })

    // Obtener Estados

    const selectEstados = $('#select-estados');
    let showEstados = getEstados();
    showEstados.map(estado => {
   
        if (estado.estado == estadoName.trim()) {
            selectEstados.append(`<option value = ${estado.id} selected>${estado.estado}</option>`);
        } else {
            selectEstados.append(`<option value = ${estado.id} >${estado.estado}</option>`);
        }
    });
    // const inputMunicipio = document.getElementById('municipio-agencia').value = estado;
    getEstado();
}
);


//Obtener estados





//Mostrar agencias

function getMarcas() {
    let marcas;
    $.ajax({
        url: "./agencias/show-marcas",
        type: 'GET',
        async: false,
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            marcas = JSON.parse(response);


        },
        statusCode: {
            404: function () {
                alert('web not found');
            }
        },

    });
    return marcas;

}


$('#select-estados').on('change', function(){
    getEstado()
    // do your stuff here.
})



//Se optiene el id del estado seleccionado

function getEstado() {
    /* Para obtener el valor */
    let estado = document.getElementById("select-estados").value;
  
    getMunicipios(estado);

}



// Se hace una peticion al controlador para obtener los municipios de acuerdo al estado

function getMunicipios(estado) {
    $.ajax({
        url: "./agencias/show-municipios",
        type: 'GET',
        data: {
            estado: estado,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            showMunicipios(response);
        },
        statusCode: {
            404: function () {
                alert('web not found');
            }
        },

    });
}


// Mostrar municipios de acuerdo a sus estados

const municipio = $('#show-municipios');

function showMunicipios(municipios) {
    $('#show-municipios option').remove();

    let arrayMunicipios = JSON.parse(municipios);


    arrayMunicipios.map(item => {
        municipio.append(`<option>${item}</option>`);
    })

}


//Editar Guardar cambios

function guardarCambios() {

    console.log(id , nombre , marcaName , estadoName , ciudadName);
    $.ajax({
        url: "./agencias/edit",
        type: 'GET',
        data: {
            id : id,
            name : nombre,
            marca : marcaName,
            estado : estadoName,
            ciudad : ciudadName,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
             


        },
        statusCode: {
            404: function () {
                alert('web not found');
            }
        },

    });
}