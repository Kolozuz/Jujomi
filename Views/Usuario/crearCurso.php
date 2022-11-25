<?php include '../Inc/userheader.php'; ?>
<main class="container-fluid">
    <div class="row text-center mt-4">
        <h2 class="fs-semibold">Creador de Cursos</h2>
    </div>
    <form action="CursoController.php" method="post" enctype="multipart/form-data">
        <div class="row px-5 pb-5">
            <div class="col"><span>Primero selecciona la categoría de tu curso</span>
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
            <div class="col pt-4">
                <button type="button" id="confirm" name="confirm" onclick="nextStep()"
                    class="btn btn-primario text-white" disabled>Confirmar</button>
            </div>
            <section id="form-curso" style="display: none;" class="mt-4">
                <div class="row pe-2">
                    <div class="col-md-4 col-sm-12">
                        <input type="hidden" name="action" value="insertar_curso">
                        <input type="file" name="img_c" id="img_c" accept="image/*"
                            style="opacity:0;position:absolute;top: -1000px;">
                        <label for="img_c" style="height:100%; margin:auto;"
                            class="form-control text-center pt-4 hover">
                            <div id="img-preview"></div>
                            <div id="img-label">
                                <img src="../Public/img/file-arrow-up-solid.svg" alt="Botón Subir Archivo">
                                <br>
                                <span>
                                    Elegir Archivo <br>
                                </span>
                                <span class="fst-italic">
                                    Tamaño recomendado 1280 x 720 píxeles
                                </span>
                            </div>

                        </label>
                    </div>
                    <div class="col-md-8 col-sm-12 ">
                        <div class="row form-floating">
                            <input type="text" class="form-control" id="titulo" name="nombre_c" placeholder="#"
                                required>
                            <label for="titulo">Dale un Titulo a tu curso</label>
                        </div>
                        <div class="row form-floating mt-3">
                            <input type="text" class="form-control " id="desc_c" name="desc_c" placeholder="#" required>
                            <label for="desc_c">Dale una descripción</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <input type="submit" value="Listo!!!" class="btn btn-primario text-white">
                </div>
            </section>
        </div>
    </form>
</main>
<script>
var formCurso = document.getElementById('form-curso');
var btnConfirm = document.getElementById('confirm');
var categoria = document.getElementById('ctg_c');

function nextStep() {
    if (formCurso.style.display == "none") {
        formCurso.style.display = "block";
    }
}
console.log(categoria.value)

function enableBtn() {
    if (categoria.value == "") {
        console.log('nothing selected, btn disabled');
        formCurso.style.display = "none";
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