<title>Login & Registro</title>

<!-- <div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card p-2 rounded-5 box-shadow-login-register" style="width: 25rem;">
                    <div class="card-body">
                        <form method="post" autocomplete="off" action="<?= base_url('RegisterController/registerNow'); ?>" class="needs-validation" novalidate>
                            <div class="d-flex justify-content-center">
                                <h1><i class="bi bi-person-circle"></i></h1>
                            </div>
                            <div class="text-center fs-1 fw-bold mytext-login-register">Registrarse</div>
                            <div class="input-group mt-4">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <input class="form-control bg-dark" type="text" placeholder="Nombre de usuario" name='username' required/>
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="password" placeholder="Entreo 8 y 100 carácteres" name='password' required/>
                            </div>

                            <button class="btn btn-dark text-white w-100 mt-4 fw-semibold shadow-sm">Registrarse
                            </button>
                            <div class="d-flex gap-1 justify-content-center mt-1 a">
                                <div>¿No tienes cuenta?</div>
                                <a href="#" class="text-info fw-semibold fst-italic h6 registrate">Regístrate</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card p-2 rounded-5 box-shadow-login-register" style="width: 25rem;">
                    <div class="card-body">


                        <form method="post" autocomplete="off" class=" needs-validation"
                            action="<?= base_url('RegisterController/registerNow'); ?>" novalidate>

                            <div class="d-flex justify-content-center">
                                <h1><i class="bi bi-person-circle"></i></h1>
                            </div>
                            <div class="text-center fs-1 fw-bold mytext-login-register">Registrarse</div>
                            <div class="input-group mt-4">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <input class="form-control bg-dark" type="text" placeholder="Nombre de usuario"
                                    name='username' required />
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="password" placeholder="Contraseña"
                                    name='password' required />
                            </div>

                            <button class="btn btn-dark text-white w-100 mt-4 fw-semibold shadow-sm">Registrarse
                            </button>
                            <div class="d-flex gap-1 justify-content-center mt-1 a">
                                <div>¿No tienes cuenta?</div>
                                <a href="#" class="text-info fw-semibold fst-italic h6 registrate">Regístrate</a>
                            </div>



                            <div class="col-md">
                                <label for="validationCustom01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Nombre de Usuario</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="validationCustomUsername"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">City</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label">State</label>
                                <select class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom05" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="validationCustom05" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
</script>