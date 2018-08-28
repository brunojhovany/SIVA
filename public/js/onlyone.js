$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function (ev) {
    $('#onlyOneForm').on('submit', function (ev) {
        ev.preventDefault();
    });

    $("#MunicipioSelect").on('change', function (ev) {
        var idmunicipio = $("#MunicipioSelect").val();
        $.ajax({
            method: "post",
            url: "/capturarpuntos/api/localidad",
            dateType: "json",
            data: {
                idmunicipio: idmunicipio
            },
            success: function success(data) {
                $("#LocalidadSelect").html(data.Municipios);
                $("#LocalidadSelect").formSelect();
            }
        }).catch(function (error) {
            swal({
                type: "error",
                title: "Oops...",
                text: "Something went wrong! " + error.responseJSON.message
            });
        });
    });
    $("#LocalidadSelect").on('change', function (ev) {
        M.toast({ html: 'ok' });
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
        text: "Something went wrong! " + error.responseJSON.message
    });
});
