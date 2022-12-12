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

    <div class="row text-center mt-4">
        <h2 class="fs-semibold">Creador de Cursos</h2>
        <h3 class="fs-semibold" id="sectionTitle">Datos Basicos</h3>
    </div>
    <!-- action="CursoController.php" method="post" -->
    <form id="form">
        <div class="row px-5 pb-5">
            <!-------------------- Seccion #2 -------------------->
            <section id="form-curso-2" class="mt-4">
                <div class="row pe-2">
                    <div>
                        <input type="hidden" name="action" value="insertar_seccion">
                        
                        <input type="hidden" name="seccion_count" id="seccion_count" value="">
                        <!-- <input type="hidden" name="editorContent"> -->
                        <input type="hidden" name="id_curso" value="<?php echo $_SESSION['id_c']; ?>">
                        <!-- <label for="img_c">Image de Portada del curso</label> -->
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="accordion" id="accordionContainer">
                            <!-- <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapse">
                                            <input type="text" name="titulo_secc"
                                            class="bg-light rounded border border-0" value="Introducción"
                                            placheholder="Mi nueva sección">
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-heading">
                                    <div class="accordion-body accordion-body-id1"> -->

                                        <!-- <div
                                            class="row tex-center flex-direction-center justify-content-center border p-4 mb-3 overflow-scroll acc-body">
                                            <div class="row text-center d-flex justify-content-center p-4">
                                                <div class="col-5">
                                                    <label for="titulo_lecc">Titulo de la Leccion</label>
                                                    <br>
                                                    <input type="text" name="titulo_lecc"
                                                        class="bg-light form-control form-control-sm"
                                                        placheholder="Mi nueva sección">
                                                </div>
                                            </div>
                                            <div class="row flex-direction-center justify-content-center chooseContent1"
                                                style="display:flex">
                                                <div class="col-2 d-flex justify-content-center">
                                                    <button type="button" class="btn-invisible" onclick="showImageUploader1()">
                                                        <i class="fa-solid fa-image"></i>
                                                        <br>
                                                        <small>Imagen</small>
                                                    </button>
                                                </div>
                                                <div class="col-2 tex-center d-flex justify-content-center">
                                                    <button type="button" class="btn-invisible">
                                                        <i class="fa-solid fa-video"></i>
                                                        <br>
                                                        <small>Video</small>
                                                    </button>
                                                </div>
                                                <div class="col-2 d-flex justify-content-center">
                                                    <button type="button" class="btn-invisible">
                                                        <i class="fa-solid fa-font"></i>
                                                        <br>
                                                        <small>Texto</small>
                                                    </button>
                                                </div>
                                            </div>
                                            <div
                                                class="row tex-center d-flex flex-direction-center justify-content-center">
                                                <div class="col-md-3">
                                                    <input type="file" name="img_secc1" id="img_secc1" accept="image/*"
                                                        style="opacity:0;position:absolute;top: -1000px;">
                                                    <label for="img_secc1"
                                                        style="height:100%; margin:auto;display: none;"
                                                        class="form-control text-center pt-4 hover imageContent1">
                                                        <div id="img-secc-preview1"></div>
                                                        <div id="img-secc-label1">
                                                            <img src="../Public/img/file-arrow-up-solid.svg"
                                                                alt="Botón Subir Archivo">
                                                            <br>
                                                            <span>
                                                                Elegir Archivo<br>
                                                            </span>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="col-md-7 imageContent1" style="display:none">
                                                    <span contenteditable>Click here to add a description</span>
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div id="editor1">
                                                    <p>Hello World!</p>
                                                </div>
                                            </div> 
                                        </div> -->
                                        <!-- Boton para añadir otra seccion -->
                                    <!-- </div>
                                    <div class="row justify-content-end mb-2">
                                        <div class="col-md-1 d-flex justify-content-center">
                                            <button type="button" class="btn text-center" onclick="addLeccion1()">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <ul class="list-group list-group-horizontal-xxl my-2">
                            <button type="button" class="list-group-item text-center" id="btnNuevaSeccion"
                                onclick="addSeccion()">
                                Nueva Sección<i class="fa-solid fa-plus"></i>
                            </button>
                        </ul>
                    </div>
            </section>
        </div>
        <div class="row mt-2 px-5 pb-5 text-center">
            <div class="col-md-6 col-sm-12">
                <a href="CursoController.php?action=start" type="button" class="btn bg-danger text-white">
                    Salir <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="col-md-6 col-sm-12">
                <button type="submit" class="btn btn-primario text-white">
                    Guardar Cambios <i class="fa-solid fa-check"></i>
                </button>
            </div>
        </div>
    </form>
    <div id="err" class="d-none">

    </div>
    <div id="si">

    </div>

    <!-- Jquery script -->
    <script src="../Public/Js/jquery-3.6.1.min.js"></script>
    
    <!-- Quill Text Rich JS -->
    <script src="//cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="//cdn.quilljs.com/1.0.0/quill.min.js"></script>
    
    <script src="../Public/Js/app.js"></script>
</main>

<?php include '../Inc/userfooter.php'; ?>