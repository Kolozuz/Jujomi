<?php
    // session_start();
    
    //Variables de Sesion
    require '../Models/Curso.php';

    // include_once '../Views/Usuario/CursosUsuario.php';
    class CursoController extends Curso{
        
        public function RedirectCursoManager(){
            include_once '../Views/Usuario/CursosUsuario.php';
            return;
        }

        public function Redirecthtml5(){
            include_once '../Views/Cursos/html5.php';
        }

        public function Redirectcss3(){
            include_once '../Views/Cursos/css3.php';
        }

        public function InsertCurso($img_c, $nombre_c, $desc_c, $id_usuario){
            $this->img_c = $img_c;
            $this->nombre_c = $nombre_c;
            $this->desc_c = $desc_c;
            $this->id_usuario = $id_usuario;
            $this->SaveCurso();
            echo 'successssssssssss';
        }

        public function ChangeCurso(){
            $id_c = $_POST['id_update'];
            $img_c = $_FILES['img_update'];
            $nombre_c = $_POST['name_update'];
            $desc_c = $_POST['desc_update'];
            $cursos = $this->UpdateCurso($id_c, $img_c, $nombre_c, $desc_c);
        }
    }

    if(isset($_GET['action']) && $_GET['action'] == 'start'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectCursoManager();
    }

    //COSAS QUE DEBEN ESTAR EN EL CURSOCONTROLLER
    if(isset($_GET['curso']) && $_GET['curso'] == 'html5'){
        $cursocontroller = new CursoController();
        $cursocontroller->Redirecthtml5();
    }

    if(isset($_GET['curso']) && $_GET['curso'] == 'css3'){
        $cursocontroller = new CursoController();
        $cursocontroller->Redirectcss3();
    }

    //TOMAR DATOS DE REGISTRO DESDE EL FORMULARIO Y GUARDARLOS EN LA DB, ENCRIPTANDO LA CONTRASEÑA
    if(isset($_POST['action']) && $_POST['action'] == 'insertar_curso'){
        $cursocontroller = new CursoController();
        $cursocontroller->InsertCurso($_POST['id_c'], $_POST['nombre_c'], $_POST['desc_c'], $_SESSION['id_register']);

    }
?> 