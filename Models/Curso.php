<?php

    class Curso{
        // include '../Config/Conexion.php';
        public function CheckCursoFromDB(){
            //Todos los cursos
            $conexion = new Conexion();
            $sql = "SELECT * FROM cursos WHERE id_curso= 1"; 
            //La id NO puede ser fija, debe asignarse a una variable!!!!

            $read = $conexion->stm->prepare($sql);
            $read->execute();
            
            $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

            return $cursoobjeto;        
        }

        public function CheckCursoAllFromDB(){

            //Todos los cursos
            $conexion = new Conexion();
            $htmlsql = "SELECT * FROM cursos";
        
            $htmlread = $conexion->stm->prepare($htmlsql);
            $htmlread->execute();
            
            $htmlobj = $htmlread->fetchAll(PDO::FETCH_OBJ);
            return $htmlobj;
        }
    }
    

    


 ?>