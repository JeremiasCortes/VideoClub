<div class="container mt-4 mb-5">
    <!-- Botón que abre el Modal de Anadir-->
    <?php $this->load->view('Modales/OpenAnadir'); ?>

    <!-- Tabla/Listado de peliculas -->
    <div class="table-responsive">
        <table class="table caption-top table-dark table-striped table-bordered align-middle tabla-con-el-contenido"
            id="tabla">
            <caption class="text-light">Datos de Peliculas</caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($SQL_Clientes as $SQL_Cliente) : ?>
                <tr id="columna-con-id-<?=$SQL_Cliente->id_cliente;?>">
                    <td scope="row fs-1"><?=$SQL_Cliente->id_cliente;?></td>
                    <td scope="row"><?=$SQL_Cliente->nom_cliente;?></td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-warning boton-modificar-pelicula" type="button"
                                data-id="<?=$SQL_Cliente->id_cliente;?>" data-nom="<?=$SQL_Cliente->nom_cliente;?>"><i
                                    class="bi bi-sliders">
                                    Modificar</i></button>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-danger eliminar" type="button"
                                data-id="<?=$SQL_Cliente->id_cliente;?>" data-nom="<?=$SQL_Cliente->nom_cliente;?>"><i
                                    class="bi bi-trash3-fill">
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