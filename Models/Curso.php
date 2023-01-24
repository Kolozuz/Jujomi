<?php
include '../Config/Conexion.php';
class Curso
{
    protected $id_c;
    protected $imgurl_c;
    protected $imgname_c;
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

    public function CheckCursoAllFromDB(){
        //Todos los cursos
        $conexion = new Conexion();
        $sql = "SELECT * FROM tbl_curso WHERE estado_c = 1";

        $read = $conexion->stm->prepare($sql);
        $read->execute();

        $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

        return $cursoobjeto;
    }

    public function SaveCurso()
    {
        // Esta funcion es para guardar las cursos en la base de datos
        $conexion = new Conexion();
        $sql = "INSERT INTO tbl_curso(imgurl_c, imgname_c, ctg_c, nombre_c, desc_c, id_usuario) values(?,?,?,?,?,?)";

        $insert = $conexion->stm->prepare($sql);
        $insert->bindParam(1, $this->imgurl_c);
        $insert->bindParam(2, $this->imgname_c);
        $insert->bindParam(3, $this->ctg_c);
        $insert->bindParam(4, $this->nombre_c);
        $insert->bindParam(5, $this->desc_c);
        $insert->bindParam(6, $this->id_usuario);
        $insert->execute();
        return;

    }

    public function RemoveCurso($id_c)
    {
        // Esta función es para eliminar los cursos de la base de datos
        // $id_c = $_GET['id'];
        $conexion = new Conexion();
        $sql = "DELETE FROM tbl_curso where id_c = '$id_c'";

        $delete = $conexion->stm->prepare($sql);
        $delete->execute();
    }

    public function ChangeCurso($id_c, $imgurl_c, $imgname_c, $ctg_c, $nombre_c, $desc_c)
    {
        // Esta función es para actualizar los cursos de la base de datos

        $conexion = new Conexion();
        $sql = "UPDATE tbl_curso set imgurl_c='$imgurl_c', imgname_c='$imgname_c', ctg_c='$ctg_c', nombre_c='$nombre_c', desc_c='$desc_c' where id_c = '$id_c'";
        echo $sql;
        $update = $conexion->stm->prepare($sql);
        $update->execute();
        return;
    }

    public function PublicarCurso($id_c)
    {
        // Esta función es para actualizar los cursos de la base de datos

        $conexion = new Conexion();
        $sql = "call publishCurso($id_c);";

        $update = $conexion->stm->prepare($sql);
        $update->execute();
        return;

    }
}
