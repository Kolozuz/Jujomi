<?php
    session_start();
    // ini_set('display_errors', 0);
    // ini_set('display_startup_errors', 0);
    // error_reporting(-1);
    //Variables de Sesion
    require '../Models/Usuario.php';

    // $nombre = $_POST['username_login'];

    class UsuarioController extends Usuario{

        public function RedirectStart(){
            // header('Location: ../Views/Usuario/CursosUsuario.php');
            $usuarioinfo = $this->CheckUsuarioFromDB();

            foreach ($usuarioinfo as $usuario_u){}
            if(empty($_SESSION['username_register'])){
                echo 'No has iniciado sesion';
                
            }

            else{
                echo 'Ya inicio sesion';
                include_once '../Views/Usuario/CursosUsuario.php';
            }
            

        }


        public function RedirectPerfil() {
            include_once '../Views/Usuario/PerfilUsuario.php'; 
        }

        public function RedirectConfig(){
            include_once '../Views/Usuario/ConfigUsuario.php'; 
        }

        public function DeletePerfil($id_u){
            $this->id_u = $id_u;
            $this->DeleteUsuario();
            // $this->Redir();
        }
        
        public function Redir(){
            header('Location: UsuarioController.php?action=start');
        }

        public function ListInformation($email_u,$nombre_u,$contrasenaencripted){
            
            $this->email_u = $email_u;
            $this->nombre_u = $nombre_u;
            $this->contrasena_u = $contrasenaencripted;
            echo 'success';            
            $this->SaveUsuario();
            // $usuarioinfo = $this->CheckUsuarioFromDB();
            // foreach ($usuarioinfo as $usuario_u){}
            // if
            // $_SESSION['username_register'] = $usuario_u->nombre_u;
            // $_SESSION['email_register'] = $usuario_u->email_u;
        }

        public function VerifyLogin($nombre_u,$contrasena_u){
            $this->nombre_u = $nombre_u;
            $this->contrasena_u = $contrasena_u;
            $usuarioinfo = $this->CheckUsuarioFromDB();

            foreach ($usuarioinfo as $usuario_u){}
            if(password_verify($contrasena_u, $usuario_u->contrasena_u)){
                echo 'Contraseña Correcta';
                
                    $_SESSION['username_register'] = $usuario_u->nombre_u;
                    $_SESSION['email_register'] = $usuario_u->email_u;
                    $_SESSION['id_register'] = $usuario_u->id_u;



                    header('Location: UsuarioController.php?action=start');
            }

            else{
                    echo '¿Eres nuevo en Jujomi? Click aquí para crear una cuenta <br> Click <a>aqui</a> para crear una cuenta';
            }


        }

        public function Update(){
            $id = $_SESSION['id_u'];
            $nombre_u = $_SESSION['username_register'];
            $email_u = $_SESSION['email_register'];
            $personas = $this->UpdateUsuario($id,$nombre_u,$email_u);
        }
        

        
    }

    //TOMAR ACTION PARA REDIRECCIONAR
    if(isset($_GET['action']) && $_GET['action'] == 'start'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectStart();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'perfil'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectPerfil();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'config'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectConfig();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->DeletePerfil($_GET['id_u']);
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

?> 