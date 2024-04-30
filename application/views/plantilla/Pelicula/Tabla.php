<div class="container-fluid mt-4 mb-5">
    <div class="table-responsive">
        <table class="table caption-top table-primary table-striped table-bordered align-middle">
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
                <tr>
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
                            <button class="btn btn-outline-warning" type="button" data-id="<?=$SQL_Pelicula->id;?>"><i
                                    class="bi bi-sliders"> Modificar</i></button>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="d-grid gap-1">
                            <button class="btn btn-outline-danger" type="button" data-id="<?=$SQL_Pelicula->id;?>"><i
                                    class="bi bi-trash3-fill"> Eliminar</i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>