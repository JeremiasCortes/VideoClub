<div class="container">
    <?php if (isset($VerComoTarjeta)):?>
    <!-- Contenido de Pelicula como Tarjeta -->
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach($SQL_Peliculas as $SQL_Pelicula) : ?>
        <div class="col">
            <div class="card">
                <img class="bd-placeholder-img card-img-top" width="100%" height="250" role="img" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $SQL_Pelicula->id; ?>"
                    focusable="false" src="<?= base_url('resources/img/') . $SQL_Pelicula->caratula_png;?>">
                <div class="collapse" id="collapseExample<?= $SQL_Pelicula->id; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $SQL_Pelicula->nom;?></h5>
                        <p class="card-text"><?= $SQL_Pelicula->descripcion; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <!-- Fin del Contenido de Pelicula como Tarjeta -->
    <?php else:?>
    <!-- Contenido de Pelicula como Tabla -->
    <div class="contenedor bg-light">

        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-outline-info mt-5 mb-3" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal1">Nueva Película <i class="bi bi-window-plus"></i></button>
        </div>

        <div class="container text-center">
            <div class="row row-cols-3">
                <div class="col"></div>
                <div class="col">
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class=" table-responsive bg-light">


            <table class="table table-striped table-hover table-dark text-center align-middle">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['peliculaId']; ?></td>
                        <td><?= $row['peliculaNom']; ?></td>
                        <td><?= $row['peliculaDireccion']; ?></td>
                        <td><?= $row['categoriaNom']; ?></td>
                        <td><span class="d-inline-block text-truncate" style="max-width: 500px;">
                                <?php echo $row['peliculaDescripcion']; ?>
                            </span></td>
                        <td class="modificar" data-id="<?= $row['peliculaId']; ?>"
                            data-nom="<?= $row['peliculaNom']; ?>" data-direccion="<?= $row['peliculaDireccion']; ?>"
                            data-categoria="<?= $row['categoriaNom']; ?>" data-categoriaid="<?= $row['categoriaId']; ?>"
                            data-descripcion="<?= $row['peliculaDescripcion']; ?>">

                            <a href="#" class='btn btn-outline-primary modificar'>
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a class="eliminar btn btn-outline-primary"
                                href="peliculaEliminar.php?id=<?= $row['peliculaId']; ?>"><i
                                    class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else : ?>
                    No hay ningún cliente registrado.
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php include 'pie.php'; ?>

        <form action="peliculaModificar.php" method="post" id="formModificar">
            <input type="hidden" name="id">
            <input type="hidden" name="nom">
            <input type="hidden" name="direccion">
            <input type="hidden" name="categoria">
            <input type="hidden" name="categoriaid">
            <input type="hidden" name="descripcion">
        </form>

        <!-- Modal para alta de nueva película -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
            aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="alta">
                    <?php include 'peliculaAlta.php'; ?>
                </div>
            </div>
        </div>

        <!-- Modal para modificar película existente -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
            aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="modificar">
                    <?php include 'peliculaModificar.php'; ?>
                </div>
            </div>
        </div>

    </div>

    <?php endif;?>
</div>