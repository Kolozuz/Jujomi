<?php
include '../Inc/userheader.php';
// include '../../Controllers/CursoController.php?action=showcursos';
// include '../Models/Usuario.php'; //Esto deberia ser Curso.php, NO Usuario.php!!!!

// $curso =  new Curso();
$id_c = $_GET['curso'];
$conexion = new Conexion();
    $sql = "SELECT * FROM tbl_curso WHERE id_c = '$id_c'";
    $read = $conexion->stm->prepare($sql);
    $read->execute();
    $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row container-fluid p-5 mx-0">
    <?php foreach ($cursoobjeto as $c) { ?>
    <article class="col-md-3 bg-light rounded p-2">
        <span class="img-fix">
            <img src="<?php echo $c->imgurl_c ?>" alt="imagen del curso" >
        </span>
    </article>
    <article class="col-md-9 p-5">
            <h3><?php echo $c->nombre_c ?></h3>
            <p><?php echo $c->desc_c ?></p>
    </article>
</div>
<?php };?>
</div>
<?php include '../Inc/userfooter.php'; ?>