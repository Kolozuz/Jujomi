<?php include 'Inc/header.php';?>
<main class="container-fluid my-5">
<form novalidate>
    <div class="row justify-content-center fw-bold fs-2 px-2 py-2 mb-3">
        <div class="col-md-6 text-center">
            Recupera tu contraseña
        </div>
    </div>
    <div class="container" id="emailinput-container">   
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <div class="col-md-4 form-floating">
                <input type="email" name="email-pwdrecovery" id="email-pwdrecovery" class="form-control m-0" placeholder=" ">
                <label for="email-pwdrecovery">Escribe el correo electronico asociado a tu cuenta</label>
                <div class="invalid-feedback">
                    Debes escribir un correo electronico valido.
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <button type="button" class="btn bg-secundario" id="btn-send-code">
                Enviar Codigo de Recuperación
            </button>
        </div>
    </div>

    <div class="container d-none" id="codeinput-container">   
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <div class="col-md-4 form-floating">
                <input type="number" name="codereceived-pwdrecovery" id="codereceived-pwdrecovery" class="form-control m-0" placeholder=" ">
                <label for="codereceived-pwdrecovery">Escribe el codigo que enviamos a tu correo</label>
                <div class="invalid-feedback">
                    No coinciden los codigos.
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <button type="button" class="btn bg-secundario" id="btn-confirm-code">
                Confirmar
            </button>
        </div>
    </div>

    <div class="container d-none" id="newpwdinput-container">   
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <div class="col-md-4 form-floating">
                <input type="password" name="newpwd-pwdrecovery1" id="newpwd-pwdrecovery1" class="form-control m-0" placeholder=" ">
                <label for="newpwd-pwdrecovery">Escribe una nueva contraseña</label>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <div class="col-md-4 form-floating">
                <input type="password" name="newpwd-pwdrecovery2" id="newpwd-pwdrecovery2" class="form-control m-0" placeholder=" ">
                <label for="newpwd-pwdrecovery2">Confirma la nueva contraseña</label>
                <div class="invalid-feedback">
                    Las contraseñas no coinciden.
                </div>
            </div>
         </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <button type="button" class="btn bg-secundario" id="btn-confirm-pwd">
                Confirmar
            </button>
        </div>
    </div>
</form>
</main>
<script src="Public/Js/jquery-3.6.1.min.js"></script>
<script>
    var email_pwdrecovery = $("#email-pwdrecovery").val();
    let emailinput = $("#email-pwdrecovery");
    let codeinput = $("#codereceived-pwdrecovery");

    let emailinputcontainer = $("#emailinput-container");
    let codeinputcontainer = $("#codeinput-container");
    let newpwdinputcontainer = $("#newpwdinput-container");


    console.log(" // " + $("#email-pwdrecovery").val());

    $("#btn-send-code").click( function(){
        email_pwdrecovery = $("#email-pwdrecovery").val();
        $.ajax({
            type: "post",
            url: "Controllers/UsuarioController.php",
            data: {
                action: "pwdrecovery", 
                emailpwdrecovery: email_pwdrecovery, 
                subaction : "sendemail"
            },
          success: function (result) {
            
            //console.log(result + " // " + email_pwdrecovery);
            if(isNaN(result)) {
                emailinput.addClass("is-invalid")
                return
            }

            emailinputcontainer.addClass("d-none");
            codeinputcontainer.removeClass("d-none");
            swal("Codigo Enviado!", "Verifica tu Bandeja de Entrada" , "success");
   
          },
          error: function (xhr) {
            swal("Oops", "Algo salio mal :(", "error");
            alert(
                "Status del return -> " +
                xhr.status +
                "Status del return en txt -> " +
                xhr.statusText +
                " " +
                "Texto del return -> " +
                xhr.responseText)
          },
        });
    });

    
    $("#btn-confirm-code").click( function(){
        // email_pwdrecovery = $("#email-pwdrecovery").val();
        let codigoingresado = $("#codereceived-pwdrecovery").val();
        $.ajax({
            type: "post",
            url: "Controllers/UsuarioController.php",
            data: {
                action: "pwdrecovery", 
                emailpwdrecovery: email_pwdrecovery, 
                enteredcode: codigoingresado, 
                subaction : "confirmcode"
            },
            success: function (result) {
            console.log(result);
            if(result == "NO COINCIDEN LOS CODIGOS"){
                codeinput.addClass("is-invalid")
                return
            }
                codeinputcontainer.addClass("d-none");
                newpwdinputcontainer.removeClass("d-none");
            },
            error: function (xhr) {
            },
        });
    });

    $("#btn-confirm-pwd").click( function(){
        // var email_pwdrecovery = $("#email-pwdrecovery").val();
        let contrasenaingresada1 = $("#newpwd-pwdrecovery1").val();
        let contrasenaingresada2 = $("#newpwd-pwdrecovery2").val();
        $.ajax({
            type: "post",
            url: "Controllers/UsuarioController.php",
            data: {
                action: "pwdrecovery", 
                emailpwdrecovery: email_pwdrecovery, 
                newpwd1: contrasenaingresada1, 
                newpwd2: contrasenaingresada2, 
                subaction : "confirmpwd"
            },
            success: function (result) {
            //console.log("ESTE ES EL RESULT -> |" + result + "| <-");
                if(result == "CONTRASENA CAMBIADA CON EXITO"){
                    swal("Yay!", "Contraseña Cambiada con exito!", "success")
                    setTimeout(() => {
                        location.href = 'index.php';
                    }, 2000);
                }               

            },
            error: function (xhr) {
            },
        });
    });

</script>
<?php include 'Inc/footer.php';