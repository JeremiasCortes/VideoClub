<div class="container">

    <div class="row row-cols-1 row-cols-md-4 g-2 mt-3 bg-dark">
        <?php foreach ($SQL_Peliculas as $SQL_Pelicula):?>
        <div class="col ">
            <div class="card h-100 bg-info ">
                <img src="<?= base_url('resources/img/') . $SQL_Pelicula->caratula;?>" class="card-img-top"
                    alt="Porta de la pelicula <?= $SQL_Pelicula->nom; ?>" width="%" height="430" type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $SQL_Pelicula->id; ?>"
                    aria-expanded="false" aria-controls="collapseExample">
                <div class="collapse" id="collapseExample<?= $SQL_Pelicula->id; ?>">
                    <div class="card card-body bg-info">
                        <h5 class="card-title"><?php $SQL_Pelicula->nom; ?></h5>
                        <p class="card-text text-truncate"><?= $SQL_Pelicula->descripcion; ?></p>
                    </div>
                </div>
                <div class="card-footer bg-info">
                    <small class="text-body-secondary text-light"><?= $SQL_Pelicula->direccion; ?></small>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>