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
                <div class="alert alert-primary" role="alert">
                    Todos los antecedentes no ingresados o no seleccionados serán establecidos con el valor predeterminado ("niega")
                </div>
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
                    <h2 class="fs-1 m-3 border-bottom">Antecedentes</h2>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3">Personales</h3>

                        <div class="dropdown border mb-2">
                            <button class="text-start btn btn-light dropdown-toggle w-100 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Añadir antecedente personal
                            </button>
                            <div class="dropdown-menu w-100 text-start" aria-labelledby="dropdownMenuLink">
                                <?php
                                echo $_SESSION['inputValue'];
                                /*
                                $paciente = new Paciente();
                                $antecedentes = $paciente->getAntecedentes();

                                $datos = array();
                                $antecedenteLleno = array ();
                                //relleno las variable datos|antecedentesLlenos para manejar los datos.
                                foreach ($_SESSION['inputValue'] as $key => $value) {
                                    $datos[$key] = $value;

                                    $antecedenteLleno[] = $value['id_antecedente'];
                                }
                                //imprimo todos los antecedentes, rellenando con valores existentes si los hay
                                $check=false;

                                foreach ($antecedentes as $key => $valueA) {
                                    $check=false;

                                    foreach ($datos as $key => $valueD) {
                                        if ($valueA['id_antecedente'] == $valueD['id_antecedente']) {
                                            echo '<a id="tag_' . $valueA['antecedente'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['antecedente'] . '","' . $valueD['descripcion'] . '")\'>' . $valueA['antecedente'] . ' </a>';
                                        }
                                        else if (!in_array($valueA['id_antecedente'], $antecedenteLleno) && $check == false) {
                                            echo '<a id="tag_' . $valueA['antecedente'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['antecedente'] . '", "")\'>' . $valueA['antecedente'] . ' </a>';
                                            $check=true;
                                        }
                                    }  
                                }*/
                                ?>
                                <!--
                            <a id="tag_Diabetes" class="dropdown-item" onclick='createBlock("Diabetes")'>Diabetes</a>
                            <a id="tag_Alergia" class="dropdown-item" onclick='createBlock("Alergia")'>Alergia</a>
                            <a id="tag_TBC" class="dropdown-item" onclick='createBlock("TBC")'>TBC</a>
                            <a id="tag_EBPOC" class="dropdown-item" onclick='createBlock("EBPOC")'>EBPOC</a>
                            <a id="tag_Asma" class="dropdown-item" onclick='createBlock("Asma")'>Asma</a>

                            <a id="tag_Quirurgicos" class="dropdown-item" onclick='createBlock("Quirurgicos")'>Quirurgicos</a>
                            <a id="tag_Traumatico" class="dropdown-item" onclick='createBlock("Traumatico")'>Traumatico</a>
                            <a id="tag_Infecto-contagiosa" class="dropdown-item" onclick='createBlock("Infecto-contagiosa")'>Infecto-contagiosa</a>
                            <a id="tag_Obstétricos" class="dropdown-item" onclick='createBlock("Obstétricos")'>Obstétricos</a>
                            <a id="tag_Anti-conceptivos" class="dropdown-item" onclick='createBlock("Anti-conceptivos")'>Anti-conceptivos</a>
                            <a id="tag_Drogas" class="dropdown-item" onclick='createBlock("Drogas")'>Drogas</a>
                            <a id="tag_hepatitis" class="dropdown-item" onclick='createBlock("Gastro-intestinales")'>Gastro-intestinales</a>
                        -->
                            </div>
                        </div>
                        <div id="divPersonales">
                        <?php
                                echo $_SESSION['existingValue'];
                                ?>
                        </div>
                        <!--
                    <div id="input_HTA" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">HTA: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="hta" value="HTA">
                            </div>
                        </div>
                    </div>
                    <div id="input_diabetes" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Diabetes: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="diabetes" value="Diabetes">
                            </div>
                        </div>
                    </div>
                    <div id="input_alergia" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Alergia: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="alergia" value="Alergia">
                            </div>
                        </div>
                    </div>
                    <div id="input_TBC" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">TBC: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="tbc" value="TBC">
                            </div>
                        </div>
                    </div>
                    <div id="input_EBPOC" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">EBPOC: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="ebpoc" value="EBPOC">
                            </div>
                        </div>
                    </div>
                    <div id="input_asma" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Asma: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="asma" value="Asma">
                            </div>
                        </div>
                    </div>
                    <div id="input_hepatitis" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 w-100 align-middle flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Hepatitis: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="hepatitis" value="Hepatitis">
                            </div>
                        </div>
                    </div>

                    <div class="ms-sm-3 mb-2 mt-3">
                        <hr>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="sarampion" value="sarampion">
                            <label class="form-check-label" for="inlineCheckbox1">Sarampion</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="varicela" value="varicela">
                            <label class="form-check-label" for="inlineCheckbox2">Varicela</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="parotiditis" value="parotiditis">
                            <label class="form-check-label" for="inlineCheckbox3">Parotiditis</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="rubeola" value="rubeola">
                            <label class="form-check-label" for="inlineCheckbox3">Rubéola</label>
                        </div>
                        <hr>
                    </div>
                    <div class="ms-sm-3 mb-2 mt-3">
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Quirurgicos: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="quirurgico" value="Universitaria">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Traumatico: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="traumatico" value="Universitaria">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Infecto-contagiosa: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="infecto" value="Universitaria">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Obstétricos: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="obstetrico" value="obstetrico">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Anti-conceptivos: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="anticonceptivo" value="Anticonceptivos">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Drogas: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="droga" value="Drogas">
                            </div>
                        </div>
                        <div class="d-flex mb-2 flex-column flex-md-row">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Gastro-intestinales: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class=" form-control" name="gastrointestinal" value="Gastrointestinales">
                            </div>
                        </div>
                    </div>-->
                    </div>
                    <div class="ms-sm-5 mb-5 p-3">
                        <h3 class="mb-3">Familiares</h3>
                        <div class="dropdown border mb-2">
                            <button class="text-start btn btn-light dropdown-toggle w-100 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Añadir antecedente Familiar
                            </button>
                            <div class="dropdown-menu w-100 text-start" aria-labelledby="dropdownMenuLink">
                            <?php
                                echo $_SESSION['inputValue2'];
                                ?>
                            </div>
                        </div>
                        <div id="familiar">
                        <?php
                                echo $_SESSION['existingValue2'];

                                unset($_SESSION['inputValue']);
                                unset($_SESSION['existingValue']);
                                unset($_SESSION['inputValue2']);
                                unset($_SESSION['existingValue2']);
                                ?>
                        </div>
                        <!--
                    <div id="input_padre" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 flex-column flex-md-row w-100">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Padre: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="padre" value="Padre">
                            </div>
                        </div>
                    </div>
                    <div id="input_madre" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 flex-column flex-md-row w-100">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Madre: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="madre" value="Madre">
                            </div>
                        </div>
                    </div>
                    <div id="input_hija" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 flex-column flex-md-row w-100">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Hija: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="hija" value="Hija">
                            </div>
                        </div>
                    </div>
                    <div id="input_hijo" class="ms-sm-3 mb-2" style="display: none;">
                        <div class="d-flex mb-2 flex-column flex-md-row w-100">
                            <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Hijo: </p>
                            <div class="col-12 col-md-7 col-lg-10">
                                <input type="text" class="form-control" name="hijo" value="Hijo">
                            </div>
                        </div>
                    </div>-->

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
        function inputAntecedentePersonal(IdCampo) {
            var elemento = document.getElementById("input_" + IdCampo);
            var tag = document.getElementById("tag_" + IdCampo);

            if (elemento.style.display == "none" && elemento.id != "hija" && elemento.id != "hijo") {
                elemento.style.display = "flex";
                tag.style.display = 'none';
            }
        }

        function createBlock(nombreCampo, value, idDiv = "divPersonales") {

            var divPersonal = document.getElementById(idDiv);

            var bigDiv = document.createElement("div");
            bigDiv.setAttribute("class", "ms-sm-3 mb-2");

            var div1 = document.createElement("div");
            div1.setAttribute("class", "d-flex mb-2 w-100 align-middle flex-wrap");

            var p = document.createElement("p");
            p.setAttribute("class", "col-12 col-md-5 col-lg-2 align-middle m-0");
            p.textContent = nombreCampo;

            var div2 = document.createElement("div");
            div2.setAttribute("class", "col-12 col-md-7 col-lg-10");

            var input = document.createElement("input");
            input.setAttribute("class", "form-control");
            input.setAttribute("type", "text");
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