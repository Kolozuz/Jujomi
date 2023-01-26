<?php
    session_start();
    
    //Variables de Sesion
    require '../Models/Curso.php';
    require '../Models/Seccion.php';
    
    // include_once '../Views/Usuario/CursosUsuario.php';
    class CursoController extends Curso{
        
        public function RedirectCursoManager(){
            include_once '../Views/Usuario/CursosManager.php';
            return;
        }

        public function RedirectCursoViewer(){
            include_once '../Views/Usuario/CursosViewer.php';
            return;
        }

        public function RedirectCursoCreator(){
            include_once '../Views/Usuario/crearCurso.php';
            return;
        }

        public function RedirectCursoUpdater(){
            include_once '../Views/Usuario/actualizarCurso.php';
            return;
        }

        public function RedirectLeccionCreator(){
            include_once '../Views/Usuario/crearLeccion.php';
            return;
        }

        public function RedirectLeccionUpdater(){
            include_once '../Views/Usuario/actualizarLeccion.php';
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

        public function InsertCurso($imgurl_c, $img_c, $ctg_c, $nombre_c, $desc_c, $id_usuario){
            // $id_u = $_GET['id'];
            // $_SESSION['id_register'] = $id_u;
            // echo $_SESSION['id_register'];
            // $cursoinfo = $this->CheckCursoFromDB();
            // foreach ($cursoinfo as $curso_obj) {}
            // $_SESSION['id_curso'] = $curso_obj->id_c;

            $this->imgurl_c = $imgurl_c;
            $this->imgname_c = $img_c;
            $this->ctg_c = $ctg_c;
            $this->nombre_c = $nombre_c;
            $this->desc_c = $desc_c;
            $this->id_usuario = $id_usuario;
            $this->SaveCurso();
            header("Location: CursoController.php?action=start&msg=successinsert");
            // echo 'successssssssssss';
        }

        public function InsertSeccion($titulo_secc, $titulo_lecc, $contenido_secc , $id_curso){
            $seccioncontroller = new Seccion();
            // $id_u = $_GET['id'];
            // $_SESSION['id_register'] = $id_u;
            // echo $_SESSION['id_register'];
            // $cursoinfo = $this->CheckCursoFromDB();
            // foreach ($cursoinfo as $curso_obj) {}
            // $_SESSION['id_curso'] = $curso_obj->id_c;

            $this->$titulo_secc = $titulo_secc;
            $this->$id_curso = $id_curso;

            $seccioncontroller->SaveSeccion($titulo_secc, $titulo_lecc, $contenido_secc, $id_curso);
            // header("Location: CursoController.php?action=start&msg=successinsert");
            // echo 'successssssssssss';
        }

        // public function InsertLeccion($titulo_lecc, $contenido_lecc){
        //     $leccioncontroller = new Leccion();
        //     // $id_u = $_GET['id'];
        //     // $_SESSION['id_register'] = $id_u;
        //     // echo $_SESSION['id_register'];
        //     // $cursoinfo = $this->CheckCursoFromDB();
        //     // foreach ($cursoinfo as $curso_obj) {}
        //     // $_SESSION['id_curso'] = $curso_obj->id_c;

        //     $this->$titulo_lecc = $titulo_lecc;
        //     $this->$contenido_lecc = $contenido_lecc;

        //     $leccioncontroller->SaveSeccion($titulo_lecc, $contenido_lecc);
        //     // header("Location: CursoController.php?action=start&msg=successinsert");
        //     echo 'successssssssssss';
        // }

        public function DeleteCurso(){
            $id_c = $_GET['id'];
            $this->RemoveCurso($id_c);
            header('location: CursoController.php?action=start&msg=successdel');
        }
        public function UpdateCurso(){
            $id_c = $_POST['id_curso'];
            // $imgurl_c = $_POST['imgurl_update'];
            // $img_c = $_FILES['img_update'];
            $ctg_c = $_POST['ctg_update'];
            $nombre_c = $_POST['nombre_update'];
            $desc_c = $_POST['desc_update'];

            $img_c = $_FILES['img_update']['name'];
            $img_tmp = $_FILES['img_update']['tmp_name'];
            $imgurl_c = "../Views/Cursos/Imgs/" . $img_c;

            copy($img_tmp, $imgurl_c);
            $this->ChangeCurso($id_c, $imgurl_c, $img_c, $ctg_c, $nombre_c, $desc_c);
            header('location: CursoController.php?action=start&msg=successupdate');

        }

        public function PublishCurso(){
            $id_c = $_POST['id'];
            $this->PublicarCurso($id_c);
        }

        public function UnpublishCurso(){
            $id_c = $_POST['id'];
            $this->AnularPublicacionCurso($id_c);
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

    if(isset($_GET['action']) && $_GET['action'] == 'startstudent'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectCursoViewer();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'crearCurso'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectCursoCreator();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'crearLeccion'){
        $cursocontroller = new CursoController();
        // $cursocontroller->RedirectLeccionCreator();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'borrarCurso'){
        $cursocontroller = new CursoController();
        $cursocontroller->DeleteCurso();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'actualizarCurso'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectCursoUpdater();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'crearLecciones'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectLeccionCreator();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'actualizarLecciones'){
        $cursocontroller = new CursoController();
        $cursocontroller->RedirectLeccionUpdater();
    }

    if(isset($_POST['action']) && $_POST['action'] == 'publishCurso'){
        $cursocontroller = new CursoController();
        $cursocontroller->PublishCurso();
    }
    
    if(isset($_POST['action']) && $_POST['action'] == 'unpublishCurso'){
        $cursocontroller = new CursoController();
        $cursocontroller->UnpublishCurso();
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
        
        copy($img_tmp, $imgurl_c);
        $cursocontroller->InsertCurso($imgurl_c, $img_c, $_POST['ctg_c'], $_POST['nombre_c'], $_POST['desc_c'], $_SESSION['id_register']);
    }

    if(isset($_POST['action']) && $_POST['action'] == 'insertar_seccion'){
        
        $cursocontroller = new CursoController();

        $scount = $_POST['seccion_count'];

        echo $scount;
        for ($i=1; $i <= $scount ; $i++) { 

            $cursocontroller->InsertSeccion($_POST['titulo_secc' . $i], $_POST['titulo_lecc' . $i], json_encode($_POST['contenido_secc']) , $_POST['id_curso']);
        
        $response = $_POST['titulo_secc' . $i];
        echo $response . ' -> is arriving';
        $cursocontroller->RedirectLeccionCreator();
        }
    }

    // if(isset($_POST['action']) && $_POST['action'] == 'insertar_leccion'){
        
    //     $cursocontroller = new CursoController();
        
    //     for ($i=1; $i <= $scount ; $i++) { 
    //         // $img_lecc = $_FILES['img_secc' . $i]['name'];
    //         // $img_lecc_temp = $_FILES['img_secc' . $i]['tmp_name'];
    //         // $imgurl_lecc = "../Views/Cursos/Lecciones/Imgs/" . $img_lecc;
    //         // die ($_POST['editorContent'] . $_FILES['img_secc' . $i]['name'] . $_FILES['img_secc' . $i]['tmp_name']);
    //         // copy($img_lecc_temp, $imgurl_lecc);
    //         // echo $img_c . $img_tmp . $imgurl_c;
    //         // echo $_POST['ctg_c'];
    //         // , $_POST['titulo_lecc' . $i], $_FILES['img_secc' . $i]['type'], $imgurl_lecc, $_POST['text_lecc' . $i]
    //         $cursocontroller->InsertSeccion($_POST['titulo_secc' . $i], $_POST[], $_POST['id_curso']);

    //     $cursocontroller->RedirectCursoManager();
    //     }
    // }

    if(isset($_POST['action']) && $_POST['action'] == 'actualizar_curso'){
        $cursocontroller = new CursoController();
        $cursocontroller->UpdateCurso();
    }
?> 