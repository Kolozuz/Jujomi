<?php
include '../Inc/userheader.php';
// include '../../Controllers/CursoController.php?action=showcursos';
// include '../Models/Usuario.php'; //Esto deberia ser Curso.php, NO Usuario.php!!!!
$curso =  new Curso();
$htmlobj = $curso->CheckCursoFromDB();
foreach($htmlobj as $c){
?>
    <div class="container-fluid">
        <div class="row m-4 d-flex align-items-center">
            <div class="col-4 me-5">
                <div class="container-fluid bg-light p-2 mx-2 rounded text-center">
                <?php echo $c->img_curso ?>
                </div>
            </div>
            <div class="col-7">
                <h2><?php echo $c->nombre_curso;?></h2>
                <p><?php echo $c->desc_curso;?></p>
            </div>
        </div>
    </div>
<?php
};
include '../Inc/userfooter.php'; ?>