'use strict';

$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
  }
});
$(document).ready(function (ev) {
  $("#modal1").modal({
    onCloseEnd: function onCloseEnd() {
      window.location.reload(true);
    }
  });
  $("#tableUsrAdmon").on("click", "#editUserBtn", function (ev) {
    var currow = $(this).closest("tr");
    var idUser = currow.find("td:eq(0)").text();
    editUSR(idUser);
  });
  $("#tableUsrAdmon").on("click", "#deleteUserBtn", function (ev) {
    ev.preventDefault();
    var currow = $(this).closest("tr");
    var idUser = currow.find("td:eq(0)").text();
    var userName = currow.find("td:eq(1)").text();
    swal({
      title: "Estaseguro que desea eliminar a ".concat(userName, "?"),
      text: "Esto afectara a los registros que dicho usuario participo!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.value) {
        deleteUsr(idUser);
      }
    });
  });
  $('#addUserBtn').on('click', function (ev) {
    $.ajax({
      url: "/admin/configuracion/admonusers/getformtonewusr",
      type: "get",
      success: function success(data) {
        $("#modal1").html(data);
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
    success: function success(data) {
      $("#modal1").html(data);
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

function deleteUsr(idUser) {
  $.ajax({
    url: "/admin/configuracion/api/admonusers/deleteuser",
    type: "post",
    dateType: "json",
    data: {
      idUser: idUser
    }
  }).done(function (data) {
    swal('Good job!', "".concat(data.message), 'success').then(function (result) {
      result.value ? window.location.reload(true) : '';
    });
  }).fail(function (error) {
    swal({
      type: 'error',
      title: 'Oops...',
      text: "".concat(error.statusText),
      footer: '<a href>Why do I have this issue?</a>'
    });
  });
}
