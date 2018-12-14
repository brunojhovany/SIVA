'use strict';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $("#range_historic").on("submit", function (ev) {
        ev.preventDefault();
        var semana = $("#week_select").val();
        var year = new Date();
        year = year.getFullYear();
        window.location.href = '/monitoreo/eliminar/' + year + semana;
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
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "DELETE",
                url: '/admin/monitoreo/eliminar/' + idregistro
            }).done(function (response) {
                Swal('Eliminado', 'Registro eliminado con \xE9xito', 'success');
                setTimeout(function () {
                    window.location.reload(true);
                }, 2000);
            }).catch(function (error) {
                M.toast({ html: "Algo salio mal", classes: "rounded red" });
            });
        }
    });
}
document.addEventListener('DOMContentLoaded', function () {
    document.onchange = function (ev) {
        document.getElementById('submitMod').style.display = '';
        M.AutoInit();
    };
}, false);
