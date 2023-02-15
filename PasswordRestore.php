<?php include 'Inc/header.php';?>
<main class="container-fluid my-5">
<form novalidate>
    <div class="container" id="emailinput-container">   
        <div class="row justify-content-center fw-bold fs-2 px-2 py-2 mb-3">
            <div class="col-md-6 text-center">
                Recupera tu contraseña
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <div class="col-md-4 form-floating">
                <input type="email" name="email-pwdrestore" id="email-pwdrestore" class="form-control m-0" placeholder=" ">
                <label for="email-pwdrestore">Escribe el correo electronico asociado a tu cuenta</label>
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
        <div class="row justify-content-center fw-bold fs-2 px-2 py-2 mb-3">
            <div class="col-md-6 text-center">
                Recupera tu contraseña
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <div class="col-md-4 form-floating">
                <input type="number" name="codereceived-pwdrestore" id="codereceived-pwdrestore" class="form-control m-0" placeholder=" ">
                <label for="codereceived-pwdrestore">Escribe el codigo que enviamos a tu correo</label>
                <div class="invalid-feedback">
                    Debes escribir un numero valido.
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center px-2 py-2">
            <button type="button" class="btn bg-secundario" id="btn-confirm-code">
                Confirmar
            </button>
        </div>
    </div>
</form>
</main>
<script src="Public/Js/jquery-3.6.1.min.js"></script>
<script>
    let emailinput = $("#email-pwdrestore")

    let emailinputcontainer = $("#emailinput-container")
    let codeinputcontainer = $("#codeinput-container")

    console.log(" // " + $("#email-pwdrestore").val());

    $("#btn-send-code").click( function(){
        var email_pwdrestore = $("#email-pwdrestore").val();
        $.ajax({
            type: "post",
            url: "Controllers/UsuarioController.php",
            data: {action: "pwdrestore", emailpwdrestore: email_pwdrestore, subaction : "sendemail"},
          success: function (result) {
            
            console.log(result + " // " + email_pwdrestore);
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
        $.ajax({
            type: "post",
            url: "Controllers/UsuarioController.php",
            data: {action: "pwdrestore", enteredcode: codigoingresado, newpwd: contraseñanueva},
            success: function (result) {
                
            },
            error: function (xhr) {
            },
        });
    });
</script>
<?php include 'Inc/footer.php';