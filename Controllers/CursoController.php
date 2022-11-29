<?php
    session_start();
    
    //Variables de Sesion
    require '../Models/Curso.php';
    
    // include_once '../Views/Usuario/CursosUsuario.php';
    class CursoController extends Curso{
        
        public function RedirectCursoManager(){
            include_once '../Views/Usuario/CursosUsuario.php';
            return;
        }

        public function RedirectCursoCreator(){
            include_once '../Views/Usuario/crearCurso.php';
            return;
        }

        public function RedirecCurso(){
            include_once '../Views/Cursos/Curso.php';
        }

        public function Redirectcss3(){
            include_once '../Views/Cursos/css3.php';
        }

        public function RedirectIndex()
        {
            header('Location: ../index.php');
        }

        public function InsertCurso($imgurl_c, $ctg_c, $nombre_c, $desc_c, $id_usuario){
            // $id_u = $_GET['id'];
            // $_SESSION['id_register'] = $id_u;
            // echo $_SESSION['id_register'];
            // $cursoinfo = $this->CheckCursoFromDB();
            // foreach ($cursoinfo as $curso_obj) {}
            // $_SESSION['id_curso'] = $curso_obj->id_c;

            $this->imgurl_c = $imgurl_c;
            $this->ctg_c = $ctg_c;
            $this->nombre_c = $nombre_c;
            $this->desc_c = $desc_c;
            $this->id_usuario = $id_usuario;
            $this->SaveCurso();
            header("Location: CursoController.php?action=start&msg=successinsert");
            echo 'successssssssssss';
        }

        public function InsertSeccion($imgurl_c, $ctg_c, $nombre_c, $desc_c, $id_usuario){
            // $id_u = $_GET['id'];
            // $_SESSION['id_register'] = $id_u;
            // echo $_SESSION['id_register'];
            // $cursoinfo = $this->CheckCursoFromDB();
            // foreach ($cursoinfo as $curso_obj) {}
            // $_SESSION['id_curso'] = $curso_obj->id_c;

            $this->imgurl_c = $imgurl_c;
            $this->ctg_c = $ctg_c;
            $this->nombre_c = $nombre_c;
            $this->desc_c = $desc_c;
            $this->id_usuario = $id_usuario;
            $this->SaveCurso();
            header("Location: CursoController.php?action=start&msg=successinsert");
            echo 'successssssssssss';
        }

        public function UpdateCurso(){
            $id_c = $_POST['id_update'];
            $imgurl_c = $_POST['imgurl_update'];
            $img_c = $_FILES['img_update'];
            $nombre_c = $_POST['name_update'];
            $desc_c = $_POST['desc_update'];
            $cursos = $this->ChangeCurso($id_c, $imgurl_c, $img_c, $nombre_c, $desc_c);
        }

        public function PublishCurso($id_usuario, $estado_c){
            $this->$id_usuario = $_SESSION['id_register'];
            $this->estado_c = $estado_c;

            $this->PublicarCurso($id_usuario);
            header("Location: CursoController.php?action=start&msg=successpublish");
            echo '<script>console.log(Course Succesfully Published);</script>';
        }
    }
    
    if (!$_SESSION) {
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectIndex();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'start'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectCursoManager();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'crearCurso'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectCursoCreator();
    }

    //COSAS QUE DEBEN ESTAR EN EL CURSOCONTROLLER
    if(isset($_GET['curso'])){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirecCurso();
    }

    if(isset($_GET['curso']) && $_GET['curso'] == 'css3'){
        $cursocontroller = new CursoController();
        $cursocontroller->Redirectcss3();
    }

    //TOMAR DATOS DE REGISTRO DESDE EL FORMULARIO Y GUARDARLOS EN LA DB, ENCRIPTANDO LA CONTRASEÑA
    if(isset($_POST['action']) && $_POST['action'] == 'insertar_curso'){
        $cursocontroller = new CursoController();
        $img_c = $_FILES['img_c']['name'];
        $img_tmp = $_FILES['img_c']['tmp_name'];
        $imgurl_c = "../Views/Cursos/Imgs/" . $img_c;
        // echo $img_c . $img_tmp . $imgurl_c;
        echo $_POST['ctg_c'];
        copy($img_tmp, $imgurl_c);
        $cursocontroller->InsertCurso($imgurl_c, $_POST['ctg_c'], $_POST['nombre_c'], $_POST['desc_c'], $_SESSION['id_register']);
    }
?> 