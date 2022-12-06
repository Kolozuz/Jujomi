<?php
include '../Inc/userheader.php';
$cursoall =  new Curso();
$id_u = $_SESSION['id_register'];
// echo $id_u;
$cursoobj = $cursoall->CheckCursoFromDB($id_u);
// $cursoobj as $c;

// $conexion = new Conexion();
// $sql = "SELECT * FROM tbl_curso WHERE ID";

// $read = $conexion->stm->prepare($sql);
// $read->execute();
// $cursoobjeto = $read->fetchAll(PDO::FETCH_OBJ);

?>

<main class="container-fluid" id="main">

    <ul class="row link-dark d-flex text-center list-unstyled flex-direction-center justify-content-center gx-1 my-5">
        <div class="col-1">
            <button href="#" class="btn">
                <li><i class="fa-solid fa-angle-left"></i>
                <li>
            </button>
        </div>
        <div class="col-1 ">
            <button href="#" class="btn btn-secundario" id="section-1" onclick="enableSection1()">
                <li>1</li>
            </button>
        </div>
        <div class="col-1">
            <a href="CursoController.php?action=insertar_curso" class="btn btn-secundario" id="section-2">
                <li>2</li>
            </a>
        </div>
        <div class="col-1">
            <button href="#" class="btn btn-secundario" id="section-3" onclick="enableSection3()">
                <li>3</li>
            </button>
        </div>
        <div class="col-1">
            <button href="#" class="btn">
                <li><i class="fa-solid fa-angle-right"></i>
                <li>
            </button>
        </div>
    </ul>

    <div class="row text-center mt-4">
        <h2 class="fs-semibold">Creador de Cursos</h2>
        <h3 class="fs-semibold" id="sectionTitle">Datos Basicos</h3>
    </div>
    <form action="CursoController.php" method="post" enctype="multipart/form-data">
        <div class="row px-5 pb-5">
            <div class="row" id="sectionCategoria">
                <div class="col-md-5"><span>Primero selecciona la categoría de tu curso</span>
                    <select name="ctg_c" id="ctg_c" class="form-select" oninput="enableBtn()">
                        <option value="">-- Selecciona una opción --</option>
                        <option value="Cocina">Cocina</option>
                        <option value="Ciencia">Ciencia</option>
                        <option value="Dibujo">Dibujo</option>
                        <option value="Filosofía">Filosofía</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Fotografía y Video">Fotografía y Video</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Matemática">Matemática</option>
                        <option value="Música">Música</option>
                        <option value="Ofimática">Ofimática</option>
                        <option value="Programación">Programación</option>
                        <option value="Videojuegos">Videojuegos</option>
                    </select>
                </div>
                <div class="col-md-2 pt-4">
                    <button type="button" id="confirm" name="confirm" onclick="nextStep()"
                        class="btn btn-primario text-white" disabled>Confirmar</button>
                </div>
            </div>
            <!-------------------- Seccion #1 -------------------->
            <section id="form-curso-1" style="display: none;" class="mt-4">
                <div class="row pe-2">
                    <div class="col-md-4 col-sm-12">
                        <input type="hidden" name="action" value="insertar_curso">
                        <input type="hidden" name="id_curso" value="<?php //$c->id_u ?>;">
                        
                        <!-- <label for="img_c">Image de Portada del curso</label> -->
                        <input type="file" name="img_c" id="img_c" accept="image/*"
                            style="opacity:0;position:absolute;top: -1000px;" onclick="imgpreview()">
                        <label for="img_c" style="height:100%; margin:auto;"
                            class="form-control text-center pt-4 hover">
                            <div id="img-preview"></div>
                            <div id="img-label">
                                <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo">
                                <br>
                                <span>
                                    Elegir Imagen Portada<br>
                                </span>
                                <span class="fst-italic">
                                    Tamaño recomendado 1280 x 720 píxeles
                                </span>
                            </div>

                        </label>
                    </div>
                    <div class="col-md-8 col-sm-12 ">
                        <div class="row">
                            <label for="titulo">Dale un Titulo a tu curso</label>
                            <input type="text" class="form-control" id="titulo" name="nombre_c"
                                placeholder="P.ej Principios Basicos HTML" required>
                        </div>
                        <div class="row mt-3">
                            <label for="desc_c">Dale una descripción</label>
                            <input type="text" class="form-control " id="desc_c" name="desc_c"
                                placeholder="P.ej En este curso aprenderas..." required>
                        </div>
                    </div>
                </div>
            </section>
            <!-------------------- Seccion #2 -------------------->
            
        </div>
        <div class="row mt-2 px-5 pb-5">
            <button type="submit" class="btn btn-primario text-white">
                Guardar Cambios <i class="fa-solid fa-check"></i>
            </button>
        </div>
    </form>

</main>
<script src="../Public/Js/app.js"></script>
<script src="../Public/Js/jquery-3.6.1.min.js"></script>
<?php include '../Inc/userfooter.php'; ?>