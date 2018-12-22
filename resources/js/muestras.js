'use strict';

document.querySelector("#month").addEventListener("submit", e => {
    e.preventDefault();
    let month = document.querySelector("#moth_select").value;
    month?
    window.location.href = `/monitoreo/resultadosbacteriologicos/${month}` :
    M.toast({
        html:'seleccione un mes por favor',
        classes:'rounded red'
    });
},false);