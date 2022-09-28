
<!-- 
//_____________________________header para usuario no registrado.
    rol => 0
-->

<?php
if ($_SESSION['rol']!==1 && $_SESSION['rol']!==2)
    $cadena ='<header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
                    <a class="navbar-brand" href="./index.php?ctl=home">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav"><!--
                            <li class="nav-item active"
                                <a class="nav-link" href="./index.php?ctl=sobreNosotros">Sobre Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?ctl=contactanos">Contáctanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?ctl=contratar">Contratar Servicio</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php?ctl=login">Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>';
?>
<!-- 
//_____________________________header para usuario medico.
rol => 0
-->

<?php
if ($_SESSION['rol']==1)
    $cadena='<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
            <a class="navbar-brand" href="./index.php?ctl=listaHistorias">Historias Médica</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./index.php?ctl=perfil">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?ctl=home">Citas(prox)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?ctl=logout">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>';

?>
<!-- 
//_____________________________header para usuario ADMIN.
rol => 0
-->

<?php
if ($_SESSION['rol']==2)
$cadena ='<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <a class="navbar-brand" href="./index.php?ctl=homeAdmin">Lista Usuarios</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?ctl=logout">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
</header>';

echo $cadena;
?>