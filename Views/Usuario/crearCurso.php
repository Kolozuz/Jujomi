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
        <div class="col">
            <button id="confirm" name="confirm" onclick="nextStep()" class="btn btn-primario"
                disabled>Confirmar</button>
        </div>



        <form action="#" method="post" id="form-curso" style="display: none;">
            <label for=""></label>
            <input type="text" class="form-control">
            <label for=""></label>
            <input type="text" class="form-control">
            <label for=""></label>
            <input type="text" class="form-control">
            <label for=""></label>
            <input type="text" class="form-control">
            <label for=""></label>
            <input type="text" class="form-control">
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