'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(ev=>{
    $("#notificationsform").on("submit", function(ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/capturarpuntos/api/admon-notifications",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function(data) {
                swal(
                    'Buen trabajo!',
                    `${data.message}`,
                    'success'
                )
                document.getElementById("notificationsform").reset();
            },
            error: function(data) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: `Something went wrong! ${
                        error.responseJSON.message
                        }`
                });
            }
        });
    });
});