<?php
    include '../Inc/userheader.php';
    $user = new Usuario;
    $configarray = $user->checkConfig($_POST['id_usr']);
    foreach ($configarray as $configiteration) {
?>

<main class="container-fluid p-5 text-center bg-claro">
    <div class="row m-5">
        <div class="col">
            <h2>Configuración</h2>
        </div>
    </div>
    <div class="row fs-5">
        <div class="col-4"></div>
        <div class="col-2">
            <span>Cambiar el tema</span>
        </div>
        <div class="col-2 form-check form-switch d-flex justify-content-center">
            <label class="switch shadow-sm">
                <input type="checkbox" name="themeslider" id="themeslider" onclick="toggleDarkMode(<?php echo $_POST['id_usr'];?>)">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="col-4"></div>
    </div>
</main>

<?php
}
include '../Inc/userfooter.php' 
?>