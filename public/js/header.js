M.AutoInit();
$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
  }
});
$(document).ready(function (ev) {
  $(".sidenav").sidenav();
  $(".modal").modal();
  $(".dropdown-trigger").dropdown({
    autoTrigger: true,
    inDuration: 500,
    outDuration: 225,
    constrainWidth: true,
    // Does not change width of dropdown to that of the activator
    hover: false,
    // Activate on hover
    gutter: 85,
    // Spacing from edge
    coverTrigger: false,
    // Displays dropdown below the button
    alignment: "right",
    // Displays dropdown with edge aligned to the left of button
    stopPropagation: false // Stops event propagation

  });
  $("#notificationsbuttons").click(function (ev) {
    ev.preventDefault();
    notifications();
  });
  $("#notificationsbtnsidebar").click(function (ev) {
    ev.preventDefault();
    notifications();
  });
});

function notifications() {
  $.ajax({
    url: "/admin/configuracion/api/alerts",
    type: "get"
  }).then(function (data) {
    swal("".concat(data.message), "".concat(data.messageServer), "info");
  }).fail(function (error) {
    swal("Error!", "".concat(error.statusText), "error");
  });
}

function modificarFunc() {
  swal({
    title: "¿Que semana desea modificar?",
    input: "text",
    inputAttributes: {
      autocapitalize: "off"
    },
    showCancelButton: true,
    confirmButtonText: "Buscar registros",
    cancelButtonText: "Cancelar",
    showLoaderOnConfirm: true,
    preConfirm: function preConfirm(semana) {
      var date = new Date();
      window.location.href = "/monitoreo/modificar/".concat(date.getFullYear()).concat(semana);
    },
    allowOutsideClick: function allowOutsideClick() {
      return !swal.isLoading();
    }
  });
}

function eliminarFunc() {
  swal({
    title: "¿De que semana desea eliminar algún registro?",
    input: "text",
    inputAttributes: {
      autocapitalize: "off"
    },
    showCancelButton: true,
    confirmButtonText: "Buscar registros",
    cancelButtonText: "Cancelar",
    showLoaderOnConfirm: true,
    preConfirm: function preConfirm(semana) {
      var date = new Date();
      window.location.href = "/monitoreo/eliminar/".concat(date.getFullYear()).concat(semana);
    },
    allowOutsideClick: function allowOutsideClick() {
      return !swal.isLoading();
    }
  });
}

function resultadosBacteriologicos() {
  Swal({
    title: "Resultados bacteriológicos",
    input: "select",
    allowOutsideClick: function allowOutsideClick() {
      return !swal.isLoading();
    },
    inputOptions: {
      1: "Enero",
      2: "Febrero",
      3: "Marzo",
      4: "Abril",
      5: "Mayo",
      6: "Junio",
      7: "Julio",
      8: "Agosto",
      9: "Septiembre",
      10: "Octubre",
      11: "Noviembre",
      12: "Diciembre"
    },
    inputPlaceholder: "Seleccione un mes",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    inputValidator: function inputValidator(value) {
      return new Promise(function (resolve) {
        resolve();
      });
    }
  }).then(function (value) {
    window.location.href = "/monitoreo/resultadosbacteriologicos/".concat(value.value);
  }).catch(function (error) {
    return console.log(error);
  });
}

$(document).ready(function (ev) {});

function getView(url) {
  $.ajax({
    type: 'GET',
    url: "".concat(url),
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
