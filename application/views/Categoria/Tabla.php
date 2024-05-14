<div class="container mt-4 mb-5">
    <div class="text-center">
        <button type="button" class="btn btn-primary" id='button-ModalAnadir'>
            ¡Nueva Alta de Pelicula!
        </button>
    </div>

    <!-- Tabla/Listado de peliculas -->
    <div class="table-responsive">
        <table class="table caption-top table-dark table-striped table-bordered align-middle tabla-con-el-contenido"
            id="tabla">
            <caption class="text-light">Datos de Peliculas</caption>
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

    <!-- Modal Nueva Pelicula -->
    <?php $this->load->view('Modales/Anadir'); ?>

    <!-- Modal Eliminar Pelicula -->
    <?php $this->load->view('Modales/Eliminar'); ?>


    <!-- Modal Realizado -->
    <?php $this->load->view('Modales/Realizado'); ?>


    <!-- Modificar Pelicula -->
    <?php $this->load->view('Modales/Modificar'); ?>


</div>