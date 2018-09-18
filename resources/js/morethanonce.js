'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(()=>{
    $(".timepicker").timepicker({ twelveHour:false });
    $(".datepicker").datepicker({
        options:{
            months: [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            monthsShort: [
                "Ene",
                "Feb",
                "Mar",
                "Abr",
                "May",
                "Jun",
                "Jul",
                "Ago",
                "Sep",
                "Oct",
                "Nov",
                "Dic"
            ],
            weekdays: [
                "Domingo",
                "Lunes",
                "Martes",
                "Miércoles",
                "Jueves",
                "Viernes",
                "Sábado"
            ],
            weekdaysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        },
        selectMonths: true,
        selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
        today: "Hoy",
        clear: "Limpiar",
        close: "Ok",
        labelMonthNext: "Siguiente mes",
        labelMonthPrev: "Mes anterior",
        labelMonthSelect: "Selecciona un mes",
        labelYearSelect: "Selecciona un año",
        format: "yyyy-mm-dd"
    }); 
    $(document).change(ev=>{
         document.getElementById('submitmorethanoncebtn').style.display="";
    });
    $("#morethanonceform").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/capturarpuntos/masdeunavez/save",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function (data) {
                M.toast({
                    html: `${data.message}`,
                    classes: 'rounded teal lighten-2'
                });
                document.getElementById('submitmorethanoncebtn').style.display = "none";
                setTimeout(() => {
                    window.location.reload(true)
                }, 2000);
            },
            error: function (data) {
                 M.toast({
                     html: `Algo salió mal 🤷👾`,
                     classes: 'rounded red'
                 });
            }
        });
    });



});