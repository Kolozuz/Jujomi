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
    <script src="../Public/Js/jquery-3.6.1.min.js"></script>
    <script>
        var themestatus = <?php echo $configiteration->dark_mode?>;
        if (themestatus == 1){
        $('#themeslider').attr("checked","checked");
        }

        // Toggle Webpage Theme
        function toggleDarkMode(id_usr) {
            var currentThemePrimario = document.getElementsByClassName('bg-primario');
            var currentThemeClaro = document.getElementsByTagName('main');

            for (let i = 0; i < currentThemePrimario.length; i++) {
                $(".bg-primario").toggleClass("bg-oscuro");
                $(".bg-primario").toggleClass("text-white");
                $("#navbar_brand").toggleClass("text-white");
                $("main").toggleClass("bg-claro");
                $("main").toggleClass("bg-gris");
                $("main").toggleClass("text-white");
                console.log("cambio VISUAL no DB");
            }

            let newthemevalue = themestatus == 1 ? 0 : 1 ;
            $.ajax({
                type: "POST",
                url: "UsuarioController.php",
                cache: false,
                data: {
                    action: "toggleTheme",
                    id_usr: id_usr,
                    newthemevalue: newthemevalue,
                },
                success: function (){
                    swal("Yay!", "Cambios guardados con exito", "success")
                    themestatus = themestatus == 1 ? 0 : 1 ;
                },
                error: function (xhr) {
                    swal("Oops", "Algo salio mal :(","error");
                    $err.innerHTML += "Status del return -> "  + xhr.status +
                    "Status del return en txt -> "  + xhr.statusText +
                    " " +
                    "Texto del return -> "  + xhr.responseText;
                    $err.removeClass("d-none");
                },
            })
        };
    </script>
    <script src="../Public/Js/app.js"></script>

    <?php
    }
    include '../Inc/userfooter.php' 
    ?>