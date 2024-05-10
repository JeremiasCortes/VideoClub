function toggleModal(nameModal){
	let stringToggle = 'toggle';
	$('#Modal'+nameModal).modal(stringToggle);
}

function eliminar_mediante_AJAX(datas, urlPeticionAJAX, modal){
	modal('Eliminar');
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

function modificar_mediante_AJAX(datas, {urlPeticionAJAX, urlEnvioAJAX}, modal){
	$('.title-modal').text('Modificar');
	modal('Modificar');
	$.ajax({
		url: (urlPeticionAJAX),
		type: 'POST',
		dataType: 'json',
		success: function(response){
			datas.campoID.val(response.id);
			datas.campoNom.val(response.nom);
			datas.campoDireccion.val(response.direccion);
			datas.campoDescripcion.val(response.descripcion);
			$(datas.selectValue + ' > option[value=' + (response.id_categoria) + ']').attr("selected", true);
		}
	});

	$('#formModificar').submit(function(){
		$.ajax({
			url: urlEnvioAJAX,
			type: 'POST',
			data: {
				id: datas.campoID.val(),
				nom: datas.campoNom.val(),
				direccion: datas.campoDireccion.val(),
				descripcion: datas.campoDescripcion.val(),
				categoria_id: $(datas.selectValue).val(),
			},
			success: function(response){
				// $('#columna-con-id-' + datas.campoID).find('td:eq(1)').text(
				// 	datas.campoNom.val()
				// );
				// $('#columna-con-id-' + datas.campoID).find('td:eq(2)').text(
				// 	datas.campoDireccion.val()
				// );
				// $('#columna-con-id-' + datas.campoID).find('td:eq(3)').find('span')
				// .text(datas.campoDescripcion.val());

				modal('Modificar');
				modal('Realizado');

				// datas.campoID.val('');
				// datas.campoNom.val('');
				// datas.campoDireccion.val('');
				// datas.campoDescripcion.val('');
				// datas.selectValue.val('0');
			}
		});
	})
}

function añadir_mediante_AJAX(datas, urlPeticionAJAX, modal){

}