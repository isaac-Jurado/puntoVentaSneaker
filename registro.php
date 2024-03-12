<?php

    require_once "clases/Conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();
    //! se esta validando que exista un usuario "LariCast"
    $sql = "SELECT * from usuarios where username = 'LariCast'";
    $result = mysqli_query($conexion,$sql);
    $validar = 0;
    if (mysqli_num_rows($result)>0) {

        header(("location:index.php"));
    }

?>

<!doctype html>
<html lang="es">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body id="backLoginRegister">
    <div class="container-fluid" id="padre">
        <div class="row" style="width: 100%;">
            <div class=" col-sm-4"></div>
            <div class="col-sm-4 registro">
                <div class="row">
                    <div class="col">
                        <form id="formularioRegistrar">
                            <!-- <div class="form-group"> -->

                            <label for="name">Nombre</label>
                            <input type="text" class="form-control input-sm" name="name" id="name" >
                            <br>
                            <label for="lastName">Apellido</label>
                            <input type="text" class="form-control input-sm" name="lastName" id="lastName" >
                            <br>
                            <label for="username">Username</label>
                            <input type="text" class="form-control input-sm" name="username" id="username" >
                            <br>
                            <label for="pass">Password</label>
                            <input type="password" class="form-control input-sm" name="pass" id="pass" >

                            <!-- </div> -->
                            <br>
                            <span class="btn btn-primary" id="registro">Registrar</span>
                            <a href="index.php" class="btn btn-warning">Regresar al Login</a>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="./librerias/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./js/funciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {

        $('#registro').click(function() {
            //! esta linea pide se use la funcion que esta en el archivo funciones.js
            //! para validar cuantos campos estan vacios 
            vacios = validarFormVacio('#formularioRegistrar');
           
            if (vacios > 0) {
                //! alert de que debe llenar los campos
                Swal.fire({
                    title: "Tienes "+vacios+ " campos vacios",
                    icon: "error"
                });
                return false;
            }
            datos = $('#formularioRegistrar').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "./procesos/regLogin/registrarUsuario.php",
                success: function(r) {
                    console.log(r)
                    if (r==1) {
                        //! alert de que si agrega con exito
                        Swal.fire({
                            title: "Agregado con exito",
                            icon: "success"
                        });
                    }else{
                        //! alert de que hubo un error
                        Swal.fire({
                            title: "No se pudo agregar 😥",
                            icon: "error"
                        });
                    }
                }
            });
        });
    });
</script>