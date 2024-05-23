<title>Login & Registro</title>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center align-items-center vh-100">

                <div class="card p-2 rounded-5 box-shadow-login-register bg-dark" style="width: 25rem;">
                    <div class="card-body">


                        <form method="post" autocomplete="off" class=" needs-validation" action="<?=base_url('')?>"
                            novalidate>

                            <div class="d-flex justify-content-center">
                                <h1><i class="bi bi-person-circle"></i></h1>
                            </div>
                            <div class="text-center fs-1 fw-bold mytext-login-register mb-4">Registrarse</div>

                            <!-- /**
                            * * Firstname Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <input class="form-control bg-dark" type="text" placeholder="Nombre" name='firstname'
                                    required />
                                <div class="invalid-feedback text-danger" id="firstnameInput">
                                    Introduzca su nombre.
                                </div>
                            </div>

                            <!-- /**
                            * * Lastname Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <input class="form-control bg-dark" type="text" placeholder="Apellido" name='lastname'
                                    required />
                                <div class="invalid-feedback text-danger" id="lastnameInput">
                                    Introduzca su apellido.
                                </div>
                            </div>

                            <!-- /**
                            * * Nameuser Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group has-validation">
                                    <i class="bi bi-person-badge-fill input-group-text bg-info"></i>
                                    <input type="text" class="form-control bg-dark" placeholder="Nombre de Usuario"
                                        required>
                                    <div class="invalid-feedback text-danger" id="nameuserInput">
                                        Introduzca un nombre de usuario.
                                    </div>
                                </div>
                            </div>

                            <!-- /**
                            * * Email Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-envelope-at-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="text" placeholder="Correo electrónico"
                                    name='email' required />
                                <div class="invalid-feedback text-danger" id="emailInput">
                                    Introduzca su correo electrónico.
                                </div>
                            </div>

                            <!-- /**
                            * * Password Input 
                            */ -->
                            <div class="input-group mt-1">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="password" placeholder="Contraseña"
                                    name='password' required />
                                <div class="invalid-feedback text-danger" id="usernameInput">
                                    Introduzca una contraseña
                                </div>
                                <div id="passwordHelpBlock" class="form-text ">
                                    La contraseña debe ser de 8-20 caracteres.
                                    Debe contener letras y números.
                                </div>
                            </div>

                            <!-- /**
                            * * Checkbox Input 
                            */ -->
                            <div class="form-check mt-3">
                                <input class="form-check-input bg-dark" type="checkbox" value="" id="invalidCheck"
                                    required>
                                <label class="form-check-label" for="invalidCheck">
                                    Acepto los términos y condiciones.
                                </label>
                                <div class="invalid-feedback">
                                    Debe aceptar antes de enviar.
                                </div>
                            </div>

                            <button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">Registrarse
                            </button>
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


<!-- <div class="valid-feedback">
    Looks good!
</div> -->