<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../app/templates/includes/links.php" ?>
    <link href="js/script.js">
</head>

<body class="bg-blue">

    <?php include "../app/templates/includes/header.php"; ?>

    <div class="container-fluid pe-sm-5 ps-sm-5 mt-3">

        <div class="row border radio10 mb-4">

            <div class=" align-middle ps-sm-5 text-white m-3 text-center">
                <h1 class="fs-1 text-white"><b><?php echo $datosPaciente['nombre']. " ". $datosPaciente['primer_apellido'] . " ".$datosPaciente['segundo_apellido'];?></b></h1>
                <p class="fs-4">Nº Historia: <?php echo $_GET['id_paciente'];?> </p>
                <p class="fs-5">Fecha Introduccion: <?php echo $datosPaciente['fecha_introduccion'];?></p>
                <div class="col-12">
                <?php echo '<a class="btn btn-outline-light" href="./index.php?ctl=createPersonalData&id_paciente='.$_GET['id_paciente'].'" class="btn btn-outline-success w-100">' ?>
                    Editar datos del paciente
                </a>
            </div>
            </div>

        </div>
        <div class="row bg-blue radio10 border bg-white">
            <?php include "../app/templates/includes/aside.php" ?>

            <!-- CONTENT -------------------------------------------->
            <div class="col-12 col-md-7 col-lg-8 col-xl-9 pt-4 pe-sm-5">

                <h2 class="fs-1 m-3">Datos Personales</h2>

                <div class="ms-sm-5 mb-5 p-2">

                    <h3 id="datosBasicos" class="mb-3 border-bottom">Datos Básicos</h3>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Nombre: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['nombre'];?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Apellidos: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['primer_apellido'] . " ".$datosPaciente['segundo_apellido'];?>">
                        </div>
                    </div>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Edad: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['edad'];?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Sexo: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                        <?php 
                            $cadena ="";
                            if ($datosPaciente['Sexo']==="h") 
                                $cadena = 'Hombre';
                            else
                                $cadena .= 'Mujer';

                            echo $cadena;
                        ?>
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Fecha Nacimiento:</p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="date" class=" form-control" value="<?php echo $datosPaciente['fecha_nacimiento'];?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Direccion: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['direccion'];?>">
                        </div>
                    </div>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">DNI: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['dni'];?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Estado Civil: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['estado_civil'];?>">
                        </div>
                    </div>

                </div>

                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="empleoFormacion" class="mb-3 border-bottom">Empleo y formación</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Empleo: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" 
                            value="<?php echo $empleo;?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Formacion: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['formacion'];?>">
                        </div>
                    </div>
                </div>

                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="lugarResidencia" class="mb-3 border-bottom">Lugares de Residencia</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Pais Origen: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $origen ;?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Pais residencia: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $residencia ;?>">
                        </div>
                    </div>

                </div>
                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="seguroMedico" class="mb-sm-3 border-bottom">Seguro Médico</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Seguro Medico: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="<?php echo $datosPaciente['seguro_medico'];?>">
                        </div>
                    </div>
                </div>
                <!---------------hay que cambiar esto // pq es una vista-------------!!!!-->
                <h2 class="fs-1 m-3 border-bottom">Antecedentes</h2>
                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="antecedentesP" class="mb-3">Personales</h3>

                    <?php 
                        $cadenaEscrito="";
                        $cont=0;
                    
                        foreach ($antecedentesPer as $key => $value) {
                            $cadenaEscrito .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $nombreA[$cont] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $value['descripcion'] . '" name="' . $nombreA[$cont]. '"></div></div></div>';
                            $cont++;
                        }
                        if (COUNT($antecedentesPer)!==0)
                            echo $cadenaEscrito;
                        else
                            echo $cadenaEscrito="- niega todo antecedente personal <br><br>";


                    ?>
                    <h3 id="antecedentesP" class="mb-3">Familiares</h3>
                    <?php
                        $antecedentesFam;
                        $cadenaEscrito="";
                        $cont=0;

                        foreach ($antecedentesFam as $key => $value) {
                            $cadenaEscrito .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $nombreF[$cont] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $value['descripcion'] . '" name="' . $nombreF[$cont] . '"></div></div></div>';
                            $cont++; 
                        }
                        if (COUNT($antecedentesFam)!==0)
                            echo $cadenaEscrito;
                        else
                            echo $cadenaEscrito="- niega todo antecedente familiar <br>";
                    ?>
                </div>
                <!---------------------------->
                <h2 class="fs-1 m-3 border-bottom">Habitos Psicobiológicos</h2>
                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="habitosBasico" class="mb-3 border-bottom">Datos Básicos</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Ocupación: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $ocupacion ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Deporte: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['deporte'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Nivel Estudio: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['nivel_estudio'] ?>">
                        </div>
                    </div>
                </div>
                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="habitosSueño" class="mb-3 border-bottom">Sueño</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Habitos sueño: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['sueño'] ?>">
                        </div>
                    </div>
                </div>
                <div class="ms-sm-5 mb-5 p-3">
                    <h3 id="usoDrogas" class="mb-3 border-bottom">Drogas</h3>
                    <?php
                        $cadenaEscrito="";
                        $cont=0;

                        foreach ($habitos as $key => $value) {
                            $cadenaEscrito .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $nombreD[$cont] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $value['descripcion'] . '" name="' . $nombreD[$cont] . '"></div></div></div>';
                            $cont++;
                        }
                        if (COUNT($antecedentesFam)!==0)
                            echo $cadenaEscrito;
                        else
                            echo $cadenaEscrito="- niega todo antecedente de drogas";
                    ?>
                </div>
                <!---------------------------->
                <h2 id="funcionalBasico" class="fs-1 m-3 border-bottom">Examen Funcional</h2>
                <div class="ms-sm-5 mb-5 p-3">
                    <h3 class="mb-3">Datos Básicos</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">FUR: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['FUR'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Características de la menstruacion:
                        </p>
                        <div class="col-12 col-md-7 col-lg-10 align-middle">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['menstruacion'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Micciones: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['micciones'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Habitos Intestinales: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['habito_intestinal'] ?>">
                        </div>
                    </div>

                </div>
                <!---------------------------->
                <h2 id="examenFisico" class="fs-1 m-3 border-bottom">Examen Físico</h2>
                <div class="ms-sm-5 mb-5 p-3">
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Peso: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['peso'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Talla: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['talla'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Tension Arterial: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['tension_arterial'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Respiraciones: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['respiraciones'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Pulso: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['Pulso'] ?>">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Temperatura: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="<?php echo $datosPaciente['temperatura'] ?>">
                        </div>
                    </div>
                </div>


                <h2 id="planDiagnostico" class="fs-1 m-3 border-bottom">Plan y Diagnostico</h2>
                <div class="ms-sm-5 mb-5 p-3">
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Diagnostico: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <textarea name="diagnostico" id="" rows="2" ><?php echo $datosPaciente['diagnostico'] ?></textarea>
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row m-1">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0">Plan: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <textarea name="Plan" id="" rows="2"><?php echo $datosPaciente['plan'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../app/templates/includes/scripts.php"; ?>

</body>

</html>