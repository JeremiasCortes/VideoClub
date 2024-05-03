<div class="container mt-4 mb-5">
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
                            <button class="btn btn-outline-warning" type="button" data-id="<?=$SQL_Pelicula->id;?>"
                                data-nom="<?=$SQL_Pelicula->nom;?>" data-bs-toggle="modal"
                                data-bs-target="#ModalModificar"><i class="bi bi-sliders"> Modificar</i></button>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-outline-danger" id="EliminarPelicula">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pelicula Eliminada (Realizado) -->
    <div class="modal fade" id="ModalEliminado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-success-subtle">
                <div class="modal-header ">
                    <h5 class="modal-title text-success"><strong>Completado</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="alert alert-success" role="alert" id="alerta">
                        Eliminado con éxito la pelicula <strong class="pelicula-a-eliminar"></strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pelicula Eliminada (Realizado) -->
    <div class="modal fade" id="ModalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header ">
                    <h5 class="modal-title"><strong>Modificar Pelicuka</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Cancelar</button>
                    <button type="button" class="btn btn-outline-warning" id="EliminarPelicula">Modificar</button>
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

    $('#ModalModificar').modal('show');
})
</script>