<!DOCTYPE html>
<html lang="ES">
<head>
    <!-- Fuente Importada de Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="../../Public/Css/boot.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../../Public/Css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jujomi</title>
</head>
<div>
    <img src="https://media4.giphy.com/media/hWZBZjMMuMl7sWe0x8/giphy.gif?cid=ecf05e47za126yvzsxj648mwdag39xrr70em494c6davxha4&rid=giphy.gif&ct=g" alt="... " id="loadingscreen">
</div>
<body class="container-fluid p-0 bg-claro" onload="setTimeout(load,250)">
    <!-- Header Navbar-->
    <header class="bg-primario fw-normal">
        <nav class="navbar shadow-sm bg-primario">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 fw-semibold " href="../../index.php">JUJOMI</a>
                <span class="dropstart">
                    <div class="dropdown-toggle btn bg-claro shadow-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#Profilepopup" id="a">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div> 
                        <ul class="dropdown-menu my-3">
                            <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="../Usuario/CursosUsuario.php">Mis Cursos</a></li>
                            <li><a class="dropdown-item" href="#">Configuracion</a></li>
                            <li><a class="dropdown-item" href="#">FAQ</a></li>
                        </ul>
                </span>
            </div>
        </nav>

        <!-- Inicio de sesion Usuario -->
        <div class="modal" id="Profilepopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Iniciar Sesion</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="Controllers/UsuarioController.php" method="post" id="login_credentials_usuario" class="form-floating needs-validation" novalidate>
                            <div class="container-fluid" >
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
                                    <label for="password_login">Ingresa  tu contraseña</label>
                                    <div class="invalid-feedback">
                                        Debes escribir tu contraseña.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" id="Logininput" class="btn btn-primary">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Registro de Usuario -->
        <div class="modal" id="Registerpopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Registro</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="Controllers/UsuarioController.php" method="post" id="register_credentials_usuario" class="form-floating needs-validation" novalidate>
                            <div class="container-fluid">
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="hidden" name="action" value="insertar">
                                    <input type="email" class="form-control col" name="email_register" placeholder="Ingresa un Correo Electronico" required>
                                    <label for="email_register">Ingresa un Correo Electronico</label>
                                    <div class="invalid-feedback">
                                        Debes escribir una direccion de correo valida.
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" id="Registerinput" class="btn btn-primary">Crear Cuenta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="../../Public/Js/bundle.min.js"></script>
        <script>
            //Loading Screen Delay
            function load(){
                let loadingscreen = document.getElementById('loadingscreen');
                loadingscreen.style.display = 'none';
            }

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
    </header>
