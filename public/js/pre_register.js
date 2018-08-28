'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function (ev) {
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
