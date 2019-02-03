$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(ev=>{
	$("#range_historic").on("submit", function(ev) {
        ev.preventDefault();
        let week = `${document.getElementById("week_select").value}`
        week.length < 2? week = "0"+week : '';
        $.ajax({
            type: "POST",
            url: "/consulta/historial",
            dateType: "json",
            data: {
                yearwithweek: $("#year_select").val()+week
            },
            success: function(data) {
                $("#renderspace").html(data.html);
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