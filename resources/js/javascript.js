// FUNCIONA | NO TOCAR
function toggleModal(nameModal) {
	let stringToggle = "toggle";
	$("#Modal" + nameModal).modal(stringToggle);
}

// FUNCIONA | NO TOCAR
function eliminar_mediante_AJAX(datas, urlPeticionAJAX, modal) {
	modal("Eliminar");
	$(".pelicula-a-eliminar").html(datas.name);
	$("#ModalEliminar").on("click", "#btn-eliminar", function () {
		$("#columna-con-id-" + datas.id).remove();
        $('.tarjeta-' + datas.id).remove();

		$.ajax({
			url: urlPeticionAJAX,
			type: "POST",
			success: function () {
				modal("Eliminar");
				modal("Realizado");
				
			},
		});
	});
}

// FUNCIONA | NO TOCAR
function modificar_mediante_AJAX(
	datas,
	{ urlPeticionAJAX, urlEnvioAJAX },
	modal
) {
	limpiarInputs(datas);

	$(".title-modal").text("Modificar");
	$(".enviar").text("Modificar");
	modal("Modificar");
	$.ajax({
		url: urlPeticionAJAX,
		type: "POST",
		dataType: "json",
		success: function (response) {
			console.log(response);
			datas.campoID.val(response.id);
			datas.campoNom.val(response.nom);
			if (datas.campoDireccion) {
				datas.campoDireccion.val(response.direccion);
				datas.campoDescripcion.val(response.descripcion);
				$(
					datas.selectValue + " > option[value=" + response.id_categoria + "]"
				).attr("selected", true);
			}
		},
	});

	$(".enviar").on("click", function () {
		$.ajax({
			url: urlEnvioAJAX,
			type: "POST",
			data: {
				id: datas.campoID.val(),
				nombre: datas.campoNom.val(),
				direccion: datas.campoDireccion ? datas.campoDireccion.val() : null,
				descripcion: datas.campoDescripcion
					? datas.campoDescripcion.val()
					: null,
				categoria_id: datas.selectValue
					? $(datas.selectValue + " option:selected").val()
					: null,
			},
			success: function () {
				modal("Modificar");
				modal("Realizado");
				$("#columna-con-id-" + datas.campoID.val())
					.find("td:eq(1)")
					.text(datas.campoNom.val());
				if (datas.campoDireccion) {
					$("#columna-con-id-" + datas.campoID.val())
						.find("td:eq(2)")
						.text(datas.campoDireccion.val());
					$("#columna-con-id-" + datas.campoID.val())
						.find("td:eq(3)")
						.find("span")
						.text(datas.campoDescripcion.val());
				}
			},
		});
	});
}

// FUNCIONA | NO TOCAR
function añadir_mediante_AJAX(datas, urlPeticionAJAX, modal) {
	$(".title-modal").text("Añadir");
	$(".enviar").text("Añadir");
	limpiarInputs(datas);
	modal("Modificar");

	$(".enviar").on("click", function (e) {
		e.preventDefault();
		$.ajax({
			url: urlPeticionAJAX,
			type: "POST",
			data: {
				nombre: datas.campoNom.val(),
				direccion: (datas.campoDireccion) ? datas.campoDireccion.val() : null,
				descripcion: (datas.campoDescripcion) ? datas.campoDescripcion.val() : null,
				categoria_id: (datas.selectValue) ? $(datas.selectValue + " option:selected").val() : null,
			},
			success: function () {
				modal("Modificar");
				location.reload();
				modal("Realizado");
			},
		});
	});
}

function limpiarInputs(datas){
	datas.campoID.val("");
	datas.campoNom.val("");
	if (datas.campoDireccion) {
		datas.campoDireccion.val("");
		datas.campoDescripcion.val("");
		$(datas.selectValue + " option:first").prop("selected", true);
	}

}
