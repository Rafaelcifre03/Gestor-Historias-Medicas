<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../app/templates/includes/links.php" ?>

    <title>Historias Medicas</title>

</head>

<body class="bg-light">
    <?php include "../app/templates/includes/header.php"; ?>

    <div class="container-fluid min-h-100 max-h-100 border-black p-0">
        <img src="./images/fotoindex.png" alt="imagen prueba" class="min-h-100 max-h-100" width="100%" height="auto">
        <div class="d-flex align-items-center w-100 ms-5">
            <div class="position-absolute top-50">
                <h1 class="fs-1">Web Especializada en registro <br>de Historias Medicas</h1>
                <a href="./index.php?ctl=login" class="btn btn-danger mt-5 ms-5 w-50">Inicia sesion</a>
            </div>
        </div>
        <div class="container-fluid min-h-100 d-flex align-middle">
            <div class="row justify-content-center align-items-center bg-light">
                <div class="col-md-6 col-12 p-3">
                    <h2 class="text-center fs-1">OBJETIVO</h2>
                    <hr>
                    <p class="fs-4 text-justify m-5">El objetivo general es desarrollar una aplicación web 
                        de gestión de historias médicas, con el fin de proporcionar a los usuarios administrar 
                        y consultar la información básica de un paciente. 
                        <br><br>Mientras otorgamos una plataforma intuitiva y de fácil uso para que el trabajo de los profesionales sanitarios sea ameno y eficaz. 
</p>
                </div>
                <div class="col-6 text-center d-none d-md-block ">
                    <img src="images/fotoindex2.png" alt="imagen prueba" class="radio10" width="75%" height="75%">
                </div>
            </div>
        </div>
        <div class="container flex-column min-h-100 d-flex align-middle mt-5">
            <div class="row">
                <h2 class="col-12 text-center fs-1">FUNCIONALIDAD</h2>
                <hr class="m-1 mb-5">
            </div>
            <div class="row justify-content-around align-items-center ">
                <div class="card mb-4 p-3 col-md m-2">
                    <img src="./images/historia.png" class="card-img-top radio5" alt="..." width="180px" height="200px">
                    <div class="card-body">
                        <h3>Gestion de Historias Medicas</h3>
                        <p class="card-text">Podrás crear y editar pacientes sin limite.</p>
                    </div>
                </div>
                <div class="card mb-4 p-3 col-md m-2">
                    <img src="./images/accesibilidad.png" class="card-img-top radio5" alt="..." width="180px" height="200px">
                    <div class="card-body">
                        <h3>Accesibilidad</h3>
                        <p class="card-text">Podrás acceder al sistema desde cualquier dispositivo y lugar.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around align-items-center mb-5 ">
                <div class="card mb-4 p-3 col-md m-2">
                    <img src="./images/compartir.png" class="card-img-top radio5" alt="..." width="180px" height="200px">
                    <div class="card-body">
                        <h3>Compartir Historias</h3>
                        <p class="card-text">Finalmente, podrás colaborar con tus compañeros con un click. Podrás compartir las historias medicas con el fin de colaboración entre médicos.</p>
                    </div>
                </div>
                <div class="card mb-4 p-3 col-md m-2">
                    <img src="./images/calendario.png" class="card-img-top radio5" alt="..." width="180px" height="200px">
                    <div class="card-body">
                        <h3>Calendario</h3>
                        <p class="card-text"><br>Objetivo de expansion.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container min-h-100 d-flex align-middle">
            <div class="row justify-content-around align-items-center mt-5 mb-5 ">

                <h2 class="text-center fs-1">Servicios (obj. expansión)</h2>
                <hr>

                <div class="col-md-5 col-12 p-4 w-sm-50 border border-2 radio5 mt-1">
                    <h3 class="text-center fs-3">Gratuita</h3>
                    <p class="fs-4 text-justify mt-5">Con este plan tendrás la aplicación a prueba durante las primeras 10 historias que crees, de esta manera podrás probar nuestros servicios.</p>
                    <img class="radio10"  src="./images/gratis.png" alt="imagen gratuita" height="300px" width="100%">
                </div>
                <div class="col-md-5 offset-md-1 col-12 p-4 border border-2 radio5 mt-1">
                    <h3 class="text-center fs-3">Paga</h3>
                    <p class="fs-4 text-justify mt-5">Por una suscripcion de $$ podras crear y disfrutar de todas las ventajas que dispones. Entra en el mundo del que no querras salir</p>
                    <img class="radio10" src="./images/pago.png" alt="imagen paga" height="300px" width="100%">
                </div>
            </div>
        </div>

    </div>

    <?php include "../app/templates/includes/scripts.php"; ?>
</body>

</html>