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
		$.ajax({
			url: urlPeticionAJAX,
			type: "POST",
			success: function () {
				toggleModal("Eliminar");
				toggleModal("Realizado");
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
	$(".title-modal").text("Modificar");
	modal("Modificar");
	$.ajax({
		url: urlPeticionAJAX,
		type: "POST",
		dataType: "json",
		success: function (response) {
			datas.campoID.val(response.id);
			datas.campoNom.val(response.nom);
			datas.campoDireccion.val(response.direccion);
			datas.campoDescripcion.val(response.descripcion);
			$(
				datas.selectValue + " > option[value=" + response.id_categoria + "]"
			).attr("selected", true);
		},
	});
	$(".enviar").on("click", function () {
		$.ajax({
			url: urlEnvioAJAX,
			type: "POST",
			data: {
				id: datas.campoID.val(),
				nombre: datas.campoNom.val(),
				direccion: datas.campoDireccion.val(),
				descripcion: datas.campoDescripcion.val(),
				categoria_id: $(datas.selectValue + " option:selected").val(),
			},
			success: function () {
				modal("Modificar");
				modal("Realizado");
				$("#columna-con-id-" + datas.campoID.val())
					.find("td:eq(1)")
					.text(datas.campoNom.val());
				$("#columna-con-id-" + datas.campoID.val())
					.find("td:eq(2)")
					.text(datas.campoDireccion.val());
				$("#columna-con-id-" + datas.campoID.val())
					.find("td:eq(3)")
					.find("span")
					.text(datas.campoDescripcion.val());
			},
		});
	});
}

// FUNCIONA | NO TOCAR
function añadir_mediante_AJAX(urlPeticionAJAX, modal) {
	modal("Anadir");
	$("#formAñadir").submit(function (e) {
		e.preventDefault();
		let valueOfCampos = {
			Nombre: $("#nombreAñadir").val(),
			Direccion: $("#direccionAñadir").val(),
			Descripcion: $("#descripcionAñadir").val(),
			Categoria: $(".modal-anadir-select option:selected").val(),
		};
		$.ajax({
			url: urlPeticionAJAX,
			type: "POST",
			data: {
				nom: valueOfCampos.Nombre,
				direccion: valueOfCampos.Direccion,
				descripcion: valueOfCampos.Descripcion,
				categoria: valueOfCampos.Categoria,
			},
			success: function () {
				modal("Anadir");
				location.reload();
				modal("Realizado");
			},
		});
	});
}