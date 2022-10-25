<?php
    include '../Config/Conexion.php';

    class Curso{
        protected $id_c;
        protected $nombre_C;
        protected $desc_c;
        protected $id_usuario;
        
        // include '../Config/Conexion.php';
        public function CheckCursoFromDB($id_u){
            $_SESSION['id_register'] = $id_u;
            $id_u = $_SESSION['id_register'];
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


        public function SaveCurso(){
            // Esta funcion es para guardar las cursos en la base de datos
            $conexion = new Conexion();
            $sql = "INSERT INTO tbl_curso(img_c, nombre_c, desc_c, id_usuario) values(?,?,?,?)";

            $insert = $conexion->stm->prepare($sql);
            $insert->bindParam(1,$this->img_c);
            $insert->bindParam(2,$this->nombre_c);
            $insert->bindParam(3,$this->desc_c);
            $insert->bindParam(4,$this->id_usuario);
            $insert ->execute();
            echo 'successssssssssss';
            return;
            
        }

        public function DeleteCurso(){
            // Esta funcion es para eliminar los cusros de la base de datos
            $id_c = $_GET['id_c'];
            $conexion = new Conexion();
            $sql = "DELETE FROM tbl_curso where id_c = '$id_c'";
            
            $delete = $conexion->stm->prepare($sql);
            $delete -> execute();
        }

        public function UpdateCurso($id_c,$img_c,$nombre_c,$desc_c){
            // Esta funcion es para actualizar los cusros de la base de datos

            $conexion = new Conexion();
            $sql = "UPDATE tbl_curso set img_c='$img_c', nombre_c='$nombre_c', desc_c='$desc_c' where id_c = $id_c";

            $update = $conexion ->stm->prepare($sql);
            $update->execute();
        }
}
 ?>