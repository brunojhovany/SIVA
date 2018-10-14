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
        $.ajax({
            method: 'GET',
            url: '/monitoreo/modificar/' + year + semana
        }).done(function (response) {
            $('.renderspace').html(response.html);
        }).catch(function (error) {
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong! ' + error.status + ' ' + error.statusText
            });
        });
    });
});

var loader = {
    Indeterminate: '<div style="margin-top:10%;" class="container progress">\n      <div class="indeterminate"></div>\n  </div>'
};
