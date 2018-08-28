'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(ev=>{
    $("#MunicipioSelect").on('change', ev => {
        $.ajax({
            method: "post",
            url: "/capturarpuntos/api/localidad",
            dateType: "json",
            data: {
                idmunicipio: $("#MunicipioSelect").val()
            },
            success: data => {
                $("#LocalidadSelect").html(data.Localidades);
                $("#LocalidadSelect").formSelect();
            }
        }).catch(error => {
            swal({
                type: "error",
                title: "Oops...",
                text: `Something went wrong! ${
                    error.responseJSON.message
                    }`
            });
        });
    });
});

$.ajax({
    method: 'get',
    credentials: "same-origin",
    url: "/capturarpuntos/api/municipio",
    success: data => {
        $("#MunicipioSelect").html(data.Municipios);
        $("#MunicipioSelect").formSelect();
    }
}).catch(
    error => {
        swal({
            type: 'error',
            title: 'Oops...',
            text: `Something went wrong! ${error.responseJSON.message}`,
        })
    }
);