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

            <?php include "../app/templates/includes/aside_create.php";

            $datos = $_SESSION['datosP'];
            $datosB = $datos['datosBasicos'];

            $deporte = $datosB['deporte'];
            $nivelEstudio = $datosB['nivel_estudio'];
            $sueño = $datosB['sueño'];
            $ocupacion = $datosB['id_ocupacion'];
            $tipoDroga = $datos['tipoDroga'];
            $habitos = $datos['habito'];
            $profesiones = $datos['profesiones'];
            ?>

            <div class="col-12 col-md-7 col-lg-8 col-xl-9 pt-4 pe-sm-5">
                <form class="pe-3 ps-3" action="" method="POST">
                    <h2 class="fs-1 m-3 border-bottom">Habitos Psicobiológicos</h2>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3 border-bottom">Datos Básicos</h3>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Ocupación: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <select class="custom-select w-100 mt-1 mb-1 p-1 radio5" name="ocupacion">
                                    <?php 
                                        if ($ocupacion === NULL)
                                            echo "<option value='Ninguno' selected>Ninguno</option>";
                                        else
                                            foreach ($profesiones as $key => $value) {  
                                                if(in_array($ocupacion, $value))
                                                    echo "<option value='$ocupacion' selected><b>".$value['nombre_empleo']."</b></option>";
                                        }
                                        
                                        sort($profesiones);
                                        foreach ($profesiones as $key => $value) {
                                            if (!in_array($ocupacion, $value))
                                                echo "<option value='".$value['id_profesion']."'>".$value['nombre_empleo']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Deporte: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <?php
                                echo "<input type='text' class='form-control' name='deporte' value='$deporte'>";
                                ?>
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Nivel Estudio: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <?php
                                echo "<input type='text' class='form-control' name='nivel_estudio' value='$nivelEstudio'>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3 border-bottom">Sueño</h3>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Habitos sueño: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <?php
                                echo "<input type='text' class='form-control' name='sueno' value='$sueño'>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3 border-bottom">Drogas</h3>

                        <div class="dropdown border">
                            <button class="text-start btn btn-light dropdown-toggle w-100 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Añadir habito de consumo
                            </button>
                            <div class="dropdown-menu w-100 text-start" aria-labelledby="dropdownMenuLink">
                                <?php
                                foreach ($tipoDroga as $key => $value) {
                                    echo "<a id='tag_" . $value . "' class='dropdown-item' onclick='createBlock(\"" . $value . "\", )'>$value</a>";
                                }
                                ?>
                            </div>
                        </div>

                        <div id="divDrogas">
                            <?php
                                foreach ($habitos as $key => $value) {
                                    echo '<div class="ms-sm-3 mt-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">'.$value['nombre'].'</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="'.$value['descripcion'].'" name="'.$value['nombre'].'"></div></div></div>';
                                    
                                }
                                unset($_SESSION['datosP']);
                            ?>
                        </div>
                        <div class="ms-sm-5 me-sm-5 mb-5 p-3 text-end">
                            <button type="button" class="btn btn-secondary">Reset</button>
                            <button type="submit" name="save_continue" class="btn btn-success">Comprobar y continuar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function createBlock(nombreCampo, value = "", idDiv = "divDrogas") {

            var divPersonal = document.getElementById(idDiv);

            var bigDiv = document.createElement("div");
            bigDiv.setAttribute("class", "ms-sm-3 mb-2");

            var div1 = document.createElement("div");
            div1.setAttribute("class", "d-flex mt-2 w-100 align-middle flex-wrap");

            var p = document.createElement("p");
            p.setAttribute("class", "col-12 col-md-5 col-lg-2 align-middle m-0");
            p.textContent = nombreCampo;

            var div2 = document.createElement("div");
            div2.setAttribute("class", "col-12 col-md-7 col-lg-10");

            var input = document.createElement("input");
            input.setAttribute("class", "form-control");
            input.setAttribute("type", "text");
            if(value !== "")
            input.setAttribute("value", value);
            input.setAttribute("name", nombreCampo);


            div2.appendChild(input);
            div1.appendChild(p);
            div1.appendChild(div2);

            bigDiv.appendChild(div1)
            divPersonal.appendChild(bigDiv);


            var tag = document.getElementById("tag_" + nombreCampo).style.display = "none";
        }
    </script>
    <?php include "../app/templates/includes/scripts.php"; ?>


</body>

</html>