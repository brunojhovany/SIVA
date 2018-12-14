'use strict';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $("#range_historic").on("submit", function(ev) {
        ev.preventDefault();
        let semana = $("#week_select").val();
        let year = new Date();
        year = year.getFullYear();
        window.location.href = `/monitoreo/eliminar/${year}${semana}`;
    });
});
function deleteregistros(idregistro) {
    Swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: `/admin/monitoreo/eliminar/${idregistro}`
            })
                .done(response => {
                    Swal(
                        'Eliminado',
                        `Registro eliminado con éxito`,
                        'success'
                    )
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 2000);
                })
                .catch(error => {
                    M.toast({ html: "Algo salio mal", classes: "rounded red" });
                });
        }
    });
}
document.addEventListener('DOMContentLoaded', () => {
    document.onchange = ev => {
        document.getElementById('submitMod').style.display = '';
        M.AutoInit();
    }
}, false);