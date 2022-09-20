<?php
    
    class Curso{
        // include '../Config/Conexion.php';
        public function CheckCursoFromDB(){
            //Todos los cursos
            $conexion = new Conexion();
            $sql = "SELECT * FROM cursos";

            $read = $conexion->stm->prepare($sql);
            $read->execute();
            
            $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

            return $cursoobjeto;        
        }
    }
    


    // //Curso HTML5
    // $htmlsql = "SELECT * FROM cursos WHERE id_curso= 1";

    // $htmlread = $conexion->stm->prepare($htmlsql);
    // $htmlread->execute();
    
    // $htmlobj = $htmlread->fetchAll(PDO::FETCH_OBJ);


 ?>