<?php
    include '../../Config/Conexion.php';
    $conexion = new Conexion();
    $sql = "SELECT * FROM cursos";
    $read = $conexion->stm->prepare($sql);
    $read->execute();
    $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);
 ?>