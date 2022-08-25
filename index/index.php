<?php include('../Inc/header.php') ?>

    <div class="container-fluid shadow-sm mt-4 bg-oscuro">
        <article id="carousel" class="container-fluid carousel slide" data-interval="3000" data-bs-ride="carousel">
            <div class="carousel-inner p-2">
                <div class="carousel-item active">
                    <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://th.bing.com/th/id/OIP.s6zSNqXhqNgBYlU7UKQMOgHaD2?pid=ImgDet&rs=1" alt="..." class="d-block w-100">
                </div>
            </div>
        </article>
    </div>

    <article class="m-5">
        <p>La verdad es que cuando por ejemplo, entonces tambien pensamos el porque pero aveces depronto y asi. Un sitio en el que el aburrimiento no tiene lugar consectetur adipiscing elit. Cras vitae egestas diam. Donec vehicula luctus ipsum, ac feugiat lectus ullamcorper non. Duis condimentum ultrices sem, quis vulputate metus sollicitudin nec. Praesent faucibus risus non ex dictum consectetur. Duis enim urna, rutrum a odio dictum, consectetur placerat lectus. Etiam porta libero eu arcu hendrerit eleifend. Nullam laoreet mollis est eu egestas.</p>
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

<?php include('../Inc/footer.php') ?>

