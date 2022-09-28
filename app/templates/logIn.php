<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../app/templates/includes/links.php" ?>
    <style>
        .text-red {
    color: rgb(144, 31, 31);
}

    </style>
</head>

<body>
    <?php
    include "../app/templates/includes/header.php";
    ?>

    <div class="container mt-5 bg-light border border-primary radio10 p-5">
        <h1 class="text-center mb-5 mt-5">Inicia sesion!!</h1>
        <form class="pe-3 ps-3" action="" method="POST">
            <div class="form-floating mb-3">
                <input type="text" placeholder="Username" class="form-control" name="user_name" pattern="^[a-zA-Z0-9]{4,24}$" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" placeholder="Password" class="form-control" name="pw" required>
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <?php
                    if ($mensaje !== "") echo "<p class='ms-2 text-red'>- $mensaje</p>";
                ?>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="login_button" class="btn btn-dark m-2">Login</button>
            </div>
        </form>
    </div>
</body>

<?php include "../app/templates/includes/scripts.php" ?>

</html>