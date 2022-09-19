<?php
include '../../Inc/userheader.php';
include '../../Models/Curso.php';
foreach($htmlobj as $c){
?>
    <div class="container-fluid">
        <div class="row m-4 d-flex align-items-center">
            <div class="col-4 me-5">
                <div class="container-fluid bg-light p-2 mx-2 rounded text-center">
                <img src="<?php echo'../Cursos/' . $c->url_img_curso . $c->img_curso ?>" alt="logo html">
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
include '../../Inc/userfooter.php'; ?>