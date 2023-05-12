
$(document).ready(function () {
    $('.filter-agency').select2();
});



var table = $('#tabla-comentarios').DataTable();

function Busqueda() {

    const value = $('#select2--container').attr("title");
    const autor = $('#autor-search').val();
    table.search(value.trim() + ' ' + autor).draw();


}
