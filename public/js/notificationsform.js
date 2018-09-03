'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function (ev) {
    $("#notificationsform").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/capturarpuntos/api/admon-notifications",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function success(data) {
                swal('Buen trabajo!', '' + data.message, 'success');
                document.getElementById("notificationsform").reset();
                location.reload();
            },
            error: function (_error) {
                function error(_x) {
                    return _error.apply(this, arguments);
                }

                error.toString = function () {
                    return _error.toString();
                };

                return error;
            }(function (data) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: 'El archivo no se ha podido subir! ' + error.responseJSON.message
                });
            })
        });
    });
});
