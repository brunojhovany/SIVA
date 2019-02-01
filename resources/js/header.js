M.AutoInit();
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(ev => {
    $(".sidenav").sidenav();
    $(".modal").modal();
    $(".dropdown-trigger").dropdown({
        autoTrigger: true,
        inDuration: 500,
        outDuration: 225,
        constrainWidth: true, // Does not change width of dropdown to that of the activator
        hover: false, // Activate on hover
        gutter: 85, // Spacing from edge
        coverTrigger: false, // Displays dropdown below the button
        alignment: "right", // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    });
    $("#notificationsbuttons").click(ev => {
        ev.preventDefault();
        notifications();
    });

    $("#notificationsbtnsidebar").click(ev => {
        ev.preventDefault();
        notifications();
    });
});

function notifications() {
    $.ajax({
        url: "/admin/configuracion/api/alerts",
        type: "get"
    })
        .then(data => {
            swal(`${data.message}`, `${data.messageServer}`, "info");
        })
        .fail(error => {
            swal("Error!", `${error.statusText}`, "error");
        });
}
function modificarFunc() {
    swal({
        title: "¿Que semana desea modificar?",
        input: "text",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: "Buscar registros",
        cancelButtonText: "Cancelar",
        showLoaderOnConfirm: true,
        preConfirm: semana => {
            let date = new Date();
            window.location.href = `/monitoreo/modificar/${date.getFullYear()}${semana}`;
        },
        allowOutsideClick: () => !swal.isLoading()
    });
}
function eliminarFunc() {
    swal({
        title: "¿De que semana desea eliminar algún registro?",
        input: "text",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: "Buscar registros",
        cancelButtonText: "Cancelar",
        showLoaderOnConfirm: true,
        preConfirm: semana => {
            let date = new Date();
            window.location.href = `/monitoreo/eliminar/${date.getFullYear()}${semana}`;
        },
        allowOutsideClick: () => !swal.isLoading()
    });
}

function resultadosBacteriologicos(){
    Swal({
        title: "Resultados bacteriológicos",
        input: "select",
        allowOutsideClick: () => !swal.isLoading(),
        inputOptions: {
            1: "Enero",
            2: "Febrero",
            3: "Marzo",
            4: "Abril",
            5: "Mayo",
            6: "Junio",
            7: "Julio",
            8: "Agosto",
            9: "Septiembre",
            10: "Octubre",
            11: "Noviembre",
            12: "Diciembre"
        },
        inputPlaceholder: "Seleccione un mes",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        inputValidator: value => {
            return new Promise(resolve => {
                resolve();
            });
        }
    })
        .then(value => {
            window.location.href = `/monitoreo/resultadosbacteriologicos/${value.value}`;
        })
        .catch(error => console.log(error));
}
