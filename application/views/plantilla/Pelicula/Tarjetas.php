<!-- Contenido de pelicula en Tarjetas 
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach($SQL_Peliculas as $SQL_Pelicula) : ?>
        <div class="col">
            <div class="card bg-dark">
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
</div> -->


<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach($SQL_Peliculas as $SQL_Pelicula) : ?>
        <div class="col">
            <div class="card bg-dark">
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
</div>