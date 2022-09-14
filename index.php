<?php include 'Inc/header.php' ?>

    <article class="container-fluid shadow-sm bg-space text-light">
        <div class="row my-4 p-5 d-flex text-center align-items-center">
                <div class="col-6">
                    <h2>Aprende a programar mientras te diviertes, es completamente gratis!</h2>
                </div>

                <div class="col-6 text-dark">
                    <div class="row py-4">
                        <div class="col">
                            <button class="btn bg-secundario">Comienza Ahora</button>
                        </div>
                    </div>
                    <div class="row py-4 text-start">
                        <div class="col form-floating p-0">
                            <input type="search" name="course_search" id="course_search" class="form-control bg-claro" placeholder="O busca nuestros cursos">
                            <label for="course_search">O busca nuestros cursos</label>
                        </div>
                    </div>
                </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-end align-items-center">
            <div class="col-6">
                <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="container-fluid p-0">
            </div>
            <div class="col-6">
                <h2>¿No sabes por donde empezar?</h2>
                <p>No te preocupes!, en Jujomi te brindamos distintas rutas de aprendizaje, para que elijas la que mas se acomode a tus objetivos</p>
            </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-start align-items-center">
            <div class="col-6">
                <h2>Aprende a tu manera!</h2>
                <p>Con nuestros cursos puedes ir a tu propio ritmo, estableciendo metas diarias que se ajusten a tu rutina</p>
            </div>
            <div class="col-6">
                <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="container-fluid p-0">
            </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-end align-items-center">
            <div class="col-6">
                <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="container-fluid p-0">
            </div>
            <div class="col-6">
                <h2>Trackea tu progreso</h2>
                <p>Por medio de nuestro sistema de experiencia, podras analizar tu progreso y seguir mejorando</p>
            </div>
        </div>
    </article>

    <article class="container-fluid">
        <div class="row m-4 d-flex text-start align-items-center">
            <div class="col-6">
                <h2>¡No estas solo!</h2>
                <p>Nuestro bot Jujomi te acompañara todo el tiempo, dandonte tips y motivandote a seguir aprendiendo</p>
            </div>
            <div class="col-6">
                <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="container-fluid p-0">
            </div>
        </div>
    </article>

<!-- <script>

    let user_area = document.getElementById("user_area");
    let cover = document.getElementById("cover");
    user_area.style.display = "none";
    cover.style.display = "none"

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

<?php include 'Inc/footer.php' ?>

