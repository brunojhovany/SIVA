'use strict';
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(document).ready(ev =>{
    $("#modal1").modal({
        onCloseEnd:()=>{
            window.location.reload(true);
        }
    });
    $("#tableUsrAdmon").on("click", "#editUserBtn", function(ev) {
        let currow = $(this).closest("tr");
        let idUser = currow.find("td:eq(0)").text();
        editUSR(idUser);
    });
    $("#tableUsrAdmon").on("click", "#deleteUserBtn", function (ev) {
        ev.preventDefault();
        let currow = $(this).closest("tr");
        let idUser = currow.find("td:eq(0)").text();
        let userName = currow.find("td:eq(1)").text();
        swal({
            title: `Estaseguro que desea eliminar a ${userName}?`,
            text: "Esto afectara a los registros que dicho usuario participo!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                deleteUsr(idUser);
            }
        })
    });
    $('#addUserBtn').on('click',ev=>{
       $.ajax({
           url: "/admin/configuracion/admonusers/getformtonewusr",
           type: "get",
           success: function (data) {
               $("#modal1").html(data);
           },
           error: function (data) {
               swal({
                   type: 'error',
                   title: 'Oops...',
                   text: 'Something went wrong!',
                   footer: '<a href>Why do I have this issue?</a>'
               })
           }
       });
    });
    
});
function editUSR(idUser) {
    $.ajax({
        url: "/admin/configuracion/api/admonusers/getusertoedit",
        type: "post",
        dateType: "json",
        data: {
            usuario: idUser
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

function deleteUsr(idUser) {
    $.ajax({
        url: "/admin/configuracion/api/admonusers/deleteuser",
        type: "post",
        dateType: "json",
        data: {
            idUser: idUser,
        }
    }).done(data=>{
        swal(
            'Good job!',
            `${data.message}`,
            'success'
        ).then(result =>{
            result.value ? window.location.reload(true):'';
        })
    }).fail(error=>{
        swal({
            type: 'error',
            title: 'Oops...',
            text: `${error.statusText}`,
            footer: '<a href>Why do I have this issue?</a>'
        })
    })
}



