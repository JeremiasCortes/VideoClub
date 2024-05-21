<title>Login & Registro</title>




<div class="container text-center">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            
        <div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>
        </div>
    </div>
</div>

<div class="bg-info d-flex justify-content-center align-items-center vh-100">
    <form>

    </form>
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <h1><i class="bi bi-person-circle"></i></h1>
        </div>
        <div class="text-center fs-1 fw-bold mytext-login-register">Iniciar Sesión</div>
        <div class="input-group mt-4">
            <div class="input-group-text bg-info">
                <i class="bi bi-person-circle"></i>
            </div>
            <input class="form-control bg-dark" type="text" placeholder="Nombre de usuario" />
        </div>
        <div class="input-group mt-1">
            <div class="input-group-text bg-info">

                <i class="bi bi-lock-fill"></i>
            </div>
            <input class="form-control bg-dark" type="password" placeholder="Contraseña" />
        </div>
        <div class="d-flex justify-content-around mt-3 login-modificar">
            <div class="d-flex align-items-center gap-1">
                <input class="form-check-input" type="checkbox" />
                <div class="pt-1">Recordármela</div>
            </div>
            <div class="pt-1">
                <a href="#" class="text-info fw-semibold fst-italic h6">¿Contraseña olvidada?</a>
            </div>
        </div>

        <a class="btn btn-dark text-white w-100 mt-4 fw-semibold shadow-sm">Iniciar Sesión</a>

        <div class="d-flex gap-1 justify-content-center mt-1 a">
            <div>¿No tienes cuenta?</div>
            <a href="#" class="text-info fw-semibold fst-italic h6 registrate">Regístrate</a>
        </div>
    </div>
</div>

<script>
$(function() {
    $('a.registrate').on('click', function() {
        $('div.a').css("display", "none")
    })
})
</script>