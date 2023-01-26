<?php include '../Inc/userheader.php'; ?>
<?php
    $cursoall =  new Curso();
    $id_u = $_SESSION['id_register'];
    // echo $id_u;
    $cursoallobj = $cursoall->CheckCursoAllFromDB();
?>

<main class="container-fluid" id="cursosViewer">
    <div class="row mt-5 text-center">
        <div class="col-12">
            <h2 class="fw-semibold">Explorar Cursos</h2>
        </div>
    </div>
    <div class="row mt-4 text-center d-flex justify-content-end">
        <div class="col-md-3 col-sm-5 my-2 dropdown">
            <button type="button" class="btn btn-primario dropdown-toggle p-3" data-bs-toggle="dropdown"
                data-bs-auto-close="outside" aria-expanded="false">Ordernar por <i class="fa-solid fa-filters"></i>
            </button>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <input type="checkbox" id="fecha_check" name="fecha_check">
                    <label for="fecha_check">Fecha</label>
                </li>
                <li class="dropdown-item">
                    <input type="checkbox" id="nombre_check" name="nombre_check">
                    <label for="nombre_check">Nombre</label>
                </li>
            </ul>
        </div>
    </div>

    <div class="row container-fluid text-center px-5 pb-4">
    <?php foreach ($cursoallobj as $ca) { ?>
        <article class="col-md-3 col-sm-12 my-2">
            <div class="container-fluid bg-light p-2 mx-2 rounded text-center">
            <a href="CursoController.php?curso=<?php echo $ca->id_c; $_SESSION['id_c'] = $ca->id_c;?>" class="row imgcontainer m-0 p-0 rounded">
                    <img src="<?php echo $ca->imgurl_c ?>" alt="imagen del curso" class="imgcurso p-0 rounded">
                </a>
                <a href="CursoController.php?curso=<?php echo $ca->id_c;?>" class="row text-start px-2 pt-2" style="text-decoration:none;">
                    <span class="text-break fw-bold">
                        <?php echo $ca->nombre_c ?>
                    </span>
                    <span class="text-break">
                        Lorem, ipsum.
                    </span>
                </a>
                </a>
            </div>
        </article>
        
        <?php } ?>
    </div>
    
</main>
<script src="../Public/Js/jquery-3.6.1.min.js"></script>
<script src="../Public/Js/app.js"></script>
<script>
    //Show Role Switch
    document.getElementById("cvswitch").classList.toggle("d-none");
    document.getElementById("rolecv").setAttribute("checked","checked");

</script>
<?php include '../Inc/userfooter.php' ?>