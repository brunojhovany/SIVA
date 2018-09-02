$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(ev=>{
    $('#admonGuidesTable').on('click','#deleteGuide',function(ev){
        ev.preventDefault();
        let currentRow = $(this).closest("tr");
        let idfile = currentRow.find("td:eq(0)").text();
        let filename = currentRow.find("td:eq(3)").text();
        deleteGuide(idfile,filename);
    });
});
function deleteGuide(idfile,filename){
    $.ajax({
        type:"delete",
        url:`/guides/delete/${idfile}/${filename}`
    }).done(data=>{
        swal(
            'Buen trabajo!',
            `${data.message}`,
            'El archivo se ha borrado correctamente'
          )
          setTimeout("location.reload()", 2000);
    }).fail(err=>{
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'No se ha podido borrar el archivo!',
          })
    });
}
