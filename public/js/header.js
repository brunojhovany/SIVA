M.AutoInit();
$(document).ready(function (ev) {
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({
        autoTrigger: true,
        inDuration: 500,
        outDuration: 225,
        constrainWidth: true, // Does not change width of dropdown to that of the activator
        hover: false, // Activate on hover
        gutter: 85, // Spacing from edge
        coverTrigger: false, // Displays dropdown below the button
        alignment: 'right', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    });
});
$(document).ready(function (ev) {});

function getView(url) {
    $.ajax({
        type: 'GET',
        url: '' + url,
        timeout: 60000,
        success: function success(data) {
            $('#rendercontent').html(data.html);
        },
        error: function error(data) {
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            });
        }
    });
}
