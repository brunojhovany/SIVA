$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function (ev) {
    $("#range_historic").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/consulta/historial",
            dateType: "json",
            data: {
                yearwithweek: $("#year_select").val() + $("#week_select").val()
            },
            success: function success(data) {
                $("#renderspace").html(data.html);
            },
            error: function error(_error) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: "Something went wrong! " + _error.responseJSON.message
                });
            }
        });
    });
});
