<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../app/templates/includes/links.php" ?>
    <link rel="stylesheet" type="text/css" href="js/script.js">
</head>

<body class="bg-blue">
    <?php include "../app/templates/includes/header.php"; ?>

    <div class="container-fluid pe-sm-5 ps-sm-5 mt-3">

        <div class="row border radio10 mb-4 text-center p-3">
            <h1 class="fs-1 text-white"><b>Crear Nuevo Paciente</b></h1>
        </div>

        <!-- CONTENT -------------------------------------------->
        <div class="row bg-blue radio10 border bg-white">

            <?php include "../app/templates/includes/aside_create.php"; ?>

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 pt-4 pe-sm-5">
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
                <form class="pe-3 ps-3" action="" method="POST">
                    <h2 class="fs-1 m-3 border-bottom">Examen Funcional</h2>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3">Datos Básicos</h3>
                        <?php
                        $datos = $_SESSION['datos'];
                        ?>
                        <div class="d-flex mb-2 flex-column flex-md-row m-1">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">FUR: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="date" class="form-control" name="fur" value="<?php echo $datos['FUR']; ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row m-1">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Características de la menstruacion:
                            </p>
                            <div class="col-12 col-md-7 col-lg-10 align-middle">
                                <input type="text" class="form-control" name="menstruacion" value="<?php echo $datos['menstruacion']; ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row m-1">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Micciones: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="micciones" value="<?php echo $datos['micciones']; ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row m-1">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Habitos Intestinales: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="intestinal" value="<?php echo $datos['habito_intestinal']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="ms-sm-5 me-sm-5 mb-5 p-3 text-end">
                        <button type="button" class="btn btn-secondary">Reset</button>
                        <button type="submit" name="save_continue" class="btn btn-success">Comprobar y continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include "../app/templates/includes/scripts.php"; 
    unset($_SESSION['datos']);?>


</body>

</html>