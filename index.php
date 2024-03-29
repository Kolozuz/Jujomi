<?php include 'Inc/header.php';?>
<main class="fs-5">
    <article class="container-fluid shadow-sm bg-space text-light">
        <div class="row my-4 p-5 d-flex text-center align-items-center">
                <div class="col-md-6 col-sm-12">
                    <h2> Aprende y enseña lo que quieras, ¡es completamente gratis! </h2>
                </div>

                <div class="col-md-6 col-sm-12 text-dark">
                    <div class="row py-4">
                        <div class="col">
                            <button class="btn bg-secundario" data-bs-toggle="modal" data-bs-target="#Registerpopup">Comienza Ahora</button>
                        </div>
                    </div>
                    <div class="row py-4 text-start">
                        <form action="">
                            <div class="col form-floating p-0 fs-6">
                                <input type="search" name="course_search" id="course_search" class="form-control bg-claro" placeholder="busca nuestros cursos">
                                <label for="course_search">O busca algun curso</label>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-end align-items-center">
            <div class="col-md-6 col-sm-12 text-center charachter_imgs">
                <img src="Public/img/character_1.jpg" alt="..." class="character_imgs rounded">
            </div>
            <div class="col-md-6 col-sm-12" id="div1">
                <h2>¿No sabes por donde empezar?</h2>
                <p>No te preocupes!, en Jujomi te brindamos distintas rutas de aprendizaje, para que elijas la que mas se acomode a tus objetivos</p>
            </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-start align-items-center">
            <div class="col-md-6 col-sm-12">
                <h2>Aprende a tu manera!</h2>
                <p>Con nuestros cursos puedes ir a tu propio ritmo, estableciendo metas diarias que se ajusten a tu rutina</p>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <img src="Public/img/character_2.jpg" alt="..." class="character_imgs rounded">
            </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-end align-items-center">
            <div class="col-md-6 col-sm-12 text-center">
                <img src="Public/img/character_4.jpg" alt="#" class="character_imgs rounded">
            </div>
            <div class="col-md-6 col-sm-12">
                <h2>Trackea tu progreso</h2>
                <p>Por medio de nuestro sistema de experiencia, podras analizar tu progreso y seguir mejorando</p>
            </div>
        </div>
    </article>

    <!-- <article class="container-fluid">
        <div class="row m-4 d-flex text-start align-items-center">
            <div class="col-md-6 col-sm-12">
                <h2>¡No estas solo!</h2>
                <p>Nuestro bot Jujomi te acompañara todo el tiempo, dandonte tips y motivandote a seguir aprendiendo</p>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <img src="Public/img/character_1.jpg" alt="..." class="character_imgs rounded">
            </div>
        </div>
    </article> -->

    <article class="container-fluid shadow-sm bg-space text-light px-1">
        <div class="my-4 p-5 text-center align-items-center">
                <div class="row py-4">
                    <h2>¿Que esperas?</h2>
                </div>

                <div class="row text-dark py-4">
                        <div class="col">
                            <button class="btn bg-secundario" data-bs-toggle="modal" data-bs-target="#Registerpopup">Empieza Ahora</button>
                        </div>
                </div>
        </div>
    </article>
</main>
<!-- <script>

    let user_area = document.getElementById("user_area");
    let cover = document.getElementById("cover");
    user_area.style.display = "none";
    cover.style.display = "none";

    function showlogin(){

        if(user_area.style.display === "none" && cover.style.display === "none"){
            user_area.style.display = "block"
            cover.style.display = "block"
        }
        else{
            
            if(user_area.style.display === "block"){
                user_area.style.display = "none"
                cover.style.display = "none"
            }
        }

    }

    function showregister(){

        if(register.style.display === "none"){
            register.style.display = "block"
            login.style.display = "none"
        }
    }

    let y = document.getElementById("login_credentials_usuario");
    let x = document.getElementById("login_credentials_admin");
    x.style.display = "none"
    
    function showusuario(){

        if(y.style.display === "none"){
            y.style.display = "block"
            x.style.display = "none"
        }

    }
    function showadmin(){

        if(x.style.display === "none"){
            x.style.display = "block"
            y.style.display = "none"
        }

    }
    function log_in(){

        let username = document.getElementById("username_login").value;
        let password = document.getElementById("password_login").value;
        (username == "cody@prototype.com" && password == 12345 ) 
        ? location.replace("chat/chat.html") : alert("El correo y/o contraseña son incorrectos, intente nuevamente")
    }
</script> -->
<?php include 'Inc/footer.php';
if (isset($_GET['err']) && $_GET['err'] == 'mismatch') {
    echo '
    <script>
        swal("Oops","Usuario y/o Contraseña incorrectos !","warning");
    </script>
    ';
}
if (isset($_GET['msg']) && $_GET['msg'] == 'pfdelsuccess') {
    echo '
    <script>
        swal(":(","Perfil Borrado con éxito!, nos entristece que te vayas","success");
    </script>
    ';
}
if (isset($_GET['msg']) && $_GET['msg'] == 'logoutsuccess') {
    echo '
    <script>
        let alertcontent = document.createElement("span");
        alertcontent.innerHTML = "Esperamos verte de nuevo pronto 😊";
        swal("Yay!","Sesión Cerrada con éxito!","success", {content: alertcontent});
    </script>
    ';
}

?>

