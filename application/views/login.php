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
                                        Debe de contener entre 4-16 carácteres.
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
                                    Debe de tener una longitud minima de 8 carácteres
                                </div>
                            </div>
                            <?php if ($this -> session -> flashdata('errorLogin')) : ?>
                            <div class="alert alert-danger mt-3 fw-bold visible" role="alert"
                                id='message-submit-incomplet'>
                                <i class="bi bi-exclamation-diamond"></i> <?=$this->session->flashdata('errorLogin')?>
                                <i class="bi bi-exclamation-diamond"></i>
                            </div>
                            <?php endif; ?>
                            <button type='button'
                                class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm btn-register">Iniciar
                                Sesión
                            </button>
                            <div class="form-text mt-1" style="font-size: 0.75rem">¿No tienes cuenta? <a
                                    class="link-opacity-100 text-white" href='<?=base_url('Register')?>'>Registrarse</a>
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
    const $form = $('#registerForm');
    const $inputs = $('#registerForm input');
    $form.hide();
    $form.show(1000);

    $form.on('click', '.btn-register', (e) => {
        e.preventDefault();
        console.log(camposState);
        if (camposState.username && camposState.password) {
            $form.submit();
        }
    })

    const expresiones = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        password: /^.{8,100}$/, // 8 a 100 digitos.
    }

    const camposState = {
        username: false,
        password: false,
    }

    const camposInput = {
        username: $('#usernameInput'),
        password: $('#passwordInput'),
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



    const validarFormulario = (e) => {
        switch (e.target.name) {
            case 'username':
                validarCampo(camposInput.username, expresiones.usuario, e.target.name);
                break;
            case 'password':
                validarCampo(camposInput.password, expresiones.password, e.target.name);
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