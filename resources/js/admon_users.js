'use strict';
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(ev =>{
    $("#modal1").modal({ dismissible:false});
    $("#tableUsrAdmon").on("click", "#editUserBtn", function(ev) {
        let currow = $(this).closest("tr");
        let idUser = currow.find("td:eq(0)").text();
        let level = currow.find("td:eq(3)").text();
        editUSR(idUser,level);
    });
    $("#tableUsrAdmon").on("click", "#editUserBtn", function (ev) {
        let currow = $(this).closest("tr");
        let idUser = currow.find("td:eq(0)").text();
        deleteUrs(idUser, level);
    });
});
function editUSR(idUser,level) {
    $.ajax({
        url: "/admin/configuracion/api/admonusers/getusertoedit",
        type: "post",
        dateType: "json",
        data: {
            usuario: idUser,
            level:level
        },
        success: function(data) {
            $("#modal1").html(data);
        },
        error: function(data) {
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
    });
}