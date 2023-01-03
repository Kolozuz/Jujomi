<?php
include '../Inc/userheader.php';
// include '../../Controllers/CursoController.php?action=showcursos';
// include '../Models/Usuario.php'; //Esto deberia ser Curso.php, NO Usuario.php!!!!

// $curso =  new Curso();
$id_c = $_GET['curso'];
$_SESSION['id_c'] = $id_c;
$seccioncontroller = new Seccion();
$seccobj = $seccioncontroller->checkSeccionfromDB($id_c);
$conexion = new Conexion();
    $sql = "SELECT * FROM tbl_curso WHERE id_c = '$id_c'";
    $read = $conexion->stm->prepare($sql);
    $read->execute();
    $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);
    // var_dump($seccobj);
?>

<div class="row container-fluid p-5 mx-0">
    <?php foreach ($cursoobjeto as $c) { ?>
    <article class="col-md-3 col-sm-12 bg-light rounded-start p-2">
        <span class="img-fix">
            <img src="<?php echo $c->imgurl_c ?>" alt="imagen del curso">
        </span>
    </article>
    <article class="col-md-9 col-sm-12 bg-light rounded-end p-5">
        <h2 class="text-break"><?php echo $c->nombre_c ?></h2>
        <p><?php echo $c->desc_c ?></p>
    </article>
</div>
<?php };?>
<div class="row container-fluid px-5 pb-5 mx-0 ">
    <?php foreach ($seccobj as $s) { ?>

    <article class="col-md-8 col-sm-12 accordion bg-white rounded pt-2">
        <div class="accordion-item">
                <div id="panelsStayOpen-collapseOnea<?php echo $s->id_secc?>" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOnea<?php echo $s->id_secc?>">
                    <div class="accordion-body">
                    <h4><?php echo $s->titulo_lecc  ?></h4>
                    <?php echo json_decode($s->contenido_secc)  ?>
                    </div>
                </div>
            </div>
    </article>
    <article class="col-md-4 col-sm-12">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne<?php echo $s->id_secc?>">
                        <h5><?php echo $s->id_secc?> . <?php echo $s->titulo_secc?></h5>
                    </button>
                </h2>
                <button id="panelsStayOpen-collapseOne<?php echo $s->id_secc?>" class="accordion-collapse collapse show bg-white" style="border: none; width: 100%;"
                    aria-labelledby="panelsStayOpen-headingOne<?php echo $s->id_secc?>" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOnea<?php echo $s->id_secc?>" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOnea<?php echo $s->id_secc?>">
                    <div class="accordion-body">
                    <?php echo $s->titulo_lecc ?>
                    </div>
                </button>
            </div>
        </div>
    </article>
    <?php };?>
</div>
</div>
<?php include '../Inc/userfooter.php'; ?>