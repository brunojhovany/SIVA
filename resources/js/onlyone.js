$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});


$(document).ready(ev=>{
    $('#onlyOneForm').on('submit',ev=>{
        ev.preventDefault();
    });
    
    $("#MunicipioSelect").on('change',ev=>{
        let idmunicipio = $("#MunicipioSelect").val();
        $.ajax({
            method: "post",
            url: "/capturarpuntos/api/localidad",
            dateType: "json",
            data: {
                idmunicipio:idmunicipio
            },
            success: data => {
                $("#LocalidadSelect").html(data.Municipios);
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
    $("#LocalidadSelect").on('change', ev => {
        M.toast({html:'ok'});
    });
});

$.ajax({
    method: 'get',
    credentials: "same-origin",
    url: "/capturarpuntos/api/municipio",
    success: data=>{
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
