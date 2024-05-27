<title>Login & Registro</title>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center align-items-center vh-100">

                <div class="card p-2 rounded-5 box-shadow-login-register bg-dark" style="width: 25rem;">
                    <div class="card-body">


                        <form method="post" autocomplete="off" class=" needs-validation" action="<?=base_url('')?>"
                            id='registerForm' novalidate>

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
                                    id='firstnameInput' required />
                                <div class="invalid-feedback text-danger">
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
                                    id="lastnameInput" required />
                                <div class="invalid-feedback text-danger">
                                    Introduzca su apellido.
                                </div>
                            </div>

                            <!-- /**
                            * * Nameuser Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group has-validation">
                                    <i class="bi bi-person-badge-fill input-group-text bg-info"></i>
                                    <input type="text" class="form-control bg-dark" placeholder="Usuario" required
                                        name="nameuser" id="nameuserInput">
                                    <div class="invalid-feedback text-danger">
                                        Introduzca un nombre de usuario válido. Debe contener 4-16 carácteres.
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
                                <input class="form-control bg-dark" type="text" placeholder="Email" name='email'
                                    id="emailInput" required />
                                <div class="invalid-feedback text-danger">
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
                                    name='password' id="passwordInput" required />
                                <div class="invalid-feedback text-danger">
                                    La contraseña debe ser de 8-12 caracteres.
                                </div>
                            </div>

                            <!-- /**
                            * * Confirm Password Input 
                            */ -->
                            <div class="input-group mt-1">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="password" placeholder="Repite la contraseña"
                                    name='repeatPassword' id="repeatPasswordInput" required />
                                <div class="invalid-feedback text-danger ">
                                    Las contraseñas deben de coincidir.
                                </div>
                            </div>

                            <!-- /**
                            * * Check Input 
                            */ -->
                            <div class="form-check mt-3">
                                <input class="form-check-input bg-dark" type="checkbox" value="" id="terminos"
                                    name="terminos" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Acepto los términos y condiciones.
                                </label>
                                <div class="invalid-feedback">
                                    Debe aceptar los términos y condiciones antes.
                                </div>
                            </div>

                            <button type='submit'
                                class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">Registrarse
                            </button>

                            <div class="alert alert-danger mt-3 fw-bold invisible" role="alert"
                                id='message-submit-incomplet'>
                                <i class="bi bi-exclamation-diamond"></i> Por favor rellena el formulario <i
                                    class="bi bi-exclamation-diamond"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $('#message-submit-incomplet').hide();
    const $form = $('#registerForm');
    const $inputs = $('#registerForm input');
    $form.hide();
    $form.show(1000);

    $form.submit((e) => {
        e.preventDefault();
    })

    const expresiones = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        password: /^.{8,12}$/, // 8 a 12 digitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
        telefono: /^\d{7,14}$/ // 7 a 14 numeros.
    }

    const camposInput = {
        firstname: $('#firstnameInput'),
        lastname: $('#lastnameInput'),
        email: $('#emailInput'),
        nameuser: $('#nameuserInput'),
        password: $('#passwordInput'),
        repeatPassword: $('#repeatPasswordInput'),
        terminos: $('#terminos'),
    }

    const validarFormulario = (e) => {
        switch (e.target.name) {
            case 'firstname':
                if (expresiones.nombre.test(e.target.value)) {
                    validacionCSS(camposInput.firstname, true);
                } else {
                    validacionCSS(camposInput.firstname, false);
                }
                break;
            case 'lastname':
                if (expresiones.nombre.test(e.target.value)) {
                    validacionCSS(camposInput.lastname, true);
                } else {
                    validacionCSS(camposInput.lastname, false);
                }
                break;
            case 'email':
                if (expresiones.correo.test(e.target.value)) {
                    validacionCSS(camposInput.email, true);
                } else {
                    validacionCSS(camposInput.email, false);
                }
                break;
            case 'nameuser':
                if (expresiones.usuario.test(e.target.value)) {
                    validacionCSS(camposInput.nameuser, true);
                } else {
                    validacionCSS(camposInput.nameuser, false);
                }
                break;
            case 'password':
                if (expresiones.password.test(e.target.value)) {
                    validacionCSS(camposInput.password, true);
                } else {
                    validacionCSS(camposInput.password, false);
                }
                break;
            case 'repeatPassword':
                if (expresiones.password.test(e.target.value)) {
                    validacionCSS(camposInput.repeatPassword, true);
                } else {
                    validacionCSS(camposInput.repeatPassword, false);
                }
                break;
            case 'terminos':

                break;

        }
    }

    $inputs.each((input) => {
        $($inputs.eq(input)).on('keyup', validarFormulario)
        $($inputs.eq(input)).on('blur', validarFormulario)
    })
})
</script>


<!-- <div class="valid-feedback">
    Looks good!
</div> -->