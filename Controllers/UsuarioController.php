<?php
session_start();

//Variables de Sesion
require '../Models/Usuario.php';
// require '../Models/Curso.php';
// $nombre = $_POST['username_login'];

class UsuarioController extends Usuario
{

    public function RedirectStart()
    {
        // header('Location: ../Views/Usuario/CursosUsuario.php');
        $usuarioinfo = $this->CheckUsuarioFromDB();

        foreach ($usuarioinfo as $usuario_u) {
        }
        if (empty($_SESSION['username_login'])) {

            echo 'NO HAS INICIADO SESION BRO';
            $this->RedirectIndex();
            return;
        } else {
            header("Location: CursoController.php?action=start");
        }
    }

    public function RedirectCursosEveryone()
    {
        include_once '../Cursos.php';
    }

    public function RedirectFaq()
    {
        include_once '../Views/Usuario/FaqUsuario.php';
    }

    public function PwdRecovery()
    {
        ini_set('SMTP', 'localhost');
        ini_set("smtp_port",'25');
        ini_set('sendmail_from', 'krdinalsoftware@gmail.com');
        // ini_set('username', 'krdinalsoftware@gmail.com');
        // ini_set('password', 'jddontzxlbcxfuyb');
        $who = $_POST["emailpwdrecovery"];
        if (isset($_POST['subaction']) && $_POST['subaction'] == "sendemail") {
            $_SESSION['pwdrecoverycode'] = random_int(00000,99999);
            mail($who, "Aqui esta el codigo para restablecer tu contraseña",
                "Hey [Insert Username Here]!, parece que estas \n
                teniendo problemas para iniciar sesion :( \n
                Pero no hay de que preocuparse!. Puedes usar \n
                el siguiente codigo para restablecer tu contraseña: \n" .
                $_SESSION['pwdrecoverycode']
            );
    
            // echo "1->" . $pwdrecoverycode . "\n";
            // echo "2->" . $pwdrecoverycode . "\n";
            echo $_SESSION['pwdrecoverycode'];
            return;
        }

        if (isset($_POST['subaction']) && $_POST['subaction'] == "confirmcode") {
            $enteredcode = $_POST['enteredcode'];

            if (!empty($enteredcode)) {
                // echo $enteredcode . " // " . $_SESSION['pwdrecoverycode'];

                if ($enteredcode != $_SESSION['pwdrecoverycode']) {
                    echo 'NO COINCIDEN LOS CODIGOS';
                    return;
                }

                echo 'TODO CORRECTO';
                return;

            }

            echo 'CODIGO VACIO';
        }

        if (isset($_POST['subaction']) && $_POST['subaction'] == "confirmpwd") {
            $newpwd = $_POST['newpwd1'];
            $newpwd2 = password_hash($_POST['newpwd2'], PASSWORD_ARGON2ID);

            if (!password_verify($newpwd, $newpwd2)) {
                echo $newpwd . "\n" . $newpwd2;
                echo 'NO COINCIDEN LAS CONTRASEÑAS';
                return;
            } 
            //echo $newpwd . "\n" . $newpwd2;
            $this->RecoverPassword($newpwd2, $who);
        }



    }

    public function RedirectPerfil()
    {
        include_once '../Views/Usuario/PerfilUsuario.php';

    }

    public function RedirectConfig()
    {
        include_once '../Views/Usuario/ConfigUsuario.php';
    }

    public function DeletePerfil()
    {
        $this->DeleteUsuario();
        
        header('Location: ../index.php?msg=pfdelsuccess');
    }

    public function RedirectIndex()
    {
        header('Location: ../index.php');
    }

    public function ListInformation($email_u, $nombre_u, $contrasenaencripted)
    {
        $this->email_u = $email_u;
        $this->nombre_u = $nombre_u;
        $this->contrasena_u = $contrasenaencripted;
        echo 'success';
        $this->SaveUsuario();
        $this->RedirectIndex();
    }

    public function VerifyLogin($nombre_u, $contrasena_u)
    {
        //Esto desactiva todos los errores no fatales (for testing purpouse only)
        // ini_set('display_errors', 0);
        // ini_set('display_startup_errors', 0);
        // error_reporting(-1);

        $this->nombre_u = $nombre_u;
        $this->contrasena_u = $contrasena_u;
        $usuarioinfo = $this->CheckUsuarioFromDB();

        foreach ($usuarioinfo as $usuario_u) {
        }

        //Esto verifica que la contraseña ingresada coincida con la de la db que esta encriptada
        if (!password_verify($contrasena_u, $usuario_u->contrasena_u)) {

            header('Location: ../index.php?err=mismatch');
            die('error');
        }

        // Esto define las variables de SESSION del usuario;
        $_SESSION['username_login'] = $usuario_u->nombre_u;
        $_SESSION['password_login'] = $usuario_u->contrasena_u;

        $_SESSION['imgurl_register'] = $usuario_u->imgurl_u;
        $_SESSION['id_register'] = $usuario_u->id_u;
        $_SESSION['fecha_register'] = $usuario_u->fecha_u;
        $_SESSION['hora_register'] = $usuario_u->hora_u;
        $_SESSION['email_register'] = $usuario_u->email_u;

        echo '<script type="text/javascript">';
        echo "alert('Sesion iniciada con exito')";
        echo '</script>';
        $this->RedirectStart();

        // $this->RedirectIndex();
    }

    public function Update($id_u, $imgurl_u, $email_u, $nombre_u, $contrasena_u)
    {
        $this->id_u = $_SESSION['id_register'];
        $this->email_u = $email_u;
        $this->nombre_u = $nombre_u;
        $this->contrasena_u = $contrasena_u;

        $usuarioinfo = $this->CheckUsuarioFromDBbyid();

        foreach ($usuarioinfo as $usuario_u) {
            echo "DATOS BASE DE DATOS -> ". $usuario_u->contrasena_u . $usuario_u->email_u . $usuario_u->nombre_u;
        }

        if (password_verify($contrasena_u, $usuario_u->contrasena_u)) {

            $this->UpdateUsuario($id_u, $imgurl_u, $nombre_u, $email_u);
            header('Location: UsuarioController.php?action=perfil');
        } else {

            echo $contrasena_u;
            header('Location: UsuarioController.php?action=perfil&error=pwddoesnotmatch');
            // die('Contraseña no coincide');
        }
    }
}

//ESTO TOMA LOS DATOS DE REGISTRO DESDE EL FORMULARIO Y LOS GUARDA EN LA DB, ENCRIPTANDO LA CONTRASEÑA
if (isset($_POST['action']) && $_POST['action'] == 'insertar') {
    $usuariocontroller = new UsuarioController();
    $contrasenaencripted = password_hash($_POST['password_register'], PASSWORD_ARGON2ID);
    $usuariocontroller->ListInformation($_POST['email_register'], $_POST['username_register'], $contrasenaencripted);
}

//ESTO COMPRUEBA LOS DATOS DE INICIO DE SESION
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->VerifyLogin($_POST['username_login'], $_POST['password_login']);
}

//ESTO TOMA EL ACTION PARA REDIRECCIONAR
if (isset($_GET['action']) && $_GET['action'] == 'start') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->RedirectStart();
}


//ESTO SON LAS DIFERENTES 'REDIRECCIONES' QUE USAMOS EN LOS METODOS

//Index
if (isset($_GET['action']) && $_GET['action'] == 'index') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->RedirectIndex();
}

//Cerrar Sesion
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $usuariocontroller = new UsuarioController();
    session_destroy();
    header('Location: ../index.php?msg=logoutsuccess');
}

//ESTO IMPIDE QUE EL USUARIO ACCEDA A LAS VISTAS SI NO HA INICIADO SESION
// if (!$_SESSION) {
//     $usuariocontroller = new UsuarioController();
//     $usuariocontroller->RedirectStart();
// }

//FAQ
if (isset($_GET['action']) && $_GET['action'] == 'faq') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->RedirectFaq();
}

//Recuperar Password
if (isset($_POST['action']) && $_POST['action'] == 'pwdrecovery') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->PwdRecovery();
}

//Perfil
if (isset($_GET['action']) && $_GET['action'] == 'perfil') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->RedirectPerfil();
}

//Configuracion
if (isset($_GET['action']) && $_GET['action'] == 'config') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->RedirectConfig();
}

//Eliminar Cuenta
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $usuariocontroller = new UsuarioController();
    $usuariocontroller->DeletePerfil();
    session_destroy();
}

//Actualizar Cuenta
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $usuariocontroller = new UsuarioController();
    // $contrasena_u = $_POST['password_update'];
    // echo $contrasena_u;
    // echo $_POST['email_update'] . $_POST['username_update'] . $_POST['password_update'];
    $img_u = $_FILES['imgurl_update']['name'];
        $img_u_tmp = $_FILES['imgurl_update']['tmp_name'];
        $imgurl_u = "../Views/Usuario/Imgs/" . $img_u;

    copy($img_u_tmp, $imgurl_u);
    $usuariocontroller->Update($_POST['id_u'], $imgurl_u, $_POST['email_update'], $_POST['username_update'], $_POST['password_update']);
    // session_destroy();
}
