<?php
// include '../Models/Curso.php';
$cursomine =  new Curso();
$id_u = $_SESSION['id_register'];
// echo $id_u;
$cursoobj = $cursomine->CheckCursoFromDB($id_u);

if (isset($_GET['msg']) && $_GET['msg'] == 'successinsert') {
    // include_once '../Views/Usuario/PerfilUsuario.php';
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
        <strong>¡Nice!</strong> El curso fue creado con exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'successdel') {
    // include_once '../Views/Usuario/PerfilUsuario.php';
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
        <strong>¡Nice!</strong> El curso fue eliminado con exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}

if (isset($_GET['msg']) && $_GET['msg'] == 'successupdate') {
    // include_once '../Views/Usuario/PerfilUsuario.php';
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
        <strong>¡Nice!</strong> Los datos fueron actualizados con exito.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}
// var_dump($cursoobj);
if (empty($cursoobj)) {
    // include_once '../Views/Usuario/PerfilUsuario.php';
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
        <strong>¡Oops!</strong> No tienes ningún curso creado aun.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}
?>
<main class="container-fluid" id="cursosManager">
    <div class="row mt-5 text-center">
        <div class="col-12">
            <h2 class="fw-semibold">Administrador de Cursos</h2>
        </div>
    </div>
    <div class="row mt-4 text-center">
        <div class="col-md-3 col-sm-5 my-2">
            <a href="CursoController.php?action=crearCurso" class="btn btn-primario spin_animation fs-5 fw-bold p-3">
                <i class="fa-solid fa-plus"></i> Nuevo
            </a>
        </div>
        <div class="col-md-6 col-sm-1"></div>
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
    <!-- Seccion que sirve para mostrar los Cursos creados por el usuario, al igual que ciertas opciones -->
    <div class="row container-fluid text-center px-5 pt-3 pb-4">
        <?php foreach ($cursoobj as $c) { $estado_c =  $c->estado_c;?>
        <input type="hidden" class="cid" value="<?php echo $c->id_c; ?>">
        <article class="col-md-3 col-sm-12 my-2 ">
            <div
                class="container-fluid bg-light p-2 mx-2 rounded text-center div-hover contenedor-curso containerCurso">
                <div class="row container-fluid pt-1 pb-2 gx-0">
                    <div class="col-md-3 col-sm-12 px-2">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-pencil "></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                        href="CursoController.php?action=actualizarCurso&id=<?php echo $c->id_c; ?>">Actualizar
                                        Datos Basicos</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="CursoController.php?action=crearLecciones&id_curso=<?php echo $c->id_c; ?>">Crear Lecciones</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="CursoController.php?action=actualizarLecciones&id=<?php echo $c->id_c; ?>">Actualizar
                                        Lecciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-notch" style="color:
                                    <?php
                                        if($estado_c != 1) {
                                            echo 'orange;';
                                        }else{
                                            echo 'green';
                                        }
                                    ?>"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                        href="#"
                                        type="button">
                                        Privado
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="#"
                                        type="button">
                                        Publico
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" type="button" link="CursoController.php?action=actualizarCurso&id=<?php echo $c->id_c; ?>" id="sharebtn<?php echo $c->id_c; ?>" onclick="copyLink<?php echo $c->id_c; ?>()"> <i class="fa-solid fa-clipboard"></i> Copiar enlace </a>
                                    </li>
                                    <script>
                                        
                                        function copyLink<?php echo $c->id_c; ?>() {
                                            let sharebtn = document.getElementById('sharebtn<?php echo $c->id_c; ?>');
                                            let linkfield = document.createElement("input");
                                            linkfield.type = "text";
                                            linkfield.value = "http://localhost/deez/Jujomi/Controllers/CursoController.php?curso=<?php echo $c->id_c; ?>";
                                            linkfield.style.width = "100%";
                                            swal('Nice','Link copiado al portapapeles!', 'success', {content: linkfield});
                                            navigator.clipboard.writeText(linkfield.value);
                                        }
                                    </script>
                                </ul>
                            </div>
                            </a>
                        </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="dropdown">
                            <button class="btn px-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                        href="CursoController.php?action=borrarCurso&id=<?php echo $c->id_c; ?>"
                                        type="button">
                                        Eliminar Curso <i class="fa-solid fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <a href="CursoController.php?curso=<?php echo $c->id_c; $_SESSION['id_c'] = $c->id_c;?>" class="row clink">
                    <img src="<?php echo $c->imgurl_c ?>" alt="imagen del curso">
                </a>
                <a href="CursoController.php?curso=<?php echo $c->id_c;?>" class="row" style="text-decoration:none">
                    <span class="text-break">
                        <?php echo $c->nombre_c ?>
                    </span>
                </a>
            </div>
        </article>
        <?php }; ?>
    </div>
</main>
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
    <script src="../Public/Js/jquery-3.6.1.min.js"></script>
    <script src="../Public/Js/app.js"></script>

<script>
var estadoCurso = <?php echo $estado_c;?>;
var containerCurso = document.getElementsByClassName('containerCurso');

//Wanted to do this with javascript but didn't worked, so i had to do it with php itself
// console.log(estadoCurso);

// for (let i = 0; i < containerCurso.length; i++) {
//     console.log (estadoCurso[i]);

//     if (!estadoCurso == 1 ) {
//         containerCurso[i].style.outline = "dashed orange 1.5px" ;
//     }
//         containerCurso[i].style.outline = "dashed green 1.5px" ;

//     // containerCurso[i].style.outline=  "dashed green 1.5px" ;
// }
</script>