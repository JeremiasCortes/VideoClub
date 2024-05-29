<title>Login & Registro</title>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-center align-items-center vh-100">

                <div class="card p-2 rounded-5 box-shadow-login-register bg-dark" style="width: 25rem;">
                    <div class="card-body">


                        <form method="post" autocomplete="off" class=" needs-validation"
                            action="<?=base_url('LoginController/login')?>" id='registerForm' novalidate>

                            <div class="d-flex justify-content-center">
                                <h1><i class="bi bi-person-circle"></i></h1>
                            </div>
                            <div class="text-center fs-1 fw-bold mytext-login-register mb-4">Iniciar Sesión</div>

                            <!-- /**
                            * * Username Input 
                            */ -->
                            <div class="input-group mb-3">
                                <div class="input-group has-validation">
                                    <i class="bi bi-person-badge-fill input-group-text bg-info"></i>
                                    <input type="text" class="form-control bg-dark" placeholder="Usuario" required
                                        name="username" id="usernameInput">
                                    <div class="invalid-feedback text-danger">
                                        Introduzca su nombre de usuario. Contiene minimo 4 carácteres.
                                    </div>
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

                            <button type='button'
                                class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm btn-register">Iniciar Sesión
                            </button>

                            <div class="alert alert-danger mt-3 fw-bold visible" role="alert"
                                id='message-submit-incomplet'>
                                <i class="bi bi-exclamation-diamond"></i> Por favor rellena los campos <i
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

    $form.on('click', '.btn-register', (e) => {
        e.preventDefault();
        console.log(camposState);
        if (camposState.firstname && camposState.lastname && camposState.email && camposState
            .username && camposState.password && camposState.terminos) {
            $form.submit();
        };
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

    const validarCampo = (campo, expresion, nameCampo) => {
        if (expresion.test(campo.val())) {
            validacionCSS(campo, true)
            camposState[nameCampo] = true;
        } else {
            validacionCSS(campo, false);
            camposState[nameCampo] = false;
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
                validarCampo(camposInput.firstname, expresiones.nombre, e.target.name);
                break;
            case 'lastname':
                validarCampo(camposInput.lastname, expresiones.nombre, e.target.name);
                break;
            case 'email':
                validarCampo(camposInput.email, expresiones.correo, e.target.name);
                break;
            case 'username':
                validarCampo(camposInput.username, expresiones.usuario, e.target.name);
                break;
            case 'password':
                validarCampo(camposInput.password, expresiones.password, e.target.name);
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
        $($inputs.eq(input)).on('blur', validarFormulario);
    })
})
</script>


<!-- <div class="valid-feedback">
    Looks good!
</div> -->