<?php
    require '../Config/Conexion.php';
    class Usuario{
        protected $id_u;
        protected $email_u;
        protected $nombre_u;
        protected $contrasena_u;
        //Este model es el unico que se conecta a la db y guarda datos en ella
        
        public function SaveUsuario(){
            $conexion = new Conexion();
            $sql = "INSERT INTO usuario(email_u, nombre_u, contrasena_u) VALUES (?,?,?)";
            
            $insert = $conexion->stm->prepare($sql);
            $insert->bindParam(1,$this->email_u);
            $insert->bindParam(2,$this->nombre_u);
            $insert->bindParam(3,$this->contrasena_u);
            $insert->execute();
        }
        
        protected function CheckUsuarioFromDB(){
        $conexion = new Conexion();
            $sql = "SELECT * FROM usuario WHERE nombre_u='$this->nombre_u'";

            $usuario = $conexion->stm->prepare($sql); 
            $usuario->execute();
      
            $usuarioobjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
            return $usuarioobjeto;
        }
        
    }
?>
