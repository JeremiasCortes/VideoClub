<title>Categorias | Admin</title>

<div class="container mt-4 mb-5">
    <!-- Botón que abre el Modal de Anadir-->
    <?php $this->load->view('Modales/OpenAnadir'); ?>

    <!-- Tabla/Listado de la consulta SQL -->
    <div class="table-responsive">
        <table class="table caption-top table-dark table-striped table-bordered align-middle tabla-con-el-contenido"
            id="tabla">
            <caption class="text-light">Datos de Categorias</caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($SQL_Categorias as $SQL_Categoria) : ?>
                <tr id="columna-con-id-<?=$SQL_Categoria->id_categoria;?>">
                    <td scope="row fs-1"><?=$SQL_Categoria->id_categoria;?></td>
                    <td scope="row"><?=$SQL_Categoria->nom_categoria;?></td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-warning boton-modificar-pelicula" type="button"
                                data-id="<?=$SQL_Categoria->id_categoria;?>"
                                data-nom="<?=$SQL_Categoria->nom_categoria;?>"><i class="bi bi-sliders">
                                    Modificar</i></button>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-danger eliminar" type="button"
                                data-id="<?=$SQL_Categoria->id_categoria;?>"
                                data-nom="<?=$SQL_Categoria->nom_categoria;?>"><i class="bi bi-trash3-fill">
                                    Eliminar</i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <!-- Modal Eliminar Pelicula -->
    <?php $this->load->view('Modales/Eliminar'); ?>


    <!-- Modal Realizado -->
    <?php $this->load->view('Modales/Realizado'); ?>


    <!-- Modificar Pelicula -->
    <?php $this->load->view('Modales/Modificar'); ?>
</div>

<script>
$(function() {
    // Capturar clic en el botón "Eliminar" de la tabla
    $('table.tabla-con-el-contenido').on('click', '.eliminar', function() {
        let datasForDelete = {
            id: $(this).data('id'),
            name: $(this).data('nom'),
        };
        // URL de la petición AJAX para borrar la película
        let urlPeticionAJAX = '<?=base_url('CategoriaController/eliminarByID/');?>' + datasForDelete.id;

        eliminar_mediante_AJAX(datasForDelete, urlPeticionAJAX, toggleModal);
    })

    // Capturar clic en el botón "Modificar" de la tabla
    $('table.tabla-con-el-contenido').on('click', '.boton-modificar-pelicula', function(e) {
        let datasAndCampos = {
            dataID: $(this).data('id'),
            campoID: $('#idInput'),
            campoNom: $('#nombreInput')
        }

        let urlAJAX = {
            urlPeticionAJAX: '<?=base_url('CategoriaController/getById/');?>' +
                datasAndCampos.dataID,
            urlEnvioAJAX: '<?= base_url('CategoriaController/modificarDatos/') ?>',
        }
        modificar_mediante_AJAX(datasAndCampos, urlAJAX, toggleModal);
    });

    // Añadir peliculas
    $('#button-ModalAnadir').on('click', function() {
        let datasAndCampos = {
            campoID: $('#idInput'),
            campoNom: $('#nombreInput'),
        };
        let urlEnvioAJAX = '<?= base_url('CategoriaController/addNew/') ?>';

        añadir_mediante_AJAX(datasAndCampos, urlEnvioAJAX, toggleModal);

    });
})
</script>