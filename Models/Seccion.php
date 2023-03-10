<?php
// include '../Config/Conexion.php';
require '../Models/Leccion.php';

class Seccion extends Curso
{
    protected $id_secc;
    protected $titulo_secc;
    protected $titulo_lecc;
    protected $contenido_secc;
    protected $id_curso;

    // include '../Config/Conexion.php';
    public function CheckSeccionFromDB($id_c)
    {
        // $id_u = $_SESSION['id_register'];
        //Todos los cursos CREADOS POR EL USUARIO
        $conexion = new Conexion();
        $sql = "SELECT * FROM tbl_seccion WHERE id_curso = '$id_c'";
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

    public function SaveSeccion($titulo_secc, $titulo_lecc, $contenido_secc, $id_curso)
    {
        // Esta funcion es para guardar las cursos en la base de datos
        $conexion = new Conexion();
        // $sqlfk = "SET foreign_key_checks = 0;";
        $sql = "INSERT INTO tbl_seccion(titulo_secc, titulo_lecc, contenido_secc, id_curso) values('$titulo_secc','$titulo_lecc', '$contenido_secc','$id_curso')";

        // $insertfk = $conexion->stm->prepare($sqlfk);
        $insert = $conexion->stm->prepare($sql);
        // $insert->bindParam(1, $this->titulo_secc);
        // $insert->bindParam(2, $this->id_curso);
        // $insertfk->execute();
        $insert->execute();
        // die('SI LLEGA AQUI');

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
