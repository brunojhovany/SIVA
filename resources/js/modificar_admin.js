'use strict';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('#formmodificar').on('submit',function(ev){
        ev.preventDefault();
        let semana = $('#semanainput').val();
        let year = new Date();
        year = year.getFullYear();
        $('.renderspace').html(loader.Indeterminate);
        window.location.href = `/monitoreo/modificar/${year}${semana}`;
    });
    $("#modificarregistroForm").on("submit", function (ev) {
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
                    html: `${data.message}`,
                    classes: 'rounded teal lighten-2'
                });
                document.getElementById('submitmorethanoncebtn').style.display = "none";
                setTimeout(() => {
                    window.location.reload(true)
                }, 2000);
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
let loader = {
 Indeterminate: `<div style="margin-top:10%;" class="container progress">
      <div class="indeterminate"></div>
  </div>`
}

document.addEventListener('DOMContentLoaded',()=>{
    document.onchange = ev => {
        document.getElementById('submitMod').style.display = '';
        M.AutoInit();
    }
},false);