$(document).ready(ev=>{
    
});

function getView(url) {
    $.ajax({
        type: 'GET',
        url: `${url}`,
        timeout: 60000,
        success: data => {
            $('#rendercontent').html(data.html);
        },
        error: data => {
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
    });
}