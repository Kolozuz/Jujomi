<?php
    session_start();
    
    //Variables de Sesion
    require '../Models/Usuario.php';
    require '../Models/Curso.php';
    // $nombre = $_POST['username_login'];

    class UsuarioController extends Usuario{

        public function RedirectStart(){
            // header('Location: ../Views/Usuario/CursosUsuario.php');
            $usuarioinfo = $this->CheckUsuarioFromDB();

            foreach ($usuarioinfo as $usuario_u){}
            if(empty($_SESSION['username_login'])){

                session_destroy();
                die ('No has iniciado sesion');
                return;
            }

            else{
                // echo '<script type="text/javascript">';
                // echo "alert('Sesion iniciada con exito')";
                // echo '</script>';
                // var_dump($usuarioinfo);
                include_once '../Views/Usuario/CursosUsuario.php';
            }
            

        }


        public function RedirectPerfil() {     
            include_once '../Views/Usuario/PerfilUsuario.php'; 
        }

        public function RedirectConfig(){
            include_once '../Views/Usuario/ConfigUsuario.php'; 
        }

        public function RedirectFaq(){
            include_once '../Views/Usuario/FaqUsuario.php'; 
        }

        public function DeletePerfil(){
            $this->DeleteUsuario();
            echo '<script type="text/javascript">';
            echo "alert('Perfil Borrado')";
            echo '</script>';
            echo '<style>body{text-align:center; font-family: Ubuntu, sans-serif;}</style><span style="text-align:center;font-size: 50px; font-weight:bold;">Click ';
            echo '<a href="UsuarioController.php?action=index"> aqui </a> ';
            echo ' para volver al inicio</span>';

            // $this->Redir();
        }
        
        public function RedirectIndex(){
            header('Location: ../index.php');
        }

        public function Redirecthtml5(){
            include_once '../Views/Cursos/html5.php';
        }

        public function Redirectcss3(){
            include_once '../Views/Cursos/css3.php';
        }

        public function ListInformation($email_u,$nombre_u,$contrasenaencripted){
            
            $this->email_u = $email_u;
            $this->nombre_u = $nombre_u;
            $this->contrasena_u = $contrasenaencripted;
            echo 'success';            
            $this->SaveUsuario();
            $this->RedirectIndex();
            // $usuarioinfo = $this->CheckUsuarioFromDB();
            // foreach ($usuarioinfo as $usuario_u){}
            // if
            // $_SESSION['username_register'] = $usuario_u->nombre_u;
            // $_SESSION['email_register'] = $usuario_u->email_u;
        }

        public function VerifyLogin($nombre_u,$contrasena_u){
            // ini_set('display_errors', 0);
            // ini_set('display_startup_errors', 0);
            // error_reporting(-1);
            $this->nombre_u = $nombre_u;
            $this->contrasena_u = $contrasena_u;
            $usuarioinfo = $this->CheckUsuarioFromDB();

            foreach ($usuarioinfo as $usuario_u){}
            if(password_verify($contrasena_u, $usuario_u->contrasena_u)){
                // echo 'Contraseña Correcta';

                $_SESSION['username_login'] = $usuario_u->nombre_u;
                $_SESSION['password_login'] = $usuario_u->contrasena_u;
                
                    $_SESSION['id_register'] = $usuario_u->id_u;
                    $_SESSION['fecha_register'] = $usuario_u->fecha_u;
                    $_SESSION['hora_register'] = $usuario_u->hora_u;
                    $_SESSION['email_register'] = $usuario_u->email_u;

                    // header('Location: UsuarioController.php?action=start'); 
                    echo '<script type="text/javascript">';
                    echo "alert('Sesion iniciada con exito')";
                    echo '</script>';
                    $this->RedirectStart();
            }

            else{
                echo '
                    <link rel="stylesheet" href="../Public/Css/boot.css">
                    <link rel="stylesheet" href="../Public/Css/style.css"><br>';

                echo '<script type="text/javascript">';
                echo 'document.write("';
                echo "<div class='container-fluid bg-primario'>¿Eres nuevo en Jujomi? <br> Haz click";
                echo "<a class='btn bg-secundario shadow-sm' data-bs-toggle='modal' data-bs-target='#Registerpopup'>Aqui</a> para volver al index y registrarte </div>";
                echo '")</script>';
                // $this->RedirectIndex();
                   
            }


        }

        public function Update(){
            $id_u = $_POST['id_u'];
            $nombre_u = $_POST['username_update'];
            $email_u = $_POST['email_update'];
            $personas = $this->UpdateUsuario($id_u,$nombre_u,$email_u);

            header('Location: UsuarioController.php?action=perfil'); 

            // $this->RedirectPerfil();
            // foreach($personas as $updateperson){}
            // session_reset();
            // $_SESSION['username_login'] = $updateperson->nombre_u;
            // $_SESSION['email_register'] = $updateperson->email_u;

        }
        

        
    }

    //TOMAR ACTION PARA REDIRECCIONAR
    if(isset($_GET['action']) && $_GET['action'] == 'start'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectStart();
    }
    
    //Index
    if(isset($_GET['action']) && $_GET['action'] == 'index'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectIndex();
    }

    //Perfil
    if(isset($_GET['action']) && $_GET['action'] == 'perfil'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectPerfil();
    }

    //Configuracion
    if(isset($_GET['action']) && $_GET['action'] == 'config'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectConfig();
    }

    //FAQ
    if(isset($_GET['action']) && $_GET['action'] == 'faq'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectFaq();
    }

    //Cerrar Sesion
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->RedirectIndex($alert);
    }

    //Eliminar Cuenta
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->DeletePerfil();
        session_destroy();
    }

    //Actualizar Cuenta
    if(isset($_GET['action']) && $_GET['action'] == 'update'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->Update();
        // session_destroy();
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

    //COSAS QUE DEBEN ESTAR EN EL CURSOCONTROLLER
    if(isset($_GET['curso']) && $_GET['curso'] == 'html5'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->Redirecthtml5();
    }

    if(isset($_GET['curso']) && $_GET['curso'] == 'css3'){
        $usuariocontroller = new UsuarioController();
        $usuariocontroller->Redirectcss3();
    }
?> 