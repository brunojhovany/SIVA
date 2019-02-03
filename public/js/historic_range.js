$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
  }
});
$(document).ready(function (ev) {
  $("#range_historic").on("submit", function (ev) {
    ev.preventDefault();
    var week = "".concat(document.getElementById("week_select").value);
    week.length < 2 ? week = "0" + week : '';
    $.ajax({
      type: "POST",
      url: "/consulta/historial",
      dateType: "json",
      data: {
        yearwithweek: $("#year_select").val() + week
      },
      success: function success(data) {
        $("#renderspace").html(data.html);
      },
      error: function error(_error) {
        swal({
          type: "error",
          title: "Oops...",
          text: "Something went wrong! ".concat(_error.responseJSON.message)
        });
      }
    });
  });
});
