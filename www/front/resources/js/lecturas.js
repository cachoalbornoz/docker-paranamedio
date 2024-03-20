

// CONTROL DE LECTURAS CADA 5 SEG

const dataloggerInterval = setInterval(() => {
    render();
}, 5000);

function render() {
    var token = $('input[name=_token]').val();
    $.ajax({
        url: APP_URL + '/lecturas/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function (data) {
            $("#div-datalogger").html(data);
        }
    });
}

// CONTROL DE BOTONERA

$("#stop-lecturas").on("click", function () {
    $.ajax({
        url: APP_URL + "/lecturas/detener",
        type: 'GET',
        success: function (data) {
            alertify.notify("Deteniendo lecturas ...", 'error', 8, function () { });
            render();
        },
        error: function (error) {

        }
    });
});

$("#start-lecturas").on("click", function () {

    alertify.success("Activando lecturas ...", 'success', 5, function () { });

    $.ajax({
        url: APP_URL + "/lecturas/iniciar",
        type: 'GET',
        success: function (data) {
            render();
        },
        error: function (error) {
        }
    });
})

