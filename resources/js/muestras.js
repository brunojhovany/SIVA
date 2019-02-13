"use strict";
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
document.querySelector("#month").addEventListener(
    "submit",
    e => {
        e.preventDefault();
        let month = document.querySelector("#moth_select").value;
        month
            ? (window.location.href = `/monitoreo/resultadosbacteriologicos/${month}`)
            : M.toast({
                  html: "seleccione un mes por favor",
                  classes: "rounded red"
              });
    },
    false
);

$(document).ready(() => {
    $(document).change(ev => {
        document.getElementById("submitResultsBactBtn").style.display = "";
    });
    $("#formTableResultadosBact").on("submit", function(ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/monitoreo/resultadosbacteriologicos/",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function(data) {
                M.toast({
                    html: `${data.message}`,
                    classes: "rounded teal lighten-2"
                });
                document.getElementById("submitResultsBactBtn").style.display =
                    "none";
                setTimeout(() => {
                    window.location.reload(true);
                }, 2000);
            },
            error: function(data) {
                M.toast({
                    html: `Algo salió mal 🤷`,
                    classes: "rounded red"
                });
            }
        });
    });
});
