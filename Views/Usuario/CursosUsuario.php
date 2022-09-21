<?php
include '../Inc/userheader.php';
include '../Models/Curso.php';
$curso =  new Curso();
$htmlobj = $curso->CheckCursoFromDB();
?>
<div class="row container-fluid text-center p-5">
<?php foreach($htmlobj as $c){ ?>
    <article class="col-md-3 col-sm-12 my-2">
        <div class="container-fluid bg-light p-2 mx-2 rounded">
            <a href="../Cursos/html5.php" class="row">
                <?php echo $c->img_curso?>
            <a href="../Cursos/html5.php" class="row" style="text-decoration:none">
            <span>
                <?php echo $c->nombre_curso?>
            </span>
            </a>
        </div>
    </article>
<?php }; ?>
</div>
<?php include '../Inc/userfooter.php' ?>