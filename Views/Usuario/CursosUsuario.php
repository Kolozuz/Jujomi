<?php
include '../Inc/userheader.php';
// include '../Models/Curso.php';
$cursoall =  new Curso();
$htmlobj = $cursoall->CheckCursoAllFromDB();
?>
<div class="row container-fluid text-center p-5">
<?php foreach($htmlobj as $c){ ?>
    <article class="col-md-3 col-sm-12 my-2">
        <div class="container-fluid bg-light p-2 mx-2 rounded text-center">
            <a href="UsuarioController.php?curso=html5" class="row">
                <?php echo $c->img_curso?>
            <a href="UsuarioController.php?curso=html5" class="row" style="text-decoration:none">
            <span>
                <?php echo $c->nombre_curso?>
            </span>
            </a>
        </div>
    </article>
<?php }; ?>
</div>
<?php include '../Inc/userfooter.php' ?>