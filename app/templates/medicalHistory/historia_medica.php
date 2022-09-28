<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
    <?php include "../app/templates/includes/links.php" ?>
    <style>
        .colorBlue {
            color: #0d6efd;
        }
    </style>
</head>


<body class="bg-blue">
    <?php include "../app/templates/includes/header.php"; ?>

    <div class="container-fluid pe-sm-5 ps-sm-5 mt-3">

        <!-- CONTENT -------------------------------------------->
        <div class="row radio10 border text-white p-2"> 
            <?php $paciente= $_SESSION['paciente'];?>
            <div class="text-center align-middle p-2">
                <h1 class="fs-1"><b><?php echo $paciente['nombre'] . " " . $paciente['primer_apellido'] . " " . $paciente['segundo_apellido']; ?></b></h1>
                <p class="fs-4">Nº Historia: <?php echo $paciente['id_paciente'];?> </p>
                <p class="fs-5">Sexo: <?php echo $paciente['Sexo'];?></p>
                <p class="fs-5">fecha Nacimiento: <?php echo $paciente['fecha_nacimiento'];?></p>
                <p class="fs-5">Fecha Ingreso: <?php echo $paciente['fecha_introduccion'];?></p>
                <?php echo '<a class="btn btn-outline-light" href="./index.php?ctl=datosPaciente&id_paciente='.$paciente['id_paciente'].'">Ver datos personales</a>';
                ?>
            </div>
        </div>
        <div class="row bg-white border radio10 p-2 mt-3">
            <div class="d-flex text-center p-0 col-6 col-sm-3 p-2">
                <?php echo '<a href="./index.php?ctl=createPersonalData&id_paciente='.$paciente['id_paciente'].'" class="pt-3 pt-md-2 pt-lg-1 align-items-center btn btn-outline-success w-100">' ?>
                <span class="align-middle">Editar datos del paciente</span>
                </a>
            </div>
            <div class="d-flex text-center  col-6 col-sm-3 p-2">
                <a href="" class="btn btn-outline-success h-100 w-100">
                    <span class="align-middle mt-2">Asignar cita (Expansión)</span>
                </a>
            </div>
            <div class="col-6 col-sm-3 p-2">
                <a href="" class="-flex align-items-center h-100 btn btn-outline-success w-100">
                    Ordenar examen médico (Expansión)
                </a>
            </div>
            <div class=" col-6 col-sm-3 p-2">
                <button type="button" class="btn btn-outline-success w-100 h-100" data-toggle="modal" data-target="#exampleModal">
                    Compatir Historia
                </button>

                <!-- Modal -->
                <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Compartir historia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="p-5">
                                <p class="m-0 ms-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-2 bi bi-share" viewBox="0 0 16 16">
                                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                    </svg>
                                    <span class="fs-4 h-100 align-middle">Link</span> 
                                </p>
                                <input type="text" class="form-control mt-3" name="evolucion" value="<?php echo $cadenaCompartir?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border radio10 p-sm-5 mt-3 bg-white">
            <h1 id="evolucion">Evolución</h1>

            <div class="container-fluid mt-5">
                <div class="row container-fluid align-middle mb-5 pb-5 border-bottom">
                    <div class="row mb-0">
                        <!-- imprimo errores-->
                        <?php 
                        if ($error) {
                            echo '<div class="alert alert-danger m-0 mb-3" role="alert">';
                            echo '- No se pudo insertar la evolucion. Los siguientes campos no poseen el formato correcto:<br>';
                            foreach ($validaciones->mensaje as $key => $value) {
                                echo $key . "-> " . $value[0] ."<br>";
                            }
                            echo '</div>';
                        }
                        ?>
                        <p id="Aggevolucion" onclick="ocultaMuestra('Aggevolucion','inputEvolucion','mb-2 d-flex flex-column flex-md-row p-3 radio10 align-items-center', 'd-flex')" class="fs-5 colorBlue w-100 text-start col-6 col-xxl-7 mb-0 text-decoration-none "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg me-2 colorBlue" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>
                            Agregar Evolucion
                        </p>
                        <div id="inputEvolucion" class="d-none">
                            <p class="col-12 col-md-4 col-lg-2 align-middle m-0 fs-5">Evolucion </p>
                            
                            <div class="col-12 col-md-7 col-lg-10">
                                <form action="" method="POST" class="px-3 d-flex justify-content-between">
                                    <input type="text" class="form-control" name="evolucion" value="">
                                    <div class="btn-group mx-4" role="group" aria-label="Basic example">
                                        <input type="submit" name="enviar" class="btn btn-primary">
                                        <button type="button" onclick="ocultaMuestra('inputEvolucion','Aggevolucion','fs-5 colorBlue w-100 text-start col-6 col-xxl-7 mb-0 text-decoration-none ')" class="btn btn-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle " viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row container-fluid mt-3 align-middle">

                    <?php
                        if (isset($_SESSION['datos']))
                        {
                            foreach ($_SESSION['datos'] as $key => $value) {
                                echo "<div class='row mb-5'>" ;
                                echo "<p class='formatDate col-9 col-sm-3 col-lg-2 col-xxl-1 mb-2 order-2 order-sm-1 offset-1 offset-sm-0'>".$value['fecha']."<br><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock m-1 ' viewBox='0 0 16 16'>
                                    <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
                                    <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
                                  </svg>".$value['hora']."</p>";
                                echo "<span class='col-1 offset-sm-1 offset-xl-0 ps-3 order-1 order-sm-2'><svg class='text-primary ms-2' xmlns='http://www.w3.org/2000/svg' height='20' width='20' fill='currentColor' class='bi bi-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z' /></svg></span>";
                                echo "<p class='text-start col-10 col-sm-6 col-lg-8 col-xxl-10 mb-0 order-3'>".$value['descripcion']."</p>";
                            
                            }
                        }
                    ?>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>

    <?php include "../app/templates/includes/scripts.php"; 
        unset($_SESSION['datos']);
        unset($_SESSION['paciente']);
        unset($_SESSION['compartir']);
    ?>
    <script>
        function ocultaMuestra(idElementoOcultar, idElementoMostrar, AtrClass, displayType="block") {

            var ocultar = document.getElementById(idElementoOcultar);
            var mostrar = document.getElementById(idElementoMostrar);

            mostrar.setAttribute("class", AtrClass + displayType);
            ocultar.setAttribute("class","d-none");

        }
    </script>


</body>

</html>