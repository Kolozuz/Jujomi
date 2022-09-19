<?php
    $id = $_GET['id'];
    include 'conexion.php';
    $conexion = new Conexion();
    $conexion->db_connect();
    $sql = "SELECT * FROM tbl_persona WHERE id_persona=$id";
    $read = $conexion->statement->prepare($sql);
    $read->execute();
    $personas = $read->fetchAll(PDO::FETCH_OBJ);

?>