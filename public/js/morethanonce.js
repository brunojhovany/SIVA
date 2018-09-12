'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function () {
    $(document).change(function (ev) {
        document.getElementById('submitmorethanoncebtn').style.display = "";
    });
    $("#morethanonceform").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/capturarpuntos/masdeunavez/save",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function success(data) {
                M.toast({
                    html: '' + data,
                    classes: 'rounded success'
                });
                document.getElementById('submitmorethanoncebtn').style.display = "none";
            },
            error: function error(data) {
                M.toast({
                    html: 'Algo sali\xF3 mal \uD83E\uDD37\uD83D\uDC7E',
                    classes: 'rounded red'
                });
            }
        });
    });
});
