<?php
include '../Inc/userheader.php';
if (isset($_GET['error']) && $_GET['error'] == 'pwddoesnotmatch') {
    // include_once '../Views/Usuario/PerfilUsuario.php';
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
        <strong>Ups!</strong> La contraseña ingresada no coincide
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
}
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
                        <span><?php echo $_SESSION['username_login']; ?></span>
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
                        <span>
                            <input method="get" type="hidden" name="id_register" value="<?php echo $_SESSION['id_register']; ?>">
                        </span>
                    </div>
    
                    <div class="col-4"></div>
            </div>

            <div class="row text-start">
                <div class="col-4"></div>
                
                    <div class="col-2 ">
                        <span class="fw-semibold">Fecha de registro:</span>
                    </div>

                    <div class="col-2 text-end">
                        <span><?php echo $_SESSION['fecha_register'] . ' a las ' . $_SESSION['hora_register']; ?></span>
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
                <form action="UsuarioController.php?action=update" method="post" id="update_usuario" class="form-floating needs-validation" novalidate>
                    <!-- < class="container-fluid"> -->
                        <div class="row ms-5 me-5 form-floating mb-3">
                            <input type="hidden" name="id_u" value="<?php echo $_SESSION['id_register'] ?>">
                            <input type="email" class="form-control col" name="email_update" placeholder="Ingresa un Correo Electronico" value="<?php echo $_SESSION['email_register'] ?>" required>
                            <label for="email_register">Ingresa un Correo Electronico</label>
                            
                            <div class="invalid-feedback">
                                Debes escribir una nueva direccion de correo.
                            </div>
                        </div>

                        <div class="row ms-5 me-5 form-floating mb-3">
                            <input type="text" class="form-control col" name="username_update" placeholder="Ingresa un usuario" value="<?php echo $_SESSION['username_login'] ?>" required>
                            <label for="username_update">Ingresa un Nombre de Usuario</label>

                            <div class="invalid-feedback">
                                Debes escribir un nuevo nombre de usuario.
                            </div>
                        </div>

                        <div class="row ms-5 me-5 form-floating mb-3">
                            <input type="password" class="form-control col" name="password_update" placeholder="Contraseña" required>
                            <label for="password_login">Ingresa tu contraseña para confirmar los cambios</label>

                            <div class="invalid-feedback">
                                Debes escribir tu contraseña para confirmar los cambios
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="updateinput" class="btn btn-primary">Actualizar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../Public/Js/sweetalert.min.js"></script>
    <script>
        function borrarUsuario(id){
            swal({
            title: "¿Está seguro de que desea eliminar su cuenta y todo su progreso?¡ Esta acción no se puede revertir!",
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
                location.href = 'UsuarioController.php?action=delete&id=' + <?php echo $_SESSION['id_register'];?> ;}, 1500); 
            } else {
                swal("No se elimino la cuenta!");
            }
});
        }
    </script>
        
<?php include '../Inc/userfooter.php' ?>