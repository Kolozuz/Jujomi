<?php 
include '../Inc/userheader.php'; 

$user = new Usuario;
$configarray = $user->checkConfig($_SESSION['id_register']);
foreach ($configarray as $configiteration) {

?>

    <div class="container-fluid p-5 text-center">
        <div class="row m-5">
            <div class="col">
                <h2>Bienvenido a la seccion de Preguntas Frecuentes</h2> 
            </div>
        </div>
        <div class="row fs-5">
            
        </div>
    </div>

<?php 
} 
include '../Inc/userfooter.php' 
?>
