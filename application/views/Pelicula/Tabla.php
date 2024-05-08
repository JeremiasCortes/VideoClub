<div class="container mt-4 mb-5">
    <!-- Agregar un botón original para abrir un nuevo modal -->
    <div class="text-center">
        <button type="button" class="btn btn-primary" id='button-ModalAnadir'>
            ¡Nueva Alta de Pelicula!
        </button>
        <button type="button" class="btn btn-primary" id="a">
            Testing
        </button>
    </div>

    <!-- Modal Nueva Pelicula -->
    <div class="modal fade" id="ModalAnadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control bg-secondary" id="nombreAñadir" name="nombre"
                                value="" required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionAñadir" class="form-label">Dirección</label>
                            <input type="text" class="form-control bg-secondary" id="direccionAñadir" name="direccion"
                                value="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="categoriaAñadir" class="form-label">Categoria</label>
                            <select class="form-select bg-secondary text-light modal-anadir-select"
                                aria-label="Default select example">
                                <option selected disabled value="0">Selecciona la categoria de la pelicula</option>
                                <?php foreach ($SQL_Categorias as $categoria): ?>
                                <option value="<?=$categoria->id_categoria;?>"><?=$categoria->nom_categoria;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formFile" class="form-label">Introduce portada de la Pelicula</label>
                            <input class="form-control bg-secondary text-light" type="file" id="formFile">
                        </div> -->
                        <div class="col-md-12">
                            <label for="descripcionAñadir" class="form-label">Descripción</label>
                            <textarea class="form-control bg-secondary" id="descripcionAñadir" rows="4" value=""
                                required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary cancelar"
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
        <table class="table caption-top table-dark table-striped table-bordered align-middle datos-peliculas"
            id="tabla">
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
                <tr id="columna-con-id-<?=$SQL_Pelicula->id;?>">
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
                                data-id="<?=$SQL_Pelicula->id;?>" data-nom="<?=$SQL_Pelicula->nom;?>"><i
                                    class="bi bi-sliders">
                                    Modificar</i></button>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-danger eliminar" type="button"
                                data-id="<?=$SQL_Pelicula->id;?>" data-nom="<?=$SQL_Pelicula->nom;?>"><i
                                    class="bi bi-trash3-fill">
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
    <div class="modal fade" id="ModalRealizado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control bg-dark" id="idModificar" name="id" value=""
                                readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="nombreModificar" class="form-label">Nombre</label>
                            <input type="text" class="form-control bg-secondary" id="nombreModificar" name="nombre"
                                value="" required>
                        </div>
                        <div class="col-md-5">
                            <label for="direccionModificar" class="form-label">Dirección</label>
                            <input type="text" class="form-control bg-secondary" id="direccionModificar"
                                name="direccion" value="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="categoriaModificar" class="form-label">Categoria</label>
                            <select class="form-select bg-secondary text-light modal-modificar-select"
                                aria-label="Default select example">
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
$(document).ready(function() {
    $('#button-ModalAnadir').on('click', function() {
        $('#ModalAnadir').modal('show');
    })

    // Capturar clic en el botón "Eliminar"
    $('table.datos-peliculas').on('click', '.eliminar', function() {
        $('#ModalEliminar').modal('show');
        let idDataPelicula = $(this).data('id');
        let nombreDataPelicula = $(this).data('nom');
        $('.pelicula-a-eliminar').html(nombreDataPelicula);
        $('#EliminarPelicula').on('click', function() {
            $('#columna-con-id-' + idDataPelicula).remove();
            $.ajax({
                url: '<?=base_url('PeliculaController/eliminar/')?>' + idDataPelicula,
                type: 'POST',
                success: function() {
                    $('#ModalEliminar').modal('hide');
                    mostrarTareaRealizada();
                }
            })
        });
    })

    // Capturar clic en el botón "Modificar"
    $('table.datos-peliculas').on('click', '.boton-modificar-pelicula', function() {
        $('#ModalModificar').modal('show');
        // Obtener el ID de la película desde los atributos data
        var idPelicula = $(this).data('id');
        // Realizar solicitud AJAX para obtener detalles de la película
        $.ajax({
            url: '<?= base_url('PeliculaController/getPeliculaById_and_Categoria/') ?>' +
                idPelicula,
            type: 'POST',
            dataType: 'json', // Esperamos recibir datos en formato JSON
            success: function(response) {
                // Rellenar los campos del formulario con los detalles de la película
                $('#idModificar').val(response.id);
                $('#nombreModificar').val(response.nom);
                $('#direccionModificar').val(response.direccion);
                $('#descripcionModificar').val(response.descripcion);
                $('.modal-modificar-select > option[value=' + (response.id_categoria) + ']')
                    .attr("selected", true);
            }
        });
    });

    // Modificar Pelicula
    $('#formModificar').submit(function(event) {
        // Obtener los datos del formulario
        let idPeliculaModificar = $('#idModificar').val();
        let nombrePeliculaModificar = $('#nombreModificar').val();
        let direccionPeliculaModificar = $('#direccionModificar').val();
        let descripcionPeliculaModificar = $('#descripcionModificar').val();
        let categoria_idPeliculaModificar = $('.modal-modificar-select').val();
        $('#idModificar').val('');
        $('#nombreModificar').val('');
        $('#direccionModificar').val('');
        $('#descripcionModificar').val('');
        $('.modal-modificar-select').val('0');

        // Enviar los datos por AJAX al controlador
        $.ajax({
            url: '<?= base_url('PeliculaController/modificarPelicula/') ?>', // Reemplazar con la URL del controlador
            type: 'POST',
            data: {
                id: idPeliculaModificar,
                nombre: nombrePeliculaModificar,
                direccion: direccionPeliculaModificar,
                descripcion: descripcionPeliculaModificar,
                categoria_id: categoria_idPeliculaModificar
            },
            success: function(response) {
                // Actualizar la fila modificada en la tabla
                $('#columna-con-id-' + idPeliculaModificar).find('td:eq(1)').text(
                    nombrePeliculaModificar);
                $('#columna-con-id-' + idPeliculaModificar).find('td:eq(2)').text(
                    direccionPeliculaModificar);
                // Actualizar el texto dentro del span de descripción
                $('#columna-con-id-' + idPeliculaModificar).find('td:eq(3)').find('span')
                    .text(descripcionPeliculaModificar);

                // Cerrar el modal
                $('#ModalModificar').modal('hide');
                mostrarTareaRealizada();

            }
        });
    });

    // Añadir peliculas
    $('#formAñadir').submit(function(e) {
        let nombre = $('#nombreAñadir').val();
        let direccion = $('#direccionAñadir').val();
        let descripcion = $('#descripcionAñadir').val();
        let categoria_id = $('.modal-anadir-select').val();
        $('#nombreAñadir').val('');
        $('#direccionAñadir').val('');
        $('#descripcionAñadir').val('');
        $('.modal-anadir-select').val('0');

        $.ajax({
            url: '<?= base_url('PeliculaController/addPelicula/') ?>',
            type: 'POST',
            data: {
                nom: nombre,
                direccion: direccion,
                descripcion: descripcion,
                categoria: categoria_id
            },
            success: function(response) {
                $('#ModalAnadir').modal('hide');
                $('.table-responsive').load(" .table-responsive");
                mostrarTareaRealizada();
            }
        });
    })

    function mostrarTareaRealizada() {
        $('#ModalRealizado').modal('show');
    }
})
</script>