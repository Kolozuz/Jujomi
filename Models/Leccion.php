<?php
include '../Config/Conexion.php';
class Leccion extends Seccion
{
    protected $id_c;
    protected $imgurl_c;
    protected $img_c;
    protected $ctg_c;
    protected $nombre_c;
    protected $desc_c;
    protected $id_usuario;
    protected $estado_c;


    // include '../Config/Conexion.php';
    public function CheckCursoFromDB($id_u)
    {
        // $id_u = $_SESSION['id_register'];
        //Todos los cursos CREADOS POR EL USUARIO
        $conexion = new Conexion();
        $sql = "SELECT * FROM tbl_curso WHERE id_usuario = '$id_u'";
        //La id NO puede ser fija, debe asignarse a una variable!!!!

        $read = $conexion->stm->prepare($sql);
        $read->execute();

        $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

        return $cursoobjeto;
    }

    // public function CheckCursoAllFromDB(){
    //     //Todos los cursos
    //     $conexion = new Conexion();
    //     $sql = "SELECT * FROM tbl_curso";

    //     $read = $conexion->stm->prepare($sql);
    //     $read->execute();

    //     $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

    //     return $cursoobjeto;
    // }

    public function SaveLeccion()
    {
        // Esta funcion es para guardar las cursos en la base de datos
        $conexion = new Conexion();
        $sql = "INSERT INTO tbl_curso(imgurl_c, ctg_c, nombre_c, desc_c, id_usuario) values(?,?,?,?,?)";

        $insert = $conexion->stm->prepare($sql);
        $insert->bindParam(1, $this->imgurl_c);
        $insert->bindParam(2, $this->ctg_c);
        $insert->bindParam(3, $this->nombre_c);
        $insert->bindParam(4, $this->desc_c);
        $insert->bindParam(5, $this->id_usuario);
        $insert->execute();
        return;

    }

    public function DeleteSeccion()
    {
        // Esta función es para eliminar los cursos de la base de datos
        $id_c = $_GET['id_c'];
        $conexion = new Conexion();
        $sql = "DELETE FROM tbl_curso where id_c = '$id_c'";

        $delete = $conexion->stm->prepare($sql);
        $delete->execute();
    }

    public function ChangeLeccion($id_c, $imgurl_c, $img_c, $nombre_c, $desc_c)
    {
        // Esta función es para actualizar los cursos de la base de datos

        $conexion = new Conexion();
        $sql = "UPDATE tbl_curso set imgurl_c='$imgurl_c, nombre_c='$nombre_c', desc_c='$desc_c' where id_c = $id_c";

        $update = $conexion->stm->prepare($sql);
        $update->execute();
        return;
    }

    // public function PublicarCurso($id_c)
    // {
    //     // Esta función es para actualizar los cursos de la base de datos

    //     $conexion = new Conexion();
    //     $sql = "call publisCurso($id_c);";

    //     $update = $conexion->stm->prepare($sql);
    //     $update->execute();
    //     return;

    // }
}
// function showImageUploader' + accordionItemCount +'() {
//     let chooseContent = document.getElementsByClassName('chooseContent');
//     let imageContent = document.getElementsByClassName('imageContent');
//     // chooseContent[i].style.display = "none";
//     for (let i = 0; i < imageContent.length; i++) {
//         console.log(imageContent[i]);
//         imageContent[i].style.display = "block";
//     }
//     for (let a = 0; a < chooseContent.length; a++) {
//         chooseContent[a].style.display = "none";
//     }


//     const imgInput' + accordionItemCount +' = document.getElementById("img_secc' + accordionItemCount +'");
//     const imgLabel' + accordionItemCount +' = document.getElementById("img-secc-label' + accordionItemCount +'");
//     const imgPreview' + accordionItemCount +' = document.getElementById("img-secc-preview' + accordionItemCount +'");

//     imgInput' + accordionItemCount +'.addEventListener("change", function() {
//         getImgData' + accordionItemCount +'();
//     });

//     function getImgData' + accordionItemCount +'() {
//         const files = imgInput' + accordionItemCount +'.files[0];
//         if (files) {
//             const fileReader' + accordionItemCount +' = new FileReader();
//             fileReader' + accordionItemCount +'.readAsDataURL(files);
//             fileReader' + accordionItemCount +'.addEventListener("load", function() {
//                 imgPreview' + accordionItemCount +'.style.display = "block";
//                 imgLabel' + accordionItemCount +'.style.display = "none";
//                 imgPreview' + accordionItemCount +'.innerHTML = '<img src="' + this.result + '" width="200px"/>';
//             });
//         }
//     }

// }
