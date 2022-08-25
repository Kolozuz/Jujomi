<!DOCTYPE html>
<html lang="ES">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Public/Css/boot.css">
    <link rel="stylesheet" href="../Public/Css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jujomi</title>
</head>
<body class="container-fluid p-0 bg-claro">
    <!-- Header Navbar-->
    <header>
        <nav class="navbar shadow-sm bg-primario">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">JUJOMI</a>
                <span>
                    <button class="btn btn-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#Loginpopup" id="a">Iniciar Sesión</button> 
                    <button class="btn btn-secondary shadow-sm" data-bs-toggle="modal" data-bs-target="#Registerpopup" id="b">Registro</button>
                </span>
            </div>
        </nav>

        <!-- Inicio de sesion Usuario -->
        <div class="modal" id="Loginpopup" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Iniciar Sesion</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" id="login_credentials_usuario" class="form-floating">
                            <div class="container-fluid" >
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="text" class="form-control col" id="username_login" placeholder="Ingresa tu usuario">
                                    <label for="username_login">Ingresa tu usuario</label>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="email" class="form-control col" id="password_login" placeholder="Ingresa tu contraseña">
                                    <label for="password_login">Ingresa  tu contraseña</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="Logininput" class="btn btn-primary" onclick="log_in()">Ingresar</button>
                    </div>
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
                        <form action="#" method="post" id="register_credentials_usuario" class="form-floating">
                            <div class="container-fluid" >
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="email" class="form-control col" id="email_register" placeholder="Ingresa un Correo Electronico">
                                    <label for="email_register">Ingresa un Correo Electronico</label>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="text" class="form-control col" id="username_register" placeholder="Ingresa un usuario">
                                    <label for="username_register">Ingresa un Nombre de Usuario</label>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="password" class="form-control col" id="password_register" placeholder="Ingresa una Contraseña">
                                    <label for="password_register">Ingresa una Contraseña</label>
                                </div>
                                <div class="row ms-5 me-5 form-floating mb-3">
                                    <input type="password" id="reg_contraseña_check" class="user_input , form-control" placeholder="Vuelve a ingresar la contraseña">
                                    <label for="password_register">Vuelve a ingresar la contraseña</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="Registerinput" class="btn btn-primary">Crear Cuenta</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../Public/Js/bundle.min.js"></script>
    </header>
