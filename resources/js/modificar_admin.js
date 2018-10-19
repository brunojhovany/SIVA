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
        $.ajax({
            method:'GET',
            url: `/monitoreo/modificar/${year}${semana}`,
        })
        .done(function (response) {
            $('.renderspace').html(response.html);
        })
        .catch(function (error) {
            swal({
                type: 'error',
                title: 'Oops...',
                text: `Something went wrong! ${error.status} ${error.statusText}`
            })
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