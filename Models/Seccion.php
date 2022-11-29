<?php
include '../Config/Conexion.php';
class Seccion extends Curso
{
    protected $id_secc;
    protected $titulo_sec;
    protected $id_curso;

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

    public function SaveSeccion()
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

    public function ChangeSeccion($id_c, $imgurl_c, $img_c, $nombre_c, $desc_c)
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
