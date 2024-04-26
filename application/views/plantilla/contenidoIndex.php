<!-- <div class="container" style="width: 100%;">
    <div class="row row-cols-1 row-cols-md-4 g-5 mt-3 bg-dark">
        <?php foreach ($SQL_Peliculas as $SQL_Pelicula):?>
        <div class="col ">
            <div class="card bg-info mb-3" style="">
                <img src="<?= base_url('resources/img/') . $SQL_Pelicula->caratula;?>" class="card-img-top"
                    alt="Porta de la pelicula <?= $SQL_Pelicula->nom; ?>" width="100px" height="330" type="button"
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
</div> -->

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach($SQL_Peliculas as $SQL_Pelicula) : ?>
        <div class="col">
            <div class="card">
                <img class="bd-placeholder-img card-img-top" width="100%" height="210" role="img" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $SQL_Pelicula->id; ?>" focusable="false"
                    src="<?= base_url('resources/img/') . $SQL_Pelicula->caratula;?>">
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
</div>