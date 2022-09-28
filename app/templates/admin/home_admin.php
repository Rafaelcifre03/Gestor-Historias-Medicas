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

    <?php include "../app/templates/includes/header.php";
    if (isset($_SESSION['datos']))
        $usuarios = $_SESSION['datos'];
    
    ?>

    <div class="container-fluid pe-sm-5 ps-sm-5 mt-3">
        <!-- CONTENT -------------------------------------------->
        <div class="row border radio10 mb-4 text-white text-center p-5">
            <h1 class="fs-1 "><b>Perfil Administrador</b></h1>
            <p class="fs-4">Nº Identificacion: <?php echo $_SESSION['id']; ?></p>
        </div>
        <div class="row bg-white border radio10 p-2 mt-3">
            <div class="col-6 p-2">
                <a href="./index.php?ctl=crearUsuario" class="btn btn-outline-success w-100">
                    Crear nuevo usuario
                </a>
            </div>
            <div class="col-6 p-2">
                <a href="" class="btn btn-outline-success w-100">
                    Insertar nuevos datos de campo (expansión)
                </a>
            </div>
        </div>

        <div class="row bg-white border radio10 p-2 mt-3">

            <?php
                foreach ($usuarios as $key => $value) {
                    if ($value['id_usuario']!= $_SESSION['id'])
                        echo "<div class='col-12 col-sm-6 col-lg-4 mt-3'>
                                <a href='./index.php?ctl=editarUsuario&id_usuario=".$value['id_usuario'] ."' class='text-decoration-none w-100 d-block'>
                                    <div class='d-flex p-2 border border-secondary radio10'>
                                        <div class='d-none d-sm-block col-6 col-sm-7 col-md-4 col-lg-4 col-xxl-3 text-end pe-5'>
                                            <img src='./images/fotoperfil1.PNG' alt='' class='rounded-circle border border-black' height='120px' width='120px'>
                                        </div>
                                        <div class='col-12 col-sm-5 col-md-7 col-lg-7 offset-sm-1 col-xxl-9 align-middle text-start '>
                                            <p class='fs-4 mb-0 text-black'><b>".$value['nombre'] . " " . $value['primer_apellido']  ."</b></p>
                                            <div>
                                                <p class='text-gray col-3 mb-0'>DNI:". $value['dni']."</p>
                                                <p class='text-gray col-3 mb-0'>id usuario: ". $value['id_usuario']."</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>";
                }
            ?>
        </div>
    </div>
    <?php
    include "../app/templates/includes/scripts.php";
    unset($_SESSION['datos']);
    ?>
</body>

</html>