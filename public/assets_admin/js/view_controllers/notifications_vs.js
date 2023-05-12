
$('#read_all').on("click", function () {

    var notyf = new Notyf({
        duration: 2000,
        position: {
            x: 'right',
            y: 'top',
        },
        types: [
            {
                type: 'warning',
                background: 'orange',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'warning'
                }
            },
            {
                type: 'error',
                duration: 3000,
                dismissible: true
            },
            {
                type: 'success',
                duration: 3000,
                dismissible: true
            }
        ]
    });


    const response = axios.get('/admin/notificaciones/leer-todas', {
    }).then(res => {

        location.reload();


    }).catch((err) => {
        notyf.error('Ocurrio un error, intentalo de nuevo');

    });

});



function getCookie(name) {
    let cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}