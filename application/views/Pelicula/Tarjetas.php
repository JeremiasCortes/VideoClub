<title>Peliculas | Admin</title>




<div class="container mt-4 mb-5 ">
<?php $this->load->view('Modales/OpenAnadir'); ?>

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
                                        class="bi bi-sliders" data-bs-toggle="modal" data-bs-target="#ModalModificar">
                                        Modificar</i></button>
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


<!-- Modal Eliminar Pelicula -->
<?php $this->load->view('Modales/Eliminar'); ?>


<!-- Modal Realizado -->
<?php $this->load->view('Modales/Realizado'); ?>


<!-- Modificar Pelicula -->
<?php $this->load->view('Modales/Modificar'); ?>


<script>
$(function() {
    // Capturar clic en el botón "Eliminar"
    $('.a').on('click', '.eliminar', function() {
        let datasForDelete = {
            id: $(this).data('id'),
            name: $(this).data('nom'),
        };
        // URL de la petición AJAX para borrar la película
        let urlPeticionAJAX = '<?=base_url('PeliculaController/eliminar/');?>' + datasForDelete.id;

        eliminar_mediante_AJAX(datasForDelete, urlPeticionAJAX, toggleModal);
    })

    // Capturar clic en el botón "Modificar"
    $('.boton-modificar-pelicula').on('click', function() {
        // Obtener el ID de la película desde los atributos data
        let datasAndCampos = {
            dataID: $(this).data('id'),
            campoID: $('#idInput'),
            campoNom: $('#nombreInput'),
            campoDireccion: $('#direccionInput'),
            campoDescripcion: $('#descripcionInput'),
            selectValue: '.modal-Input-select',
        }
        let urlAJAX = {
            urlPeticionAJAX: '<?=base_url('PeliculaController/getPeliculaById_and_Categoria/');?>' +
                datasAndCampos.dataID,
            urlEnvioAJAX: '<?= base_url('PeliculaController/modificarPelicula/') ?>',
        }

        modificar_mediante_AJAX(datasAndCampos, urlAJAX, toggleModal);

    });

    $('#button-ModalAnadir').on('click', function() {
        let datasAndCampos = {
            dataID: $(this).data('id'),
            campoID: $('#idInput'),
            campoNom: $('#nombreInput'),
            campoDireccion: $('#direccionInput'),
            campoDescripcion: $('#descripcionInput'),
            selectValue: '.modal-Input-select',
        };

        let urlEnvioAJAX = '<?= base_url('PeliculaController/addPelicula/') ?>';

        añadir_mediante_AJAX(datasAndCampos, urlEnvioAJAX, toggleModal);
    })


})
</script>