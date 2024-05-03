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
                            <button class="btn btn-outline-warning" type="button" data-id="<?=$SQL_Pelicula->id;?>"
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

    $('#ModalEliminar')
})
</script>