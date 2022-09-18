<?php
    include '../../Config/Conexion.php';
    $conexion = new Conexion();
    $sql = "SELECT * FROM cursos WHERE id_curso = 1";
    $read = $conexion->stm->prepare($sql);
    $read->execute();
    $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);
 ?>