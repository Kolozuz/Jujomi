<?php
include '../../Inc/userheader.php';
include '../../Config/Conexion.php';
    $id = $_GET['id'];
    include 'conexion.php';
    $conexion = new Conexion();
    $conexion->__construct();
    $sql = "SELECT * FROM usuario WHERE id_u= $id";
    $read = $conexion->statement->prepare($sql);
    $read->execute();
    $personas = $read->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach($personas as $c){ ?>

    <div class="container-fluid p-5 text-center">
        <div class="row m-5">
            <h2>Mi perfil</h2>
        </div>
        <div class="row">
            <span>Nombre de Usuario:</span>
            <input type="hidden" name="id" value="<?php echo $c->nombre_u?>">
                <span><?php echo $c->nombre_u?></span>
        </div>
    </div>



<?php }; ?>
<?php include '../../Inc/userfooter.php' ?>