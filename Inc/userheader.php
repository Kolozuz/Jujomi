<!DOCTYPE html>
<html lang="ES">

<head>
    <!-- Fuente Importada de Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9EzGzlBoxUyKDBlLZ2esa4an4CoWEnHoVR6O1zJlgFQ&s">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="../Public/Css/boot.css?v=<?php echo time(); ?>">
    <!-- Bootstrap svg alert icons -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
    <!-- SweetAlert -->
    <script src="../Public/Js/sweetalert.min.js"></script>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../Public/Css/style.css?v=<?php echo time(); ?>">
    <!-- Whirl Loading Animations -->
    <link rel="stylesheet" href="../Public/Css/css/cube.css?v=<?php echo time(); ?>">
    <!-- Quill Text Rich Theme StyleSheets -->
    <link href="//cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />
    <link href="//cdn.quilljs.com/1.0.0/quill.bubble.css" rel="stylesheet" />
    <!-- Quill Multimedia Resize -->
    <link crossorigin="anonymous" integrity="sha384-7kltdnODhBho8GSWnwD9l9rilXkpuia4Anp4TKHPOrp8/MS/+083g4it4MYED/hc" href="http://lib.baomitu.com/quill/2.0.0-dev.3/quill.snow.min.css" rel="stylesheet"/>
    <script crossorigin="anonymous" integrity="sha384-MDio1/ps0nK1tabxUqZ+1w2NM9faPltR1mDqXcNleeuiSi0KBXqIsWofIp4r5A0+" src="http://lib.baomitu.com/quill/2.0.0-dev.3/quill.min.js"></script>
    <script src="../node_modules/@botom/quill-resize-module/dist/quill-resize-module.js"></script>
    
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

<body class="container-fluid p-0 bg-claro " onload="setTimeout(load,750)">
    <!-- Header Navbar-->
    <header class="contaner bg-primario fw-normal">
        <nav class="navbar shadow-sm bg-primario">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 fw-semibold " href="CursoController.php?action=start">JUJOMI</a>
                <span class="dropstart">
                    <div class="dropdown-toggle btn bg-claro shadow-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#Profilepopup" id="a">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <ul class="dropdown-menu my-3">
                        <li><a class="dropdown-item" href="../Controllers/UsuarioController.php?action=perfil">Mi Perfil</a></li>
                        <li><a class="dropdown-item" href="UsuarioController.php?action=start">Mis Cursos</a></li>
                        <li><a class="dropdown-item" href="../Controllers/UsuarioController.php?action=config">Configuracion</a></li>
                        <li><a class="dropdown-item" href="../Controllers/UsuarioController.php?action=faq">FAQ</a></li>
                        <li><a class="dropdown-item" href="../Controllers/UsuarioController.php?action=logout">Cerrar Sesion</a></li>
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

        <script src="https://kit.fontawesome.com/192d5c8398.js" crossorigin="anonymous"></script>
        <script src="../Public/Js/bundle.min.js?v=<?php echo time(); ?>"></script>
        <script>
            //Loading Screen Delay
            function load() {
                let loadingscreen = document.getElementById('loadingscreen');
                loadingscreen.style.display = 'none';
                loadingscreen.style.justifyContent = 'center';
                loadingscreen.style.justifyItems = 'center';
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