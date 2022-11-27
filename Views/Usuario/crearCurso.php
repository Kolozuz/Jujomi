<?php include '../Inc/userheader.php'; ?>
<main class="container-fluid">

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
            <button href="#" class="btn btn-secundario" id="section-2" onclick="enableSection2()">
                <li>2</li>
            </button>
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
                        <!-- <label for="img_c">Image de Portada del curso</label> -->
                        <input type="file" name="img_c" id="img_c" accept="image/*"
                            style="opacity:0;position:absolute;top: -1000px;">
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
            <section id="form-curso-2" style="display: none;" class="mt-4">
                <div class="row pe-2">
                    <div>
                        <input type="hidden" name="action" value="insertar_curso">
                        <!-- <label for="img_c">Image de Portada del curso</label> -->
                    </div>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong> It is shown by
                                        default, until the collapse plugin adds the appropriate classes that we use to
                                        style each element. These classes control the overall appearance, as well as the
                                        showing and hiding via CSS transitions. You can modify any of this with custom
                                        CSS or overriding our default variables. It's also worth noting that just about
                                        any HTML can go within the <code>.accordion-body</code>, though the transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-horizontal-xxl">
                                <button class="list-group-item text-center">
                                    Nueva Sección<i class="fa-solid fa-plus"></i>
                                </button>
                            </ul>
                        </div>
                    </div>
            </section>
        </div>
        <div class="row mt-2 px-5 pb-5">
            <button type="submit" class="btn btn-primario text-white">
                Guardar Cambios <i class="fa-solid fa-check"></i>
            </button>
        </div>
    </form>

</main>
<script>
var sectionTitle = document.getElementById('sectionTitle');
var formCurso1 = document.getElementById('form-curso-1');
var formCurso2 = document.getElementById('form-curso-2');
var formCurso3 = document.getElementById('form-curso-3');
var btnConfirm = document.getElementById('confirm');
var categoria = document.getElementById('ctg_c');
var sectionCategoria = document.getElementById('sectionCategoria');

function enableSection1() {
    if (formCurso1.style.display == "none") {
        sectionTitle.innerHTML='Datos Basicos';
        sectionCategoria.style.display = "inherit";
        formCurso2.style.display = "none";
        if (categoria.value != "") {
            formCurso1.style.display = "block";
            // btnConfirm.setAttribute("disabled", "disabled");
        }
    }
}

function enableSection2() {
    if (formCurso2.style.display == "none") {
        sectionCategoria.style.display = "none";
        formCurso1.style.display = "none";
        formCurso2.style.display = "block";
        sectionTitle.innerHTML='Contenido';
    }
}

function nextStep() {
    if (formCurso1.style.display == "none") {
        formCurso1.style.display = "block";
    }
}

console.log(categoria.value)
console.log(sectionCategoria)

function enableBtn() {
    if (categoria.value == "") {
        console.log('nothing selected, btn disabled');
        formCurso1.style.display = "none";
        btnConfirm.setAttribute("disabled", "disabled");
    } else {
        btnConfirm.removeAttribute("disabled");
        console.log('button enabled');
        // console.log(categoria.value);
    }
    // if (!btnConfirm.attribute == "disabled") {
    //     btnConfirm.setAttribute("disabled");
    // }
}

const imgInput = document.getElementById("img_c");
const imgLabel = document.getElementById("img-label");
const imgPreview = document.getElementById("img-preview");

imgInput.addEventListener("change", function() {
    getImgData();
});

function getImgData() {
    const files = imgInput.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
            imgPreview.style.display = "block";
            imgLabel.style.display = "none";
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });
    }
}
</script>


<?php include '../Inc/userfooter.php'; ?>