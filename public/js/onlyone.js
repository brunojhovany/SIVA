'use strict';

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function (ev) {
    $("#onlyOneForm").on("submit", function (ev) {
        ev.preventDefault();
        $.ajax({
            type: "POST",
            url: "/capturarpuntos/api/unavez",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            timeout: 60000,
            success: function success(data) {
                swal('Buen trabajo!', '' + data.message, 'success');
                document.getElementById("onlyOneForm").reset();
            },
            error: function (_error) {
                function error(_x) {
                    return _error.apply(this, arguments);
                }

                error.toString = function () {
                    return _error.toString();
                };

                return error;
            }(function (data) {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: 'Something went wrong! ' + error.responseJSON.message
                });
            })
        });
    });

    $("#MunicipioSelect").on('change', function (ev) {
        $.ajax({
            method: "post",
            url: "/capturarpuntos/api/localidad",
            dateType: "json",
            data: {
                idmunicipio: $("#MunicipioSelect").val()
            },
            success: function success(data) {
                $("#LocalidadSelect").html(data.Localidades);
                $("#LocalidadSelect").formSelect();
                $("#DireccionSelect").val('0');
                $("#DireccionSelect").formSelect();
            }
        }).catch(function (error) {
            swal({
                type: "error",
                title: "Oops...",
                text: 'Something went wrong! ' + error.responseJSON.message
            });
        });
    });
    $("#LocalidadSelect").on('change', function (ev) {
        $.ajax({
            method: "post",
            url: "/capturarpuntos/api/direccion",
            dateType: "json",
            data: {
                idlocalidades: $("#LocalidadSelect").val()
            },
            success: function success(data) {
                $("#DireccionSelect").html(data.Direcciones);
                $("#DireccionSelect").formSelect();
            }
        }).catch(function (error) {
            swal({
                type: "error",
                title: "Oops...",
                text: 'Something went wrong! ' + error.responseJSON.message
            });
        });
    });

    $(".datepicker").datepicker({
        options: {
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
            weekdaysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"]
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

    $(".timepicker").timepicker({ twelveHour: false });
});

$.ajax({
    method: 'get',
    credentials: "same-origin",
    url: "/capturarpuntos/api/municipio",
    success: function success(data) {
        $("#MunicipioSelect").html(data.Municipios);
        $("#MunicipioSelect").formSelect();
    }
}).catch(function (error) {
    swal({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong! ' + error.responseJSON.message
    });
});
