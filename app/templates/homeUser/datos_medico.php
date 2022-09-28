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
            <div class="col-10 col-sm-6 col-md-5 col-lg-4 offset-1 d-sm-flex d-none justify-content-end m-3 ">
                <img src="./images/fotoperfil1.PNG" alt="" class="rounded-circle border border-black" height="220px" width="220px">
            </div>
            <div class="col-10 col-sm-5 col-md-6 col-lg-6 align-middle p-2">
                <h1 class="fs-1"><b>Dr Rafael Cifre Falcón</b></h1>
                <p class="fs-4">Nº Identificacion: 23</p>
            </div>
        </div>

        <div class="row bg-blue radio10 border bg-white pe-3 mt-3">
            <!-- CONTENT -------------------------------------------->
            <div class="col-12">

                <h2 class="fs-1 m-3">Datos Personales</h2>

                <div class="ms-sm-5 mb-5 p-2">

                    <h3 class="mb-3 border-bottom">Datos Básicos</h3>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Nombre: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class="form-control" value="Rafael">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="col-12 col-md-5 col-lg-2 align-middle m-0 ms-sm-3 ">Apellidos: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Cifre Falcón">
                        </div>
                    </div>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Edad: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="12">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Sexo: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            M <input type="radio" class="" value="Rafael">
                            F <input type="radio" class="" value="Rafael">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Fecha Nacimiento:</p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="date" class=" form-control" value="03/11/2001">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Direccion: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Calle 13">
                        </div>
                    </div>

                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">DNI: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="99999999R">
                        </div>
                    </div>
                    <div class="d-flex mb-2 mt-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Estado Civil: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Casado(a)">
                        </div>
                    </div>

                </div>

                <div class="ms-sm-5 mb-5 p-3">
                    <h3 class="mb-3 border-bottom">Empleo y formación</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Empleo: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Camarero(a)">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Formacion: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Universitaria">
                        </div>
                    </div>
                </div>

                <div class="ms-sm-5 mb-5 p-3">
                    <h3 class="mb-3 border-bottom">Lugares de Residencia</h3>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Pais Origen: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Cancún">
                        </div>
                    </div>
                    <div class="d-flex mb-2 flex-column flex-md-row">
                        <p class="ms-sm-3 col-12 col-md-5 col-lg-2 align-middle m-0">Pais residencia: </p>
                        <div class="col-12 col-md-7 col-lg-10">
                            <input type="text" class=" form-control" value="Panamá">
                        </div>
                    </div>
                </div>
                <!----------------------------!!!!-->
            </div>
        </div>
    </div>
    <?php include "../app/templates/includes/scripts.php" ?>
</body>

</html>