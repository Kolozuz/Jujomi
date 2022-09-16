<?php
    session_start();
    //Variables de Sesion
    require '../Models/Usuario.php';

    class UsuarioController extends Usuario{

        public function CursosView(){
            include '../Views/Usuario/CursosUsuario.php';
        }

        public function ListInformation($email_u,$nombre_u,$contrasenaencripted){

            $this->email_u = $email_u;
            $this->nombre_u = $nombre_u;
            $this->contrasena_u = $contrasenaencripted;
            echo 'success';
            $this->SaveUsuario();
            $this->RedirectLogin();
        }

        public function VerifyLogin($nombre_u,$contrasena_u){
            $this->nombre_u = $nombre_u;
            $this->contrasena_u = $contrasena_u;
            $usuarioinfo = $this->CheckUsuarioFromDB();

            foreach ($usuarioinfo as $usuario_u){}
            // var_dump($usuario_u);
            if(password_verify($contrasena_u, $usuario_u->contrasena_u)){
                echo 'Contraseña Correcta';
                    $_SESSION['username_login'] = $usuario_u->nombre_u;
                    $_SESSION['password_login'] = $usuario_u->contrasena_u;

                    // header('Location: UsuarioController.php?action=start');
            }

            else{
                    echo 'La Contraseña es Incorrecta';
            }

        }
        
        public function RedirectLogin() {
            header('Location: UsuarioController.php?action=login'); 
        }

        
    }

    //TOMAR DATOS DE REGISTRO DESDE EL FORMULARIO Y GUARDARLOS EN LA DB, ENCRIPTANDO LA CONTRASEÑA
    if(isset($_POST['action']) && $_POST['action'] == 'insertar'){
        $usuariocontroller = new UsuarioController();
        $contrasenaencripted = password_hash($_POST['password_register'],PASSWORD_ARGON2ID);
        $usuariocontroller->ListInformation($_POST['email_register'], $_POST['username_register'], $contrasenaencripted);
    }

    //COMPOBAR DATOS DE INICIO DE SESION
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->VerifyLogin($_POST['username_login'], $_POST['password_login']);
    }

    // if(isset($_GET['action']) && $_GET['action'] == 'start'){
    //     $usuariocontroller = new UsuarioController();
    //     $usuariocontroller->LoadStart();
    // }
    
?> 