<aside class="col-sm-12 col-md-5 col-lg-4 col-xl-3 d-none d-sm-block pt-3 text-white ">
    <div class="bg-gris radio10 p-3 article-nav-inner">
        <div class="dropdown text-start mb-3">
        <?php
        $cadena="";
        if ( $_SESSION['rol'] >= 1 )
        $cadena ='<div class="dropdown text-start mb-3">
        <a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" 
            href="./index.php?ctl=historiaMed&id_paciente=' . $_GET['id_paciente']. '">
                <b class="fs-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                    Volver
                </b>
            </a>
        </div>';
        echo $cadena;
                echo '<a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" href="./index.php?ctl=createPersonalData&id_paciente=' . $_GET['id_paciente'] . '">';
                ?>
            
                <b class="fs-5">Datos Personales</b>
            </a>
        </div>

        <div class="dropdown text-start mb-3">
            <?php
            echo '<a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" 
            href="./index.php?ctl=createPersonalBackground&id_paciente=' . $_GET['id_paciente'] . '">
            <b class="fs-5">Antecedentes</b></a></div>';
            ?>


            <div class="dropdown text-start mb-3">
                <?php
                echo '<a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" 
            href="./index.php?ctl=createPsicobiologico&id_paciente=' . $_GET['id_paciente'] . '">';
                ?>
                    <b class="fs-5">Habitos Psicobiologicos</b>
                </a>
            </div>

            <div class="dropdown text-start mb-3">

                <?php
                echo '<a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" 
            href="./index.php?ctl=createFunctionalExam&id_paciente=' . $_GET['id_paciente'] . '">';
                ?>
                    <b class="fs-5">Examen Funcional</b>
                </a>
            </div>
            <div class="dropdown text-start mb-3">
            <?php
                echo '<a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" 
            href="./index.php?ctl=createPhysicalExam&id_paciente=' . $_GET['id_paciente'] . '">';
                ?>
                    <b class="fs-5">Examen Físico</b>
                </a>

            </div>

            <div class="dropdown text-start mb-3">
            <?php
                echo '<a class="btn btn-lg w-100 p-0 text-start" type="button" aria-expanded="false" href="./index.php?ctl=createPlanDiagnosis&id_paciente=' . $_GET['id_paciente'] . '">';
                ?>
                    <b class="fs-5">Plan y diagnostico</b>
                </a>
            </div>

        </div>

</aside>