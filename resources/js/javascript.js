function modalShowEliminar(estado){
    $("#ModalEliminar").modal(estado);
}

function eliminar_mediante_AJAX(IdToDelete, nameToDelete, urlPeticionAJAX){
	showModal('show');
	$(".pelicula-a-eliminar").html(nameToDelete);
	$("#ModalEliminar").on("click", "#btn-eliminar", function () {
		$("#columna-con-id-" + IdToDelete).remove();
		$.ajax({
			url: urlPeticionAJAX,
			type: "POST",
			success: function () {
				modalEliminar();
				$("#ModalRealizado").modal("show");
			},
		});
	});
}
