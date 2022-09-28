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

        <div class="row border radio10 mb-4 text-center p-3">
            <h1 class="fs-1 text-white"><b>Crear Nuevo Paciente</b></h1>
        </div>

        <!-- CONTENT -------------------------------------------->
        <div class="row bg-blue radio10 border bg-white">

            <?php include "../app/templates/includes/aside_create.php"; ?>

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 pt-4 pe-sm-5">
                <div class="alert alert-primary" role="alert">
                    Recuerda: Podras navegar por los distintos formularios pero los datos no se guardaran hasta que sean comprobados. Ademas debes culminar todas las fichas para guardar los datos de forma permanente
                </div>

                <h2 class="fs-1 m-3">Datos Personales</h2>

                <form class="pe-3 ps-3" action="" method="POST">
                    <div class="ms-sm-5 mb-5 p-2">
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
                        <h3 class="mb-3 border-bottom">Datos Básicos</h3>

                        <?php
                        $datos = array();
                        foreach ($_SESSION['inputValue'] as $key => $value) {
                            $datos[$key] = $value;
                        }
                        ?>


                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Nombre: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="name" value="<?php echo $datos['nombre'] ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Primer Apellido: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="lastname1" value="<?php echo $datos['primer_apellido'] ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Segundo Apellido: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="lastname2" value="<?php echo $datos['segundo_apellido'] ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">DNI: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="dni" value="<?php echo $datos['dni'] ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Fecha Nacimiento:</p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="date" class=" form-control" name="borndate" value="<?php echo $datos['fecha_nacimiento'] ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Sexo: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                H <input type="radio" class="" name="gender" value="h">
                                M <input type="radio" class="" name="gender" value="m">
                            </div>
                        </div>

                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Direccion: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="direction" value="<?php echo $datos['direccion'] ?>">
                            </div>
                        </div>
                        <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Estado Civil: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="civilstatus" value="<?php echo $datos['estado_civil'] ?>">
                            </div>
                        </div>

                    </div>

                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3 border-bottom">Empleo y formación</h3>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">empleo: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <select class="custom-select w-100 mt-1 mb-1 p-1 radio5" name="empleo">
                                    <?php
                                    if ($datos['empleo'] === NULL)
                                        echo "<option value='63' selected>Ninguno</option>";
                                    else
                                        foreach ($profesiones as $key => $value) {
                                            if (in_array($datos['empleo'], $value))
                                                echo "<option value='" . $value['id_profesion'] . "' selected><b>" . $value['nombre_empleo'] . "</b></option>";
                                                print_r($value['id_profesion']);
                                            }
                                        

                                    sort($profesiones);
                                    foreach ($profesiones as $key => $value) {
                                        if (!in_array($datos['empleo'], $value))
                                            echo "<option value='" . $value['id_profesion'] . "'>" . $value['nombre_empleo'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Formacion: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="training" value="<?php echo $datos['formacion'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3 border-bottom">Lugares de Residencia</h3>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">origen: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <select class="custom-select w-100 mt-1 mb-1 p-1 radio5" name="origen">
                                    <?php

                                    if ($datos['origen'] === NULL)
                                        echo "<option value='241' selected>Ninguno</option>";
                                    else
                                        foreach ($datos['paises'] as $key => $value) {
                                            if (in_array($datos['origen'], $value))
                                                echo "<option value='" . $value['id_pais'] . "' selected><b>" . $value['nombre_pais'] . "</b></option>";
                                        }

                                    sort($datos['paises']);
                                    foreach ($datos['paises'] as $key => $value) {
                                        if (!in_array($datos['origen'], $value))
                                            echo "<option value='" . $value['id_pais'] . "'>" . $value['nombre_pais'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Pais residencia: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <select class="custom-select w-100 mt-1 mb-1 p-1 radio5" name="residencia">
                                    <?php
                                    if ($datos['residencia'] === NULL)
                                        echo "<option value='241' selected>Ninguno</option>";
                                    else
                                        foreach ($datos['paises'] as $key => $value) {
                                            if (in_array($datos['residencia'], $value))
                                                echo "<option value='" . $value['id_pais'] . "' selected><b>" . $value['nombre_pais'] . "</b></option>";
                                        }
                                    foreach ($datos['paises'] as $key => $value) {
                                        if (!in_array($datos['residencia'], $value))
                                            echo "<option value='" . $value['id_pais'] . "'>" . $value['nombre_pais'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-sm-3 border-bottom">Seguro Médico</h3>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Seguro Medico: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="secure" value="<?php echo $datos['seguro_medico'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="ms-sm-5 me-sm-5 mb-5 p-3 text-end">
                        <button type="button" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-success" name="save_continueDP">Comprobar y continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include "../app/templates/includes/scripts.php";
    unset($_SESSION['inputValue']); ?>
</body>

</html>