$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function (ev) {
    $('#admonGuidesTable').on('click', '#deleteGuide', function (ev) {
        ev.preventDefault();
        var currentRow = $(this).closest("tr");
        var idfile = currentRow.find("td:eq(0)").text();
        var filename = currentRow.find("td:eq(3)").text();
        deleteGuide(idfile, filename);
    });
});
function deleteGuide(idfile, filename) {
    $.ajax({
        type: "delete",
        url: '/guides/delete/' + idfile + '/' + filename
    }).done(function (data) {
        swal('Buen trabajo!', '' + data.message, 'El archivo se ha borrado correctamente');
        setTimeout("location.reload()", 2000);
    }).fail(function (err) {
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'No se ha podido borrar el archivo!'
        });
    });
}
