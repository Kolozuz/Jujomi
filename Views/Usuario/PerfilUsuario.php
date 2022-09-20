<?php
include '../Inc/userheader.php';
    // $id = $_GET['id'];
    // include 'conexion.php';
    // $conexion = new Conexion();
    // $conexion->__construct();
    // $sql = "SELECT * FROM usuario WHERE id_u= $id";
    // $read = $conexion->statement->prepare($sql);
    // $read->execute();
    // $personas = $read->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="container-fluid p-5 text-center">
        <div class="row m-5">
            <h2>Mi perfil</h2>
        </div>
        <div class="row">
            <div class="col">
                <span>Tu nombre de Usuario:</span>
            </div>
            <div class="col">
                <span><?php echo $_SESSION['username_login']; ?></span>
            </div>
        <div class="row">
            <div class="col">
                <span>Tu correo:</span>
            </div>
            <div class="col">
                <span><?php echo $_SESSION['email_register']; ?></span>
            </div>
        </div>
        </div>
    </div>

<?php include '../Inc/userfooter.php' ?>