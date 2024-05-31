<title>Login & Registro</title>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center align-items-center vh-100">

                <div class="card p-2 rounded-5 box-shadow-login-register bg-dark" style="width: 25rem;">
                    <div class="card-body">


                        <form method="post" autocomplete="off" class=" needs-validation"
                            action="<?=base_url('RegisterController/registerNow')?>" id='registerForm' novalidate>

                            <div class="d-flex justify-content-center">
                                <h1><i class="bi bi-person-circle"></i></h1>
                            </div>
                            <div class="text-center fs-1 fw-bold mytext-login-register mb-4">Registrarse</div>

                            <?php if ($this -> session -> flashdata('registerSuccess') == NULL) :  ?>
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
                                    Introduzca su nombre. Entre 2-40 carácteres.
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
                                    Introduzca su apellido. Entre 2-40 carácteres.
                                </div>
                            </div>

                            <!-- /**
                            * * username Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group has-validation">
                                    <i class="bi bi-person-badge-fill input-group-text bg-info"></i>
                                    <input type="text" class="form-control bg-dark" placeholder="Usuario" required
                                        name="username" id="usernameInput">
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
                            <div class="input-group mb-3">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="password" placeholder="Contraseña"
                                    name='password' id="passwordInput" required minlength="8" maxlength="100" />
                                <div class="invalid-feedback text-danger">
                                    La contraseña debe ser de 8-100 caracteres.
                                </div>
                            </div>

                            <!-- /**
                            * * Confirm Password Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group-text bg-info">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <input class="form-control bg-dark" type="password" placeholder="Repite la contraseña"
                                    name='repeatPassword' id="repeatPasswordInput" required minlength="8"
                                    maxlength="100" />
                                <div class="invalid-feedback text-danger ">
                                    Las contraseñas deben de coincidir.
                                </div>
                            </div>

                            <!-- /**
                            * * Check Input 
                            */ -->
                            <div class="form-check mt-3">
                                <input class="form-check-input bg-dark" type="checkbox" value="1" id="terminos"
                                    name="terminos" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Acepto los términos y condiciones.
                                </label>
                                <div class="invalid-feedback">
                                    Debe aceptar los términos y condiciones antes.
                                </div>
                            </div>

                            <button type='button'
                                class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm btn-register">Registrarse
                            </button>

                            
                            <div class="form-text mt-1" style="font-size: 0.75rem">¿Tienes cuenta? <a class="link-opacity-100 text-white" href='<?=base_url('Login')?>'>Iniciar Sesión</a></div>
                            

                            <div class="alert alert-danger mt-3 fw-bold invisible" role="alert"
                                id='message-submit-incomplet'>
                                <i class="bi bi-exclamation-diamond"></i> Por favor rellena el formulario <i
                                    class="bi bi-exclamation-diamond"></i>
                            </div>
                            <?php endif ?>
                            <?php if ($this -> session -> flashdata('registerSuccess')) : ?>
                            <div class="alert alert-success mt-3 visible pb-1" role="alert" id='message-submit-complet'>
                                <i class="bi bi-check2-circle"></i> <?=$this->session->flashdata('registerSuccess');?> <i
                                    class="bi bi-check2-circle"></i>
                                <p><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                        href='<?= base_url('LoginController') ?>'><i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión <i
                                            class="bi bi-box-arrow-in-right"></i></a></p>
                            </div>
                            <?php endif; ?>

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

    $form.on('click', '.btn-register', (e) => {
        e.preventDefault();
        if (camposState.firstname && camposState.lastname && camposState.email && camposState
            .username && camposState.password && camposState.terminos) {
            $form.submit();
        } else {
            $('#message-submit-incomplet').show(500).addClass('visible').removeClass('invisible');
        }
    })

    const expresiones = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        nombre: /^[a-zA-ZÀ-ÿ\s]{2,32}$/, // Letras y espacios, pueden llevar acentos.
        password: /^.{8,100}$/, // 8 a 100 digitos.
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    }

    const camposState = {
        firstname: false,
        lastname: false,
        email: false,
        username: false,
        password: false,
        terminos: false,
    }

    const camposInput = {
        firstname: $('#firstnameInput'),
        lastname: $('#lastnameInput'),
        email: $('#emailInput'),
        username: $('#usernameInput'),
        password: $('#passwordInput'),
        repeatPassword: $('#repeatPasswordInput'),
        terminos: $('#terminos'),
    }

    const validarRepeatPassword = () => {
        const password1 = camposInput.password;
        const password2 = camposInput.repeatPassword;
        if (password1.val() !== password2.val()) {
            validacionCSS(password2, false);
            camposState['password'] = false;
        } else {
            validacionCSS(password2, true);
            camposState['password'] = true;
        }
    }

    const validarCampo = (campo, expresion, targetCampo) => {
        targetCampo.value = targetCampo.value.trim()
        // console.log();
        if (expresion.test(campo.val())) {
            validacionCSS(campo, true)
            camposState[targetCampo.name] = true;
        } else {
            validacionCSS(campo, false);
            camposState[targetCampo.name] = false;
        }

    }

    const validarTerminos = (campo) => {
        if (campo.is(':checked')) {
            camposState.terminos = true;
        } else {
            camposState.terminos = false;
        }
    }

    const validarFormulario = (e) => {
        switch (e.target.name) {
            case 'firstname':
                
                validarCampo(camposInput.firstname, expresiones.nombre, e.target);
                break;
            case 'lastname':
                validarCampo(camposInput.lastname, expresiones.nombre, e.target);
                break;
            case 'email':
                validarCampo(camposInput.email, expresiones.correo, e.target);
                break;
            case 'username':
                validarCampo(camposInput.username, expresiones.usuario, e.target);
                break;
            case 'password':
                validarCampo(camposInput.password, expresiones.password, e.target);
                validarRepeatPassword();
                break;
            case 'repeatPassword':
                validarRepeatPassword();
                break;
            case 'terminos':
                validarTerminos(camposInput.terminos);
                break;
        }
    }


    $inputs.each((input) => {
        $($inputs.eq(input)).on('change', validarFormulario);
    })
})
</script>


<!-- <div class="valid-feedback">
    Looks good!
</div> -->