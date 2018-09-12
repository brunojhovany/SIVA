'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(()=>{
    $(document).change(ev=>{
         document.getElementById('submitmorethanoncebtn').style.display="";
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
            success: function (data) {
                M.toast({
                    html: `${data}`,
                    classes: 'rounded success'
                });
                document.getElementById('submitmorethanoncebtn').style.display = "none";
            },
            error: function (data) {
                 M.toast({
                     html: `Algo salió mal 🤷👾`,
                     classes: 'rounded red'
                 });
            }
        });
    });



});