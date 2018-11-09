'use strict';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#formmodificar').on('submit', function (ev) {
        ev.preventDefault();
        var semana = $('#semanainput').val();
        var year = new Date();
        year = year.getFullYear();
        $('.renderspace').html(loader.Indeterminate);
        window.location.href = '/monitoreo/eliminar/' + year + semana;
    });
    $("#modificarregistroForm").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/monitoreo/modificar/admin/habilitarreg",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function success(data) {
                M.toast({
                    html: '' + data.message,
                    classes: "rounded teal lighten-2"
                });
                document.getElementById("submitMod").style.display = "none";
                setTimeout(function () {
                    window.location.reload(true);
                }, 2000);
            },
            error: function error(data) {
                M.toast({
                    html: 'Algo sali\xF3 mal \uD83E\uDD37\uD83D\uDC7E',
                    classes: "rounded red"
                });
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    document.onchange = function (ev) {
        document.getElementById('submitMod').style.display = '';
        M.AutoInit();
    };
}, false);
