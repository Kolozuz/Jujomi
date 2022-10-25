<?php
    include '../Config/Conexion.php';

    class Curso{
        protected $id_c;
        protected $nombre_C;
        protected $desc_c;
        protected $id_usuario;
        
        // include '../Config/Conexion.php';
        public function CheckCursoFromDB(){
            //Todos los cursos CREADOS POR EL USUARIO
            $conexion = new Conexion();
            $sql = "SELECT * FROM tbl_cursos WHERE id_curso = 1"; 
            //La id NO puede ser fija, debe asignarse a una variable!!!!

            $read = $conexion->stm->prepare($sql);
            $read->execute();
            
            $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

            return $cursoobjeto;        
        }

        public function CheckCursoAllFromDB(){
            //Todos los cursos
            $conexion = new Conexion();
            $sql = "SELECT * FROM tbl_cursos"; 

            $read = $conexion->stm->prepare($sql);
            $read->execute();
            
            $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

            return $cursoobjeto;        
        }


        public function SaveCurso(){
            // Esta funcion es para guardar las cursos en la base de datos
            $conexion = new Conexion();
            $sql = "INSERT INTO tbl_cursos(img_c, nombre_c, desc_c, id_usuario) values(?,?,?,?)";

            $insert = $conexion->stm->prepare($sql);
            $insert->bindParam(1,$this->img_c);
            $insert->bindParam(2,$this->nombre_c);
            $insert->bindParam(3,$this->desc_c);
            $insert->bindParam(4,$this->id_usuario);
            $insert ->execute();
            return;
            
        }

        public function DeleteCurso(){
            // Esta funcion es para eliminar los cusros de la base de datos
            $conexion = new Conexion();
            $sql = "DELETE FROM tbl_cursos where id_curso = $id_curso";
            
            $delete = $conexion->stm->prepare($sql);
            $delete -> execute();
        }

        public function UpdateCurso(){
            // Esta funcion es para actualizar los cusros de la base de datos
            $conexion = new Conexion();
            $sql = "UPDATE tbl_cursos set img_c='$img_c', nombre_c='$nombre_c', desc_c='$desc_c' where id_curso = $id_curso";

            $update = $conexion ->stm->prepare($sql);
            $update->execute();
        }
}
 ?>