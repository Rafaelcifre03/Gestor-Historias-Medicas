<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../app/templates/includes/links.php"; ?>
</head>

<body class="bg-blue">

    <?php include "../app/templates/includes/header.php"; ?>

    <div class="container-fluid pe-sm-5 ps-sm-5 mt-3">
        <!-- CONTENT -------------------------------------------->
        <div class="row border radio10 mb-4 text-white">

            <div class="col-10 col-sm-6 col-md-5 col-lg-4 offset-1 d-sm-flex d-none justify-content-end m-3 ">
                <img src="./images/fotoperfil1.PNG" alt="" class="rounded-circle border border-black" height="220px" width="220px">
            </div>
            <div class="col-10 col-sm-5 col-md-6 col-lg-6 align-middle p-2">
                <h1 class="fs-1 "><b>Dr Rafael Cifre Falcón</b></h1>
                <p class="fs-4">Nº Identificacion: <?php echo $_SESSION['id']; ?></p>
            </div>

        </div>

        <!-- imprimo errores-->
                <?php 
                if ($error) {
                    echo '<div class="row bg-white border radio10 p-3 mt-3">';
                    echo '<div class="alert alert-danger m-0" role="alert">';
                    echo '- No se pudo insertar los datos del nuevo usuario. Los siguientes campos no poseen el formato correcto:<br>';
                    foreach ($validaciones->mensaje as $key => $value) {
                        echo $key . "-> " . $value[0] ."<br>";
                    }
                    echo '</div></div>';
                }
                ?>
        <div class="row bg-white border radio10 p-2 mt-3">
            <div class="col-12 col-sm-4 p-2">
                <!--<a href="./index.php?ctl=createPersonalData" class="btn btn-outline-success w-100">
                    Agregar Pacientes
                </a>-->
                <button type="button" class="btn btn-outline-success w-100" data-toggle="modal" data-target="#exampleModal">
                    Agregar un paciente
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Paciente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="pe-3 ps-3" action="" method="POST">
                                <div class="modal-body">
                                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                                        <p class="col-12 col-md-5 col-lg-3 align-middle m-0 ms-sm-3 ">Nombre: </p>
                                        <div class="col-12 col-md-7 col-lg-9">
                                            <input type="text" class="form-control" name="name" value="Rafael">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                                        <p class="col-12 col-md-5 col-lg-3 align-middle m-0 ms-sm-3 ">1º Apellido: </p>
                                        <div class="col-12 col-md-7 col-lg-9">
                                            <input type="text" class=" form-control" name="lastname1">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                                        <p class="col-12 col-md-5 col-lg-3 align-middle m-0 ms-sm-3 ">2º Apellido: </p>
                                        <div class="col-12 col-md-7 col-lg-9">
                                            <input type="text" class=" form-control" name="lastname2">
                                        </div>
                                    </div>

                                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                                        <p class="ms-sm-3 col-12 col-md-5 col-lg-3 align-middle m-0">dni: </p>
                                        <div class="col-12 col-md-7 col-lg-9">
                                            <input type="text" class=" form-control" name="dni">
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                                        <p class="ms-sm-3 col-12 col-md-5 col-lg-3 align-middle m-0">Fecha Nac :</p>
                                        <div class="col-12 col-md-7 col-lg-9">
                                            <input type="date" class=" form-control" name="borndate">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="add_paciente" class="btn btn-primary">Guardar y continuar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 p-2">
                <a href="" class="btn btn-outline-success w-100">
                    Asignar una cita
                </a>
            </div>
            <div class="col-12 col-sm-4 p-2">
                <a href="" class="btn btn-outline-success w-100">
                    Ver Calendario
                </a>
            </div>
        </div>

        <div class="row bg-white border radio10 p-2 mt-3">
            <div class="">
                <h2 class="ms-4 mt-2">Pacientes</h2>


            </div>


            <?php
            if (isset($_SESSION['datos'])) {
                foreach ($_SESSION['datos'] as $key => $value) {

                    echo "<div class='col-12 col-sm-6 col-lg-4 mt-3'>
                        <a href='./index.php?ctl=historiaMed&id_paciente=" . $value['id_paciente'] . "' class='text-decoration-none w-100 d-block'>
                            <div class='d-flex p-2 border border-secondary radio10'>
                                <div class='col-12 col-sm-5 col-md-7 col-lg-7 offset-sm-1 col-xxl-9 align-middle text-start '>
                                    <p class='fs-4 mb-0 text-black'><b>" . $value['nombre'] . " " . $value['primer_apellido'] . " " . $value['segundo_apellido'] . "</b></p>
                                    <div>
                                        <p class='text-gray col-3 mb-0'>Historia: " . $value['id_paciente'] . "</p>
                                    </div>
                                    <div class='d-xxl-flex'>
                                        <p class='text-gray col-3 mb-0'>Edad: " . $value['edad'] . "</p>
                                        <p class='text-gray col-7 mb-0'>Sexo: " . $value['sexo'] . "</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>";
                }
            }

            ?>

            <nav class="col-12 d-flex justify-content-center mt-5" aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <?php
    include "../app/templates/includes/scripts.php";
    unset($_SESSION['datos']);
    ?>
</body>

</html>