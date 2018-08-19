M.AutoInit();
$(document).ready(ev => {
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown(
        {
            autoTrigger: true,
            inDuration: 500,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: false, // Activate on hover
            gutter: 85, // Spacing from edge
            coverTrigger: false, // Displays dropdown below the button
            alignment: 'right', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        }
    );
});