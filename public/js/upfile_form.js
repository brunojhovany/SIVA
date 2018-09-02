'use strict';

$.ajaxSetup({
		headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
		}
});
function redirectTo() {
		document.location = "/admin/configuracion/admonguides";
}

$(document).ready(function (ev) {
		$("#up_file").on("submit", function (ev) {
				ev.preventDefault();
				$.ajax({
						type: "POST",
						url: "/admin/configuracion/api/files-admon",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						timeout: 60000,
						success: function success(data) {
								swal('Buen trabajo!', '' + data.message, 'success');
								document.getElementById("up_file").reset();
								setTimeout("redirectTo()", 3000);
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
										text: 'Algo sali\xF3 mal! ' + error.responseJSON.message
								});
						})
				});
		});
});
