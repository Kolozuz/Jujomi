<?php
    include '../Config/Conexion.php';
    // include '../../Config/Conexion.php';

    // $nombre = $_POST['username_login'];

    // $conexion = new Conexion();
    //         $sql = "SELECT * FROM usuario WHERE nombre_u = '$nombre'";

    //         $usuario = $conexion->stm->prepare($sql); 
    //         $usuario->execute();
      
    //         $usuarioobjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
    //         return $usuarioobjeto;

    class Usuario{
        protected $id_u;
        protected $email_u;
        protected $nombre_u;
        protected $contrasena_u;
        //Este model es el unico que se conecta a la db y guarda datos en ella
        
        public function SaveUsuario(){
            $conexion = new Conexion();
            $sql = "INSERT INTO tbl_usuario(email_u, nombre_u, contrasena_u) VALUES (?,?,?)";
            
            $insert = $conexion->stm->prepare($sql);
            $insert->bindParam(1,$this->email_u);
            $insert->bindParam(2,$this->nombre_u);
            $insert->bindParam(3,$this->contrasena_u);
            $insert->execute();
            return;
        }
        
        protected function CheckUsuarioFromDB(){
        $conexion = new Conexion();
            $sql = "SELECT * FROM tbl_usuario WHERE nombre_u='$this->nombre_u'";

            $usuario = $conexion->stm->prepare($sql); 
            $usuario->execute();
      
            $usuarioobjeto = $usuario->fetchAll(PDO::FETCH_OBJ);
            // if ($usuarioobjeto){
                return $usuarioobjeto;
            // }
        //     else{
        //         var_dump($usuarioobjeto);

        //         session_destroy();
        //         die ('No te encuentras registrado en Jujomi');
        //         return $usuarioobjeto;

        //     }
        }

        protected function UpdateUsuario($id_u,$nombre_u,$email_u){
            $conexion = new Conexion();
            
            $sql = "UPDATE tbl_usuario SET nombre_u='$nombre_u', email_u='$email_u' WHERE id_u = '$id_u'";

            $update = $conexion->stm->prepare($sql);
            $update->execute();

            $personas = $update->fetchAll(PDO::FETCH_OBJ);
            
            return $personas;
        }

        protected function DeleteUsuario(){
            $conexion = new Conexion();
            // $usuarioinfo = $this->CheckUsuarioFromDB();
            // foreach ($usuarioinfo as $usuario_u){}
            
            $id_u = $_GET['id'];
            
            $sql = "DELETE FROM tbl_usuario WHERE id_u = '$id_u'";

            $delete = $conexion->stm->prepare($sql);
            $delete->execute();

            
            return $delete;

            // $personas = $delete->fetchAll(PDO::FETCH_OBJ);
            // return $personas;
        }
    }
?>
