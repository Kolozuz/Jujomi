<?php
include '../../Inc/userheader.php';
?>
    <div class="container-fluid p-5 text-center">
        <div class="row m-5">
            <div class="col">
                <h2>Configuración</h2>
            </div>
        </div>
        <div class="row fs-5">
            <div class="col-4"></div>
            <div class="col-2 form-check form-switch">
                <span>Cambiar el tema</span>
            </div>
            <div class="col-2 form-check form-switch  d-flex justify-content-center">
                <label class="switch shadow-sm">
                    <input type="checkbox" name="theme" id="theme">
                <span class="slider round"></span>
                </label>
                
            </div>
            <div class="col-4"></div>
        </div>
    </div>

<?php include '../../Inc/userfooter.php' ?>