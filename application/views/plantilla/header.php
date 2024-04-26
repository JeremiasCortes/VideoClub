<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" <?= base_url('resources/scss/mycustom.css') ?>">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<style>
.banner-image {
    background-image: url(<?= base_url('resources/img/banner.jpg');
    ?>);
    background-size: cover;
}
</style>
</head>


<body class="bg-info">
    <!-- ------ Navbar ----- -->
    <nav class="navbar bg-primary navbar-expand-lg fixed-top navbar-lightpy-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><i class="bi bi-disc-fill"> Érase una vez en un DVD</i></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#abou">Peliculas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ------ Fin Navbar ----- -->


    <!-- ------ Banner ----- -->
    <div class="container">
        <?php if (isset($banner)):?>
        <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center bg-info">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col bg-dark ">
                        <p class="text-light text-uppercase fs-5">Bienvenidos</p>
                        <h1 class="text-light text-uppercase">Érase una vez un DVD</h1>
                        <p class="text-light fs-6">Aquí encontrarás la mejor selección de películas, desde las más
                            populares
                            hasta las de ver en familia</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
    </div>
    <!-- ------ Fin Banner ----- -->
    </div>