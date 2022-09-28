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
                <form class="pe-3 ps-3" action="" method="POST">
                    <h2 class="fs-1 m-3 border-bottom">Diagnostico y Plan</h2>
                    <?php
                    $datos = $_SESSION['datos'];
                    ?>
                    <div class="ms-sm-5 mb-5 p-3">
                        <div class="d-flex mb-2 flex-column flex-md-row m-1">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Diagnostico: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <textarea class="w-100" name="diagnostico" value="<?php echo $datos['diagnostico'] ?>"></textarea>
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row m-1">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Plan: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <textarea class="w-100" name="plan" value="<?php echo $datos['plan'] ?>"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ms-sm-5 me-sm-5 mb-5 p-3 text-end">
                        <button type="button" class="btn btn-secondary">Reset</button>
                        <button type="submit" name="guardar_historia" class="btn btn-success">Guardar historia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include "../app/templates/includes/scripts.php"; ?>


</body>

</html>