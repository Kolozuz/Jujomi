<?php

class Conexion{
    public $stm;
    public function __construct(){
        try {
            $this->stm = new PDO('mysql:host=localhost;dbname=proyecto_jujomi','root','');
        }
        catch (PDOException $error) {
            echo 'Error en: -> ' . $error->getMessage();
        }
    }
}

?>