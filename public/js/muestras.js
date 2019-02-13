"use strict";

$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
  }
});
document.querySelector("#month").addEventListener("submit", function (e) {
  e.preventDefault();
  var month = document.querySelector("#moth_select").value;
  month ? window.location.href = "/monitoreo/resultadosbacteriologicos/".concat(month) : M.toast({
    html: "seleccione un mes por favor",
    classes: "rounded red"
  });
}, false);
$(document).ready(function () {
  $(document).change(function (ev) {
    document.getElementById("submitResultsBactBtn").style.display = "";
  });
  $("#formTableResultadosBact").on("submit", function (ev) {
    ev.preventDefault();
    $.ajax({
      type: "POST",
      url: "/monitoreo/resultadosbacteriologicos/",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      timeout: 60000,
      success: function success(data) {
        M.toast({
          html: "".concat(data.message),
          classes: "rounded teal lighten-2"
        });
        document.getElementById("submitResultsBactBtn").style.display = "none";
        setTimeout(function () {
          window.location.reload(true);
        }, 2000);
      },
      error: function error(data) {
        M.toast({
          html: "Algo sali\xF3 mal \uD83E\uDD37",
          classes: "rounded red"
        });
      }
    });
  });
});
