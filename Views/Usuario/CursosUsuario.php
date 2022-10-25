<?php
include '../Inc/userheader.php';
// include '../Models/Curso.php';
$cursoall =  new Curso();
$cursoobj = $cursoall->CheckCursoAllFromDB();
?>
<div class="row container-fluid text-center p-5">
    <div class="col-md-6">
        <button class="btn btn-primary">
            New
        </button>
    </div>
    <div class="col-md-6 dropdown">
        <a href="#" class="btn bg-primario dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-autoclose="outside" role="button">Ordernar por</a>
        <div class="dropdown-menu">
                <label for="fecha_check">Fecha</label>
                <input type="checkbox" value="1">
                <input value="2">Nombre</input>
                <input value="3">plata</input>
            
        </div>
    </div>
     <!-- <div class="col">
        <label for="tema_curso">Categoria</label>
        <select multiple name="tema_curso" id="tema_curso" class="form-select">
            <option selected>Selecciona una opcion</option>
            <option value="1"></option>
            <option value="2"></option>
            <option value="3"></option>
        </select>
     </div>

        <div class="col dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-autoclose="outside">Idioma</a>
            <div class="dropdown-menu">
                <form class="p-4 m-0">
                    <div class="form-check">
                        <input type="checkbox" name="spanish" id="spanish" class="form-check-input">
                        <label for="spanish" class="form-check-label">Español</label>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="form-check">
                        <input type="checkbox" name="spanish" id="english" class="form-check-input">
                        <label for="english" class="form-check-label">Ingles</label>
                    </div>
                </form>
            </div>
        </div> -->

     <!-- <div class="col-md-4 form-floating">
        <input type="search" name="buscar_cursos" id="buscar_cursos" class="form-control" placeholder="p.eg Curso de Html">
        <label for="buscar_cursos">Busca algun curso</label>
     </div> -->
</div>

<div class="row container-fluid text-center p-5">
<?php foreach($cursoobj as $c){ ?>
    <article class="col-md-3 col-sm-12 my-2">
        <div class="container-fluid bg-light p-2 mx-2 rounded text-center">
            <a href="UsuarioController.php?curso=html5" class="row">
                <?php echo $c->img_c?>
            <a href="UsuarioController.php?curso=html5" class="row" style="text-decoration:none">
            <span>
                <?php echo $c->nombre_c?>
            </span>
            </a>
        </div>
    </article>
<?php }; ?>
</div>
<?php include '../Inc/userfooter.php' ?>