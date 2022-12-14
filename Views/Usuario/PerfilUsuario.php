<?php
include '../Inc/userheader.php';

?>
    <div class="container-fluid">
        <div class="row py-4 mt-4 text-center">
            <h2 class="fw-semibold">Mi perfil</h2>
        </div>

        <div class="container-fluid py-4">
            <div class="row text-start">
                <div class="col-4"></div>
                
                    <div class="col-2 ">
                        <span class="fw-semibold">Tu nombre de Usuario:</span>
                    </div>

                    <div class="col-2 text-end">
                        <span><?php echo $_SESSION['username_register']; ?></span>
                    </div>

                <div class="col-4"></div>
            </div>

            <div class="row text-start">
                <div class="col-4"></div>
    
                    <div class="col-2">
                        <span class="fw-semibold">Tu correo:</span>
                    </div>
    
                    <div class="col-2 text-end">
                        <span><?php echo $_SESSION['email_register']; ?></span>
                    </div>
                    <div class="col-2 text-end">
                        <span><?php echo $_SESSION['id_register']; ?></span>
                    </div>
    
                    <div class="col-4"></div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid d-flex justify-content-center py-4">
        <div class="">
                <input type="button" value="Actualizar Datos" class="btn bg-success fw-semibold" data-bs-toggle="modal" data-bs-target="#Updatepopup">
                <input type="button" onclick="borrarUsuario()" value="Borrar Cuenta" class="btn bg-danger fw-semibold">
            </div>
        </div>
    </div>

    <div class="modal" id="Updatepopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Actualizacion de Datos</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                <form action="../../Controllers/UsuarioController.php" method="post" id="update_usuario" class="form-floating needs-validation" novalidate>
                    < class="container-fluid">
                        <div class="row ms-5 me-5 form-floating mb-3">
                            <input type="hidden" name="id_u" value="<?php echo $_SESSION['id_register'] ?>">
                            <input type="email" class="form-control col" name="email_update" placeholder="Ingresa un Correo Electronico" value="<?php echo $_SESSION['username_register'] ?>" required>
                            <label for="email_register">Ingresa un Correo Electronico</label>
                            
                            <div class="invalid-feedback">
                                Debes escribir una direccion de correo valida.
                            </div>
                        </div>

                        <div class="row ms-5 me-5 form-floating mb-3">
                            <input type="text" class="form-control col" name="username_update" placeholder="Ingresa un usuario" required>
                            <label for="username_update">Ingresa un Nombre de Usuario</label>

                            <div class="invalid-feedback">
                                Debes escribir un nombre de usuario valido.
                            </div>
                        </div>

                        <div class="row ms-5 me-5 form-floating mb-3">
                            <input type="password" class="form-control col" name="email_update" placeholder="Correo Electronico" required>
                            <label for="password_register">Ingresa una Contrase??a</label>

                            <div class="invalid-feedback">
                                Debes escribir un correo valido
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="Registerinput" class="btn btn-primary">Crear Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../Public/Js/sweetalert.min.js"></script>
    <script>
        let id;
        function borrarUsuario(id){
            swal({
            title: "??Est?? seguro de que desea eliminar su cuenta y todo su progreso??? Esta acci??n no se puede revertir!",
            text: "Una vez eliminado, no sera posible recuperarlo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Su cuenta fue borrada con exito", {
                icon: "success",
            });
            setTimeout(function () {
                location.href = 'UsuarioController.php?action=delete&id=' + id;}, 1500); 
            } else {
                swal("No se elimino la cuenta!");
            }
});
        }

    </script>
        
<?php include '../Inc/userfooter.php' ?>