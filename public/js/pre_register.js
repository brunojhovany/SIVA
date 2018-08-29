'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function (ev) {

    $("#admonregisterform").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/admin/configuracion/api/admonregistersave",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function success(data) {
                swal("Buen trabajo!", '' + data.message, "success");
                document.getElementById("onlyOneForm").reset();
            },
            error: function error(data) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: 'Something went wrong! ' + data.responseJSON.message
                });
            }
        });
    });

    $("#MunicipioSelect").on('change', function (ev) {
        $.ajax({
            method: "post",
            url: "/capturarpuntos/api/localidad",
            dateType: "json",
            data: {
                idmunicipio: $("#MunicipioSelect").val()
            },
            success: function success(data) {
                $("#LocalidadSelect").html(data.Localidades);
                $("#LocalidadSelect").formSelect();
            }
        }).catch(function (error) {
            swal({
                type: "error",
                title: "Oops...",
                text: 'Something went wrong! ' + error.responseJSON.message
            });
        });
    });
});

$.ajax({
    method: 'get',
    credentials: "same-origin",
    url: "/capturarpuntos/api/municipio",
    success: function success(data) {
        $("#MunicipioSelect").html(data.Municipios);
        $("#MunicipioSelect").formSelect();
    }
}).catch(function (error) {
    swal({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! ' + error.responseJSON.message
    });
});
