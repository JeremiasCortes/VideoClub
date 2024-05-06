<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach($SQL_Peliculas as $SQL_Pelicula) : ?>
        <div class="col">
            <div class="card bg-dark mt-5 tarjeta-<?=$SQL_Pelicula->id;?>">
                <img class="bd-placeholder-img card-img-top" width="100%" height="250" role="img" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $SQL_Pelicula->id; ?>"
                    focusable="false" src="<?= base_url('resources/img/') . $SQL_Pelicula->caratula_png;?>">
                <div class="collapse" id="collapseExample<?= $SQL_Pelicula->id; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $SQL_Pelicula->nom;?></h5>
                        <p class="card-text"><?= $SQL_Pelicula->descripcion; ?></p>
                    </div>
                    <div class="card-footer text-end bg-dark">

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-outline-warning boton-modificar-pelicula" type="button" data-id="<?=$SQL_Pelicula->id;?>"
                                data-nom="<?=$SQL_Pelicula->nom;?>"><i class="bi bi-sliders"> Modificar</i></button>
                            <button class="btn btn-outline-danger eliminar" type="button"
                                data-id="<?=$SQL_Pelicula->id;?>" data-nom="<?=$SQL_Pelicula->nom;?>"
                                data-bs-toggle="modal" data-bs-target="#ModalEliminar"><i class="bi bi-trash3-fill">
                                    Eliminar</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

    <!-- Modal Eliminar Pelicula (Por Confirmar) -->
    <div class="modal fade" id="ModalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-danger-subtle">
                <div class="modal-header ">
                    <h5 class="modal-title text-primary"><strong>¡Esta acción es irreversible!</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-danger" role="alert" id="alerta">
                        Seguro que deseas eliminar la pelicula <strong class="pelicula-a-eliminar"></strong>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-danger" id="EliminarPelicula">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (Realizado) -->
    <div class="modal fade" id="ModalEliminado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-success-subtle">
                <div class="modal-header ">
                    <h5 class="modal-title text-success"><strong>Completado</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-success" role="alert" id="">
                        Tarea hecha con éxito <strong class="pelicula-a-eliminar"></strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modificar Pelicula -->
    <div class="modal fade" id="ModalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Modificar datos de la Película</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formModificar" class="row g-3 needs-validation">
                        <div class="col-md-2">
                            <label for="idModificar" class="form-label">ID</label>
                            <input type="text" class="form-control" id="idModificar" name="id" value="" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="nombreModificar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreModificar" name="nombre" value=""
                                required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionModificar" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionModificar" name="direccion" value=""
                                required>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcionModificar" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcionModificar" rows="4" value=""
                                required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-primary">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
$(function() {
    $('.eliminar').on('click', '.eliminar', function(){
        let idDataPelicula = $(this).data('id');
        let nombreDataPelicula = $(this).data('nom');
        $('.pelicula-a-eliminar').html(nombreDataPelicula);
        $('#EliminarPelicula').on('click', function() {
            $('.tarjeta-'+idDataPelicula).remove();
            $.ajax({
                url: '<?=base_url('PeliculaController/eliminar/')?>' + idDataPelicula,
                type: 'POST',
                success: function() {
                    $('#ModalEliminar').modal('toggle');
                    $('#ModalEliminado').modal('show');
                }
            })
        });
    })
    
    // Capturar clic en el botón "Modificar"
    $('.boton-modificar-pelicula').on('click', function() {
        // Obtener el ID de la película desde los atributos data
        var idPelicula = $(this).data('id');
        // Realizar solicitud AJAX para obtener detalles de la película
        $.ajax({
            url: '<?= base_url('PeliculaController/getPeliculaById/') ?>' + idPelicula,
            type: 'POST',
            dataType: 'json', // Esperamos recibir datos en formato JSON
            success: function(response) {
                // Rellenar los campos del formulario con los detalles de la película
                $('#idModificar').val(response.id);
                $('#nombreModificar').val(response.nom);
                $('#direccionModificar').val(response.direccion);
                $('#descripcionModificar').val(response.descripcion);
                // Mostrar la modal de modificar
                $('#ModalModificar').modal('show');
            }
        });
    });

    // Capturar envío del formulario de modificación
    $('#formModificar').submit(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto 
        // Obtener los datos del formulario
        var id = $('#idModificar').val();
        var nombre = $('#nombreModificar').val();
        var direccion = $('#direccionModificar').val();
        var descripcion = $('#descripcionModificar').val();
        // Enviar los datos por AJAX al controlador
        $.ajax({
            url: '<?= base_url('PeliculaController/modificarPelicula/') ?>', // Reemplazar con la URL del controlador
            type: 'POST',
            data: {
                id: id,
                nombre: nombre,
                direccion: direccion,
                descripcion: descripcion
            },
            success: function(response) {
                // Actualizar el título y la descripción dentro de la tarjeta
                $('.tarjeta-'+id).find('.card-title').text(nombre);
                $('.tarjeta-'+id).find('.card-text').text(descripcion);

                // Cerrar el modal
                $('#ModalModificar').modal('toggle');
                $('#ModalEliminado').modal('show');
            }
        });
    });
})
</script>