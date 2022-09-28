<?php

// web/index.php
// carga del modelo y los controladore
/*
require_once __DIR__ . '/../app/modelo/usuario_modelo.php';
*/ 
require_once __DIR__ . '/../app/controllers/action.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';

require("../app/libs/UserSession.php");
$usersession = UserSession::getUserSession();

/*
Si tenemos que usar sesiones podemos poner aqui el inicio de sesión, de manera que si el usuario todavia no está logueado
lo identificamos como visitante, por ejemplo de la siguiente manera: $_SESSION['nivel_usuario']=0
*/
// enrutamiento
$ruta="";
$map = array(
    /*
    En cada elemento podemos añadir una posición mas que se encargará de otorgar el nivel mínimo para ejecutar la acción
    Puede quedar de la siguiente manera
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0)
    */
    'home' => array('controller' =>'Controller', 'action' =>'home', 'rol'=>0 ),
    'homeAdmin' => array('controller' =>'Controller', 'action' =>'home_admin', 'rol'=>2 ),
    'crearUsuario' => array('controller' =>'Controller', 'action' =>'crearUsuario', 'rol'=>2 ),
    'perfilUsuario' => array('controller' =>'Controller', 'action' =>'perfilUsuario', 'rol' => 2),
    'editarUsuario' => array('controller' =>'Controller', 'action' =>'editarUsuario', 'rol' => 2),
    'login' => array('controller' =>'Controller', 'action' =>'login', 'rol'=>0),
    'historiaMed' => array('controller' =>'Controller', 'action' =>'historiaMed', 'rol' => 1),
    'datosPaciente' => array('controller' =>'Controller', 'action' =>'datosPaciente', 'rol' => 1),
    'compartir' => array('controller' =>'Controller', 'action' =>'compartir', 'rol' => 0),
    'perfil' => array('controller' =>'Controller', 'action' =>'perfil', 'rol' => 1),
    'listaHistorias' => array('controller' =>'Controller', 'action' =>'listaHistorias', 'rol' => 1),
    'createPersonalData' => array('controller' =>'Controller', 'action' =>'createPersonalData', 'rol' => 1),
    'createPersonalBackground' => array('controller' =>'Controller', 'action' =>'createPersonalBackground', 'rol' => 1),
    'createPsicobiologico' => array('controller' =>'Controller', 'action' =>'createPsicobiologico', 'rol' => 1),
    'createFunctionalExam' => array('controller' =>'Controller', 'action' =>'createFunctionalExam', 'rol' => 1),
    'createPhysicalExam' => array('controller' =>'Controller', 'action' =>'createPhysicalExam', 'rol' => 1),
    'createPlanDiagnosis' => array('controller' =>'Controller', 'action' =>'createPlanDiagnosis', 'rol' => 1),
    'logout' => array('controller' =>'Controller', 'action' =>'logout', 'rol' => 1)
);
// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {
        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        //include '../app/templates/error/404.html';
    }
} else {
    $ruta = 'home';
}
if (key_exists($ruta, $map)){
    $controlador = $map[$ruta];

    /* 
    Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, si es así ejecutamos el método correspondiente.
    En aso de no existir cabecera de error.
    En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariaos tambien si el usuario tiene permiso suficiente para ejecutar esa acción
    */
    if ($controlador!==NULL && method_exists($controlador['controller'],$controlador['action']) ) {
        if ($_SESSION['rol'] >= $controlador['rol'] && is_numeric($_SESSION['rol']))
        {
            call_user_func(array(new $controlador['controller'],
            $controlador['action']
            ));
        }
        else {
            require '../app/templates/error/403.html';
        }
    }else {
        require '../app/templates/error/404.html';
    }
} else {
    require '../app/templates/error/404.html';
}
