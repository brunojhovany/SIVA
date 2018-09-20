$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(ev=>{
	$("#range_historic").on("submit", function(ev) {
        ev.preventDefault();
        $.ajax({
            type: 'POST',
            url: "/consulta/historial",
            dateType: "json",
            data: {
                year_select: $("#year_select").val(),
                week_select: $("#week_select").val()
            },
            success: function(data){
                $('#renderspace').html(data);
            },
            error: function(error) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: `Something went wrong! ${
                        error.responseJSON.message
                        }`
                });
            }
        });
    });
});