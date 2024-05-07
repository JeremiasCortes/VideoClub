<div class="container mt-4 mb-5">
    <!-- Agregar un botón original para abrir un nuevo modal -->
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#NuevoModal">
            ¡Nuevo Modal!
        </button>
    </div>

    <!-- Modal Nueva Pelicula -->
    <div class="modal fade" id="NuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-info text-light text-uppercase fw-bolder">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAñadir" class="row g-3 needs-validation">
                        <div class="col-md-2">
                            <label for="idAñadir" class="form-label ">ID</label>
                            <input type="text" class="form-control bg-dark" id="idAñadir" name="id" value="" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="nombreAñadir" class="form-label ">Nombre</label>
                            <input type="text" class="form-control bg-secondary" id="nombreAñadir" name="nombre" value=""
                                required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionAñadir" class="form-label">Dirección</label>
                            <input type="text" class="form-control bg-secondary" id="direccionAñadir" name="direccion" value=""
                                required>
                        </div>
                        <div class="col-md-12">
                            <label for="categoriaAñadir" class="form-label">Categoria</label>
                            <select class="form-select bg-secondary text-light" aria-label="Default select example">
                                <option selected disabled>Selecciona la categoria de la pelicula</option>
                                <?php foreach ($SQL_Categorias as $categoria): ?>
                                <option value="<?=$categoria->id_categoria;?>"><?=$categoria->nom_categoria;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcionAñadir" class="form-label">Descripción</label>
                            <textarea class="form-control bg-secondary" id="descripcionAñadir" rows="4" value=""
                                required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-primary">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla/Listado de peliculas -->
    <div class="table-responsive">
        <table class="table caption-top table-dark table-striped table-bordered align-middle datos-peliculas">
            <caption class="text-light">Datos de Peliculas</caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($SQL_Peliculas as $SQL_Pelicula) : ?>
                <tr id="<?=$SQL_Pelicula->id;?>">
                    <td scope="row fs-1"><?=$SQL_Pelicula->id;?></td>
                    <td scope="row"><?=$SQL_Pelicula->nom;?></td>
                    <td scope="row"><?=$SQL_Pelicula->direccion;?></td>
                    <td scope="row">
                        <span class="d-inline-block text-truncate" style="max-width: 250px;">
                            <?=$SQL_Pelicula->descripcion;?>
                        </span>
                    </td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-warning boton-modificar-pelicula" type="button"
                                data-id="<?=$SQL_Pelicula->id;?>" data-nom="<?=$SQL_Pelicula->nom;?>"
                                data-bs-toggle="modal" data-bs-target="#ModalModificar"><i class="bi bi-sliders">
                                    Modificar</i></button>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-danger eliminar" type="button"
                                data-id="<?=$SQL_Pelicula->id;?>" data-nom="<?=$SQL_Pelicula->nom;?>"
                                data-bs-toggle="modal" data-bs-target="#ModalEliminar"><i class="bi bi-trash3-fill">
                                    Eliminar</i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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

    <!-- Modal Realizado -->
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
            <div class="modal-content bg-info text-light text-uppercase fw-bolder">
                <div class="modal-header">
                    <h5 class="modal-title text-primary"><strong>Modificar datos de la Película</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formModificar" class="row g-3 needs-validation">
                        <div class="col-md-2">
                            <label for="idModificar" class="form-label">ID</label>
                            <input type="text" class="form-control bg-dark" id="idModificar" name="id" value="" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="nombreModificar" class="form-label">Nombre</label>
                            <input type="text" class="form-control bg-secondary" id="nombreModificar" name="nombre" value=""
                                required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionModificar" class="form-label">Dirección</label>
                            <input type="text" class="form-control bg-secondary" id="direccionModificar" name="direccion" value=""
                                required>
                        </div>
                        <div class="col-md-12">
                            <label for="categoriaModificar" class="form-label">Categoria</label>
                            <select class="form-select bg-secondary text-light modal-modificar-select" aria-label="Default select example">
                                <?php foreach ($SQL_Categorias as $categoria): ?>
                                <option value="<?=$categoria->id_categoria;?>"><?=$categoria->nom_categoria;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcionModificar" class="form-label">Descripción</label>
                            <textarea class="form-control bg-secondary" id="descripcionModificar" rows="4" value=""
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
    $('table.datos-peliculas').on('click', '.eliminar', function() {
        let idDataPelicula = $(this).data('id');
        let nombreDataPelicula = $(this).data('nom');
        $('.pelicula-a-eliminar').html(nombreDataPelicula);
        $('#EliminarPelicula').on('click', function() {
            $('#<?=$SQL_Pelicula->id;?>').remove();
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
    $('table.datos-peliculas').on('click', '.boton-modificar-pelicula', function() {
        // Obtener el ID de la película desde los atributos data
        var idPelicula = $(this).data('id');
        // Realizar solicitud AJAX para obtener detalles de la película
        $.ajax({
            url: '<?= base_url('PeliculaController/getPeliculaById_and_Categoria/') ?>' + idPelicula,
            type: 'POST',
            dataType: 'json', // Esperamos recibir datos en formato JSON
            success: function(response) {
                // Rellenar los campos del formulario con los detalles de la película
                $('#idModificar').val(response.id);
                $('#nombreModificar').val(response.nom);
                $('#direccionModificar').val(response.direccion);
                $('#descripcionModificar').val(response.descripcion);
                $('.modal-modificar-select > option[value='+(response.id_categoria)+']').attr("selected",true);

                // Mostrar la modal de modificar
                $('#ModalModificar').modal('show');
            }
        });
    });

    $('#formModificar').submit(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto 
        // Obtener los datos del formulario
        let id = $('#idModificar').val();
        let nombre = $('#nombreModificar').val();
        let direccion = $('#direccionModificar').val();
        let descripcion = $('#descripcionModificar').val();
        let id_categoria = $('.modal-modificar-select').val();

        // Enviar los datos por AJAX al controlador
        $.ajax({
            url: '<?= base_url('PeliculaController/modificarPelicula/') ?>', // Reemplazar con la URL del controlador
            type: 'POST',
            data: {
                id: id,
                nombre: nombre,
                direccion: direccion,
                descripcion: descripcion,
                id_categoria: id_categoria
            },
            success: function(response) {
                // Actualizar la fila modificada en la tabla
                $('#' + id).find('td:eq(1)').text(nombre);
                $('#' + id).find('td:eq(2)').text(direccion);
                // Actualizar el texto dentro del span de descripción
                $('#' + id).find('td:eq(3)').find('span').text(descripcion);

                // Cerrar el modal
                $('#ModalModificar').modal('toggle');
                $('#ModalEliminado').modal('show');
            }
        });
    });
})
</script>