<?php
    include '../../Config/Conexion.php';

    $conexion = new Conexion();
    $sql = "SELECT * FROM cursos";

    $read = $conexion->stm->prepare($sql);
    $read->execute();
    
    $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

    $htmlsql = "SELECT * FROM cursos WHERE ";

    $htmlread = $conexion->stm->prepare($htmlsql);
    $htmlread->execute();
    
    $htmlobj = $htmlread->fetchAll(PDO::FETCH_OBJ);
 ?>