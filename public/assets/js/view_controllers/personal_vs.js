

$('#filter').on('change', function () {
    var s = "";
    if (window.location.search.toString().indexOf('?') != -1) {
        s = "&";
    } else {
        s = "?";
    }
    window.location.href = window.location + s + 'agencia=' + $(this).val();
});


