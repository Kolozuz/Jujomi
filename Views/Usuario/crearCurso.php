<?php include '../Inc/userheader.php'; ?>

<main class="container-fluid">
    <div class="row text-center mt-4">
        <h2 class="fs-semibold">Creador de Cursos</h2>
    </div>
    <div class="row p-5">
        <div class="col"><span>Primero selecciona la categoría de tu curso</span>
            <select name="categoría_curso" id="categoria_curso" class="form-select" oninput="enableBtn()">
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
            <button id="confirm" name="confirm" onclick="nextStep()" class="btn btn-primario text-white"
                disabled>Confirmar</button>
        </div>

        <form action="#" method="post" id="form-curso" style="display: none;" class="mt-4">
        <div class="row">
            <div class="col-md-2 col-sm-12 form-floating mt-3">
                <input type="file" class="form-control" id="titulo" placeholder="Ingresa el titulo">
                <label for="titulo" class="px-4">Ingresa el titulo</label>
            </div>
            <div class="col-md-8 col-sm-12 form-floating mt-3">
                <input type="text" class="form-control" id="titulo" placeholder="Ingresa el titulo">
                <label for="titulo" class="px-4">Dale una descripcion</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-3">
                <input type="text" class="form-control" id="titulo" placeholder="Ingresa el titulo">
                <label for="titulo" class="px-4"></label>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Listo!!!" class="btn btn-primario text-white">
        </div>
        </form>
    </div>
</main>
<script>
    var formCurso = document.getElementById('form-curso');
    var btnConfirm = document.getElementById('confirm');
    var categoria = document.getElementById('categoria_curso');
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
        }
        else {
            btnConfirm.removeAttribute("disabled");
            console.log('button enabled');
            // console.log(categoria.value);
        }
        // if (!btnConfirm.attribute == "disabled") {
        //     btnConfirm.setAttribute("disabled");
        // }


    }
</script>

<?php include '../Inc/userfooter.php'; ?>