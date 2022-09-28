<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../app/templates/includes/links.php" ?>

</head>

<body class="bg-blue">
    <?php include "../app/templates/includes/header.php"; ?>

    <div class="container-fluid pe-sm-5 ps-sm-5 mt-3">

        <div class="row radio10 border text-white p-2">
            <div class="align-middle p-2">
                <h1 class="fs-1 text-center"><b>Crear Usuario</b></h1>
            </div>
        </div>

        <div class="row bg-blue radio10 border bg-white pe-3 mt-3">
            <!-- CONTENT -------------------------------------------->
            <div class="col-12">
                <!-- imprimo errores-->
                <?php 
                if ($error) {
                    echo '<div class="alert alert-danger m-0" role="alert">';
                    echo '- No se pudo insertar los datos del nuevo usuario. Los siguientes campos no poseen el formato correcto:<br>';
                    foreach ($validaciones->mensaje as $key => $value) {
                        echo $key . "-> " . $value[0] ."<br>";
                    }
                    echo '</div>';
                }
                ?>

                <h2 class="fs-1 ms-sm-3 mt-2 mb-2 p-2 ">Datos Personales</h2>

                <div class="ms-sm-5 mb-5 px-5">

                <form class="pe-3 ps-3" action="" method="POST">
                <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Nombre: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="nombre" class="form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Primer Apellido: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="apellido1" class=" form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Segundo apellido: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="apellido2" class=" form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Sexo: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            H <input type="radio" class="" name="genero" value="h">
                            M <input type="radio" class="" name="genero" value="m">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Fecha Nacimiento:</p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="date" name="borndate" class="form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Direccion: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="direction" class=" form-control" value="">
                        </div>
                    </div>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">DNI: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="dni" class=" form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Usuario: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="usuario" class=" form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Contraseña: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="contrasena" class=" form-control" value="">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Rol: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" name="rol" class=" form-control" value="">
                        </div>
                    </div>
                    <div class="ms-sm-5 me-sm-5 mb-5 p-3 text-end">
                        <button type="button" class="btn btn-secondary">Reset</button>
                        <button type="submit" name="agregar_paciente" class="btn btn-success">Agregar Usuario</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
    <?php include "../app/templates/includes/scripts.php" ?>
</body>

</html>