<div class="text-center mt-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAnadir">
        ¡Nueva Alta de Pelicula!
    </button>
    <button type="button" class="btn btn-primary" id="a">
        Testing
    </button>
</div>

<div class="container mt-4 mb-5 ">
    <div class="a">
        <div class="row row-cols-1 row-cols-md-4 g-4 contenedor-tarjetas mi-contenedor">
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
                                <button class="btn btn-outline-warning boton-modificar-pelicula" type="button"
                                    data-id="<?=$SQL_Pelicula->id;?>" data-nom="<?=$SQL_Pelicula->nom;?>"><i
                                        class="bi bi-sliders" data-bs-toggle="modal" data-bs-target="#ModalModificar"> Modificar</i></button>
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
                        <input type="text" class="form-control bg-secondary" id="nombreAñadir" name="nombre" value=""
                            required>
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
                            <option selected value='0' disabled>Selecciona la categoria de la pelicula</option>
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
                        <input type="text" class="form-control bg-dark" id="idModificar" name="id" value="" readonly>
                    </div>
                    <div class="col-md-5">
                        <label for="nombreModificar" class="form-label">Nombre</label>
                        <input type="text" class="form-control bg-secondary" id="nombreModificar" name="nombre" value=""
                            required>
                    </div>
                    <div class="col-md-5">
                        <label for="direccionModificar" class="form-label">Dirección</label>
                        <input type="text" class="form-control bg-secondary" id="direccionModificar" name="direccion"
                            value="" required>
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



<script>
    // Capturar clic en el botón "Modificar"
    $('.boton-modificar-pelicula').on('click', function() {
        // Obtener el ID de la película desde los atributos data
        var idPelicula = $(this).data('id');
        $('#idModificar').val('');
        $('#nombreModificar').val('');
        $('#direccionModificar').val('');
        $('#descripcionModificar').val('');
        $('.modal-modificar-select').val('0');


        // Realizar solicitud AJAX para obtener detalles de la película
        $.ajax({
            url: '<?= base_url('PeliculaController/getPeliculaById_and_Categoria/') ?>' +
                idPelicula,
            type: 'POST',
            dataType: 'json', // Esperamos recibir datos en formato JSON
            success: function(response) {
                // Mostrar la modal de modificar
                $('#ModalModificar').modal('show');
                
                // Rellenar los campos del formulario con los detalles de la película
                $('#idModificar').val(response.id);
                $('#nombreModificar').val(response.nom);
                $('#direccionModificar').val(response.direccion);
                $('#descripcionModificar').val(response.descripcion);
                $('.modal-modificar-select > option[value=' + (response.id_categoria) + ']')
                    .attr("selected", true);
                
                    console.log(response.id);
                    console.log(response.nom);
                    console.log(response.direccion);
                    console.log(response.descripcion);

                
            }
        });
    });
$(function() {
    // Capturar clic en el botón "Eliminar"
    $('.a').on('click', '.eliminar', function() {
        let idDataPelicula = $(this).data('id');
        let nombreDataPelicula = $(this).data('nom');
        $('.pelicula-a-eliminar').html(nombreDataPelicula);
        $('#EliminarPelicula').on('click', function() {
            $('.tarjeta-' + idDataPelicula).remove();
            $.ajax({
                url: '<?=base_url('PeliculaController/eliminar/')?>' + idDataPelicula,
                type: 'POST',
                success: function() {
                    $('#ModalEliminar').modal('toggle');
                    $('#ModalRealizado').modal('show');
                    $('.a').load(' div.contenedor-tarjetas');

                }
            })
        });
    })

    

    // Capturar envío del formulario de modificación
    $('#formModificar').submit(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto 
        // Obtener los datos del formulario
        var id = $('#idModificar').val();
        var nombre = $('#nombreModificar').val();
        var direccion = $('#direccionModificar').val();
        var descripcion = $('#descripcionModificar').val();
        let categoria_id = $('.modal-modificar-select').val();
        // Enviar los datos por AJAX al controlador
        $.ajax({
            url: '<?= base_url('PeliculaController/modificarPelicula/') ?>', // Reemplazar con la URL del controlador
            type: 'POST',
            data: {
                id: id,
                nombre: nombre,
                direccion: direccion,
                descripcion: descripcion,
                categoria_id: categoria_id
            },
            success: function(response) {
                // Actualizar el título y la descripción dentro de la tarjeta
                $('.tarjeta-' + id).find('.card-title').text(nombre);
                $('.tarjeta-' + id).find('.card-text').text(descripcion);
                // Cerrar el modal
                $('#ModalModificar').modal('toggle');
                $('#ModalRealizado').modal('show');
            }
        });
    });

    $('#formAñadir').submit(function(e) {
        e.preventDefault();
        let nombre = $('#nombreAñadir').val();
        let direccion = $('#direccionAñadir').val();
        let descripcion = $('#descripcionAñadir').val();
        let categoria_id = $('.modal-anadir-select').val();
        $('#nombreAñadir').val('');
        $('#direccionAñadir').val('');
        $('#descripcionAñadir').val('');
        $('.modal-anadir-select').val('0');
        console.log('El nombre es: ' + nombre);
        console.log('La direccion es: ' + direccion);
        console.log('La descripcion es: ' + descripcion);
        console.log('La categoria es: ' + categoria_id);

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
                $('#ModalAnadir').modal('toggle');
                $('#ModalRealizado').modal('show');
                $('.a').load(' div.contenedor-tarjetas');
            }
        });
    })

    $('#a').on('click', function() {
        $('.a').load(' div.contenedor-tarjetas');
    });
})
</script>