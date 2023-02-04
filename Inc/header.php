<?php echo '<script>console.log("with ❤ by Jujomi Org.")</script>'; ?>
<!DOCTYPE html>
<html lang="ES">

<head>
    <!-- Fuente Importada de Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9EzGzlBoxUyKDBlLZ2esa4an4CoWEnHoVR6O1zJlgFQ&s">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="Public/Css/boot.css?v=<?php echo time(); ?>">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="Public/Css/style.css?v=<?php echo time(); ?>">
    <!-- Whirl Loading Animations -->
    <link rel="stylesheet" href="Public/Css/css/cube.css?v=<?php echo time(); ?>">
    <!-- SweetAlert -->
    <script src="Public/Js/sweetalert.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jujomi</title>
</head>
<div class="container-fluid bg-secundario p-5" id="loadingscreen">
    <div class="cube" style="margin-top:auto; margin-bottom:auto;">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<body class="container-fluid p-0 bg-claro" onload="setTimeout(load,700)">

    <!-- Header Navbar-->
    <header class="bg-primario fw-normal fs-6">
        <nav class="navbar shadow-sm bg-primario">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 fw-semibold " href="index.php">
                    <!-- <img src="Public/img/2.png" alt="logo" width="70px"> -->
                    JUJOMI
                    <!-- <img src="Public/img/1.5.png" alt="brand logo" width="100px"> -->
                </a>
                <span>
                    <span class="dropdown">
                        <a href="#" class="dropdown-toggle btn bg-secundario shadow-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menú</a>
                        <ul class="dropdown-menu my-3">
                            <li><a class="dropdown-item" href="Cursos.php">Cursos</a></li>
                            <li><a class="dropdown-item" href="#div1">¿No sabes por donde empezar?</a></li>
                            <li><a class="dropdown-item" href="#footer">Nosotros</a></li>
                        </ul>
                    </span>

                    <button class="btn bg-claro shadow-sm" data-bs-toggle="modal" data-bs-target="#Loginpopup" id="a">Iniciar Sesión</button>
                    <button class="btn bg-secundario shadow-sm" data-bs-toggle="modal" data-bs-target="#Registerpopup" id="b">Registro</button>
                </span>
            </div>
        </nav>

        <!-- Inicio de sesión Usuario -->
        <div class="modal fade" id="Loginpopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Iniciar Sesión</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="Controllers/UsuarioController.php?action=login" method="post" id="login_credentials_usuario" class="form-floating needs-validation" novalidate>
                            <div class="container-fluid">
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="hidden" name="action" value="login">
                                    <input type="text" class="form-control col" name="username_login" placeholder="Ingresa tu usuario" required>
                                    <label for="username_login">Ingresa tu usuario</label>
                                    <div class="invalid-feedback">
                                        Debes escribir tu nombre de usuario.
                                    </div>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="password" class="form-control col" name="password_login" placeholder="Ingresa tu contraseña" required>
                                    <label for="password_login">Ingresa tu contraseña</label>
                                    <div class="invalid-feedback">
                                        Debes escribir tu contraseña.
                                    </div>
                                </div>
                                <div class="row row mx-5 px-2 mb-3 text-center">
                                    <span>¿Has olvidado tu contraseña? <a href="#">Recupérala aquí</a></span>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="LoginClose" class="btn btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="Logininput" class="btn btn-secundario">Ingresar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Registro de Usuario -->
        <div class="modal fade" id="Registerpopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Registro</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="Controllers/UsuarioController.php?action=register" method="post" id="register_credentials_usuario" class="form-floating needs-validation" autocomplete="off" novalidate>
                            <div class="container-fluid">
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="hidden" name="action" value="insertar">
                                    <input type="email" class="form-control col" name="email_register" placeholder="Ingresa un Correo Electrónico" required>
                                    <label for="email_register">Ingresa un Correo Electrónico</label>
                                    <div class="invalid-feedback">
                                        Debes escribir una dirección de correo valida.
                                    </div>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="text" class="form-control col" name="username_register" placeholder="Ingresa un usuario" required>
                                    <label for="username_register">Ingresa un Nombre de Usuario</label>
                                    <div class="invalid-feedback">
                                        Debes escribir un nombre de usuario.
                                    </div>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="password" class="form-control col" name="password_register" placeholder="Ingresa una Contraseña" required>
                                    <label for="password_register">Ingresa una Contraseña</label>
                                    <div class="invalid-feedback">
                                        Debes escribir una contraseña.
                                    </div>
                                </div>
                                <div class="row mx-5 px-2 mb-3 text-center">
                                    <span><input type="checkbox" name="terms_&_conditions_checkbox" id="" required> Acepto los <a href="#">Términos y Condiciones</a> </span>
                                    <br>
                                    <span>¿Ya estas registrado? <a href="#" data-bs-toggle="modal" data-bs-target="#Loginpopup">Inicia Sesión</a></span>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="Registerinput" class="btn btn-primario">Crear Cuenta</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="Public/Js/bundle.min.js"></script>
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/192d5c8398.js" crossorigin="anonymous"></script>
        <script>
            // Loading Screen Delay
            function load() {
                let loadingscreen = document.getElementById('loadingscreen');
                loadingscreen.style.display = 'none';
            }

            // JavaScript for disabling form submissions if there are invalid fields
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
    </header>