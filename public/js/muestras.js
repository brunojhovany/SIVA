'use strict';

document.querySelector("#month").addEventListener("submit", function (e) {
  e.preventDefault();
  var month = document.querySelector("#moth_select").value;
  month ? window.location.href = "/monitoreo/resultadosbacteriologicos/".concat(month) : M.toast({
    html: 'seleccione un mes por favor',
    classes: 'rounded red'
  });
}, false);
