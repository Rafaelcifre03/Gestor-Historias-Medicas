<?php


class Controller
{

    public $loader;

    public function error_handler($e)
    {
        require '../app/templates/error/500.html';
        /* echo "Excepción no capturada: " , $e->getMessage(), "\n"; */
    }

    public function __construct()
    {
        set_exception_handler(function($e) {
            $this->error_handler($e);
        });
    }

    public function home()
    {
        require '../app/templates/home.php';
    }

    public function home_admin()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/user_model.php");

        $usuario = new Usuario();
        $usuarios = $usuario->getUsers();

        $_SESSION['datos'] = $usuarios;
        require '../app/templates/admin/home_admin.php';
    }

    public function crearUsuario()
    {
        $error=false;
        include("../app/libs/classValidar.php");
        include("../app/models/user_model.php");

        if (isset($_POST['agregar_paciente'])) {

            $nombre = recoge("nombre");
            $apellido1 = recoge('apellido1');
            $apellido2 = recoge('apellido1');
            $genero = recoge('genero');
            $fechaNac = recoge('fecha_nacimiento');
            $direccion = recoge('direccion');
            $dni =  recoge('dni');
            $usuario = recoge('usuario');
            $contrasena = recoge('contrasena');
            $rol = recoge('rol');

            $edad;

            $datos['nombre'] = $nombre;
            $datos['apellido1'] = $apellido1;
            $datos['apellido2'] = $apellido2;
            $datos['genero'] = $genero;
            $datos['borndate'] = $fechaNac;
            $datos['direction'] = $direccion;
            $datos['dni'] = $dni;
            $datos['usuario'] = $usuario;
            $datos['contrasena'] = $contrasena;

            $regla = [
                array(
                    'name' => 'nombre',
                    'regla' => 'palabraRestringida'
                ),
                array(
                    'name' => 'apellido1',
                    'regla' => 'palabraRestringida'
                ),
                array(
                    'name' => 'apellido2',
                    'regla' => 'palabra'
                ),
                array(
                    'name' => 'dni',
                    'regla' => 'dni'
                ),
                array(
                    'name' => 'genero',
                    'regla' => 'genero'
                ),
                array(
                    'name' => 'direction',
                    'regla' => 'texto'
                ),
                array(
                    'name' => 'usuario',
                    'regla' => 'usuario'
                ),
                array(
                    'name' => 'contrasena',
                    'regla' => 'password'
                ),
            ];
            $validacion = new validacion();
            $validaciones = $validacion->rules($regla, $datos);

            if (is_array($validaciones)) {
                $error=false;
                $usuario=new Usuario();

                $usuario->setUsuario($datos['usuario'], $datos['contrasena'], $datos['nombre'],$datos['apellido1'],$datos['apellido2'],$datos['genero'],$datos['borndate'],$datos['direction'],$datos['dni'],1);
                header('Location: ./index.php?ctl=homeAdmin');
            } else {
                $error=true;
                require '../app/templates/admin/crearUsuario.php';
            }
        } else {
            require '../app/templates/admin/crearUsuario.php';
        }
    }

    public function editarUsuario()
    {
        $error=false;
        include("../app/libs/classValidar.php");
        include("../app/models/user_model.php");

        if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {
            if (isset($_POST['editar_paciente'])) {

                $nombre = recoge("nombre");
                $apellido1 = recoge('apellido1');
                $apellido2 = recoge('apellido1');
                $genero = recoge('genero');
                $fechaNac = recoge('fecha_nacimiento');
                $direccion = recoge('direccion');
                $dni =  recoge('dni');
                $usuario = recoge('usuario');
                $contrasena = recoge('contrasena');
                $rol = recoge('rol');
    
                $edad;
    
                $datos['nombre'] = $nombre;
                $datos['apellido1'] = $apellido1;
                $datos['apellido2'] = $apellido2;
                $datos['genero'] = $genero;
                $datos['borndate'] = $fechaNac;
                $datos['direction'] = $direccion;
                $datos['dni'] = $dni;
                $datos['usuario'] = $usuario;
                $datos['contrasena'] = $contrasena;
    
                $regla = [
                    array(
                        'name' => 'nombre',
                        'regla' => 'palabraRestringida'
                    ),
                    array(
                        'name' => 'apellido1',
                        'regla' => 'palabraRestringida'
                    ),
                    array(
                        'name' => 'apellido2',
                        'regla' => 'palabra'
                    ),
                    array(
                        'name' => 'dni',
                        'regla' => 'dni'
                    ),
                    array(
                        'name' => 'genero',
                        'regla' => 'genero'
                    ),
                    array(
                        'name' => 'direction',
                        'regla' => 'texto'
                    ),
                    array(
                        'name' => 'usuario',
                        'regla' => 'usuario'
                    ),
                    array(
                        'name' => 'contrasena',
                        'regla' => 'password'
                    ),
                ];
                $validacion = new validacion();
                $validaciones = $validacion->rules($regla, $datos);
    
                if (is_array($validaciones)) {
                    $error=false;
                    $usuario=new Usuario();
    
                    $usuario->updateUsuario($_GET['id_usuario'], $datos['usuario'], $datos['contrasena'], $datos['nombre'],$datos['apellido1'],$datos['apellido2'],$datos['genero'],$datos['borndate'],$datos['direction'],$datos['dni'],$rol);
                    header('Location: ./index.php?ctl=homeAdmin');
                } else {
                    $error=true;
                    $usuario = new Usuario();
                    $_SESSION['datos']= $usuario->getUserById($_GET['id_usuario']);
                    require '../app/templates/admin/editarUsuario.php';
                }
            } else {
                //si no se a apretado el boton
                $usuario = new Usuario();

                
                $_SESSION['datos']= $usuario->getUserById($_GET['id_usuario']);
                require '../app/templates/admin/editarUsuario.php';
            }
        }else {
            require '../app/templates/error/404.html';
        }
    }
        

    public function perfilUsuario()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/user_model.php");

        $usuario = new Usuario();
        $usuarios = $usuario->getUsers();

        $_SESSION['datos'] = $usuarios;
        require '../app/templates/admin/perfilUsuario.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: ./index.php?ctl=home');
    }

    public function login()
    {
        $errores = array();
        $mensaje = "";

        include("../app/libs/classValidar.php");
        include("../app/models/user_model.php");

        //si se realiza una peticion post significa que se hace un intento de login
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
            header("Location: ./index.php?ctl=listaHistorias");
        } else if ($_SESSION['rol'] == 2) {
            header("Location: ./index.php?ctl=homeAdmin");
        } else {
            if (isset($_POST['login_button'])) {
                $nombre = recoge("user_name");
                $pw = recoge("pw");

                $validacion = new Validacion();

                $datos['name'] = $nombre;
                $datos['pw'] = $pw;
                $regla = array(
                    array(
                        'name' => 'name',
                        'regla' => 'palabra'
                    ),
                    array(
                        'name' => 'pw',
                        'regla' => 'password'
                    )
                );
                $validaciones = $validacion->rules($regla, $datos);

                if (is_array($validaciones)) {
                    #comprobamos que el usuario existe
                    $user = new Usuario();
                    $userData =  $user->getUserByUsername($datos['name']);

                    if (count($userData) > 0) {
                        #comprobamos contrasena
                        //if (password_verify($datos['pw'], $userData['contrasena'])) {
                        if ($datos['pw'] == $userData['contrasena']) {
                            $_SESSION['id'] = $userData['id_usuario'];

                            $usersession = UserSession::getUserSession();
                            $usersession->addSessionValue("id", $userData['id_usuario']);
                            $usersession->addSessionValue("rol", $userData['tipo_usuario']);

                            if ($_SESSION['rol'] == 1)
                                header("Location: ./index.php?ctl=listaHistorias");
                            else if ($_SESSION['rol'] == 2)
                                header("Location: ./index.php?ctl=homeAdmin");
                        } else {
                            $mensaje = "el usuario o contraseña son incorrectos";
                            include '../app/templates/logIn.php';
                        }
                    } else {
                        $mensaje = "el usuario o contraseña son incorrectos";
                        include '../app/templates/logIn.php';
                    }
                } else {
                    $mensaje = "El usuario o contraseña son incorrectos";
                    include '../app/templates/logIn.php';
                }
            } else {
                include '../app/templates/logIn.php';
            }
        }
    }

    public function compartir()
    {

        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");

        $_SESSION['rol'] = 0;

        if (isset($_GET['datos'])) {
            /* Deshacemos el trabajo hecho por base64_encode */
            $datos = base64_decode($_GET['datos']);
            /* Deshacemos el trabajo hecho por 'serialize' */
            $datos = unserialize($datos);

            $datosPaciente = $datos[0];
            $ocupacion = $datos[2];
            $empleo = $datos[1];
            $origen = $datos[3];
            $residencia = $datos[4];
            $nombreA = $datos[5];
            $antecedentesPer = $datos[6];
            $nombreF = $datos[7];
            $antecedentesFam = $datos[8];
            $nombreD = $datos[9];
            $habitos = $datos[10];
            require '../app/templates/medicalHistory/compartir.php';
        } else {
            require '../app/templates/error/404.html';
        }
    }

    public function historiaMed()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        if (isset($_POST['enviar'])) {

            $datos = [
                'evolucion' => recoge('evolucion')
            ];

            $reglas = [
                array(
                    'name' => 'evolucion',
                    'regla' => 'texto'
                ),
            ];

            $validacion = new Validacion();

            $validaciones = $validacion->rules($reglas, $datos);

            if (is_array($validaciones)) {
                $paciente = new Paciente();

                $pacientesTodos = $paciente->getPacientes();
                $ids = array();

                foreach ($pacientesTodos as $key => $value) {
                    $ids[] = $value['id_paciente'];
                }
                if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
                    $paciente = new Paciente();

                    $paciente->setEvolucion($_GET['id_paciente'], $datos['evolucion']);
                    header("location: ./index.php?ctl=historiaMed&id_paciente=" . $_GET['id_paciente']);
                } else {
                    require '../app/templates/error/404.html';
                }
            } else {
                $error = true;
                $paciente = new Paciente();
                $pacientesTodos = $paciente->getPacientes();
                $ids = array();

                foreach ($pacientesTodos as $key => $value) {
                    $ids[] = $value['id_paciente'];
                }
                if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
                    //compartir historia

                    $ocupacion = "";
                    $empleo = "";
                    $origen = "";
                    $residencia = "";
                    $nombreD = "";
                    $nombreA = "";
                    $nombreF = "";

                    $datosPaciente = $paciente->getPaciente1($_GET['id_paciente']);
                    $compartir[] = $datosPaciente;
                    //Obtener datos de la profesion
                    $profesiones = $paciente->getProfesiones();
                    foreach ($profesiones as $key => $value) {
                        $idProfesiones[] = $value['id_profesion'];
                        $nombreProfesiones[] = $value['nombre_empleo'];
                    }
                    if (in_array($datosPaciente['id_empleo'], $idProfesiones))
                        $empleo = $nombreProfesiones[$datosPaciente['id_empleo'] - 1];

                    $compartir[] = $empleo;

                    //Obtener datos de la ocupacion
                    $profesiones = $paciente->getProfesiones();
                    foreach ($profesiones as $key => $value) {
                        $idProfesiones[] = $value['id_profesion'];
                        $nombreProfesiones[] = $value['nombre_empleo'];
                    }
                    if (in_array($datosPaciente['id_ocupacion'], $idProfesiones))
                        $ocupacion = $nombreProfesiones[$datosPaciente['id_ocupacion'] - 1];

                    $compartir[] = $ocupacion;
                    //obtener datos sobre pais.
                    $paises = $paciente->getPaises();
                    foreach ($paises as $key => $value) {
                        $idPaises[] = $value['id_pais'];
                        $nombresPaises[] = $value['nombre_pais'];
                    }
                    if (in_array($datosPaciente['id_pais_origen'], $idPaises))
                        $origen = $nombresPaises[array_search($datosPaciente['id_pais_origen'], $idPaises)];
                    if (in_array($datosPaciente['id_pais_residencia'], $idPaises))
                        $residencia = $nombresPaises[array_search($datosPaciente['id_pais_residencia'], $idPaises)];

                    $compartir[] = $origen;
                    $compartir[] = $residencia;
                    //Antecedentes.
                    $antecedentesPer = $paciente->getAntecedentePersonal($_GET['id_paciente']);
                    $antecedentesFam = $paciente->getAntecedenteFamiliar($_GET['id_paciente']);
                    $antecedentes = $paciente->getAntecedentes();
                    $familiares = $paciente->getFamiliares();
                    $nombreA = array();
                    $nombreF = array();
                    $nombreD = array();
                    foreach ($antecedentesPer as $key => $value) {
                        foreach ($antecedentes as $key2 => $value2) {
                            if ($value['id_antecedente'] == $value2['id_antecedente'])
                                array_push($nombreA, $value2['antecedente']);
                        }
                    }

                    $compartir[] = $nombreA;
                    $compartir[] = $antecedentesPer;

                    foreach ($antecedentesFam as $key => $value) {
                        foreach ($familiares as $key2 => $value2) {
                            if ($value['id_familiar'] == $value2['id_familiar'])
                                array_push($nombreF, $value2['nombre']);
                        }
                    }
                    $compartir[] = $nombreF;
                    $compartir[] = $antecedentesFam;

                    //Drogas.
                    $tipoDroga = $paciente->getTipoDroga();
                    $habitos = $paciente->getDrogas($_GET['id_paciente']);

                    foreach ($habitos as $key => $value) {
                        foreach ($tipoDroga as $key2 => $value2) {
                            if ($value['id_droga'] == $value2['id_droga'])
                                array_push($nombreD, $value2['nombre']);
                        }
                    }
                    $compartir[] = $nombreD;
                    $compartir[] = $habitos;

                    $compartir = serialize($compartir);
                    $compartir = base64_encode($compartir);
                    $compartir = urlencode($compartir);

                    //link local
                    $cadenaCompartir = 'http://vps793825.ovh.net/~rc/web/index.php?ctl=compartir&datos=' . $compartir;

                    //---------------------------------------------

                    $evolucion = $paciente->getEvolucion($_GET['id_paciente']);

                    if (COUNT($evolucion) !== 0) {
                        $_SESSION['datos'] = $evolucion;
                    }

                    $_SESSION['paciente'] = $paciente->getPaciente1($_GET['id_paciente']);
                    require '../app/templates/medicalHistory/historia_medica.php';
                }
            }
        } else {
            $error = false;
            $paciente = new Paciente();
            $pacientesTodos = $paciente->getPacientes();
            $ids = array();

            foreach ($pacientesTodos as $key => $value) {
                $ids[] = $value['id_paciente'];
            }
            if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
                //compartir historia

                $ocupacion = "";
                $empleo = "";
                $origen = "";
                $residencia = "";
                $nombreD = "";
                $nombreA = "";
                $nombreF = "";

                $datosPaciente = $paciente->getPaciente1($_GET['id_paciente']);
                $compartir[] = $datosPaciente;
                //Obtener datos de la profesion
                $profesiones = $paciente->getProfesiones();
                foreach ($profesiones as $key => $value) {
                    $idProfesiones[] = $value['id_profesion'];
                    $nombreProfesiones[] = $value['nombre_empleo'];
                }
                if (in_array($datosPaciente['id_empleo'], $idProfesiones))
                    $empleo = $nombreProfesiones[$datosPaciente['id_empleo'] - 2];

                $compartir[] = $empleo;

                //Obtener datos de la ocupacion
                $profesiones = $paciente->getProfesiones();
                foreach ($profesiones as $key => $value) {
                    $idProfesiones[] = $value['id_profesion'];
                    $nombreProfesiones[] = $value['nombre_empleo'];
                }
                if (in_array($datosPaciente['id_ocupacion'], $idProfesiones))
                    $ocupacion = $nombreProfesiones[$datosPaciente['id_ocupacion'] - 2];

                $compartir[] = $ocupacion;
                //obtener datos sobre pais.
                $paises = $paciente->getPaises();
                foreach ($paises as $key => $value) {
                    $idPaises[] = $value['id_pais'];
                    $nombresPaises[] = $value['nombre_pais'];
                }
                if (in_array($datosPaciente['id_pais_origen'], $idPaises))
                    $origen = $nombresPaises[array_search($datosPaciente['id_pais_origen'], $idPaises)];
                if (in_array($datosPaciente['id_pais_residencia'], $idPaises))
                    $residencia = $nombresPaises[array_search($datosPaciente['id_pais_residencia'], $idPaises)];

                $compartir[] = $origen;
                $compartir[] = $residencia;
                //Antecedentes.
                $antecedentesPer = $paciente->getAntecedentePersonal($_GET['id_paciente']);
                $antecedentesFam = $paciente->getAntecedenteFamiliar($_GET['id_paciente']);
                $antecedentes = $paciente->getAntecedentes();
                $familiares = $paciente->getFamiliares();
                $nombreA = array();
                $nombreF = array();
                $nombreD = array();
                foreach ($antecedentesPer as $key => $value) {
                    foreach ($antecedentes as $key2 => $value2) {
                        if ($value['id_antecedente'] == $value2['id_antecedente'])
                            array_push($nombreA, $value2['antecedente']);
                    }
                }

                $compartir[] = $nombreA;
                $compartir[] = $antecedentesPer;

                foreach ($antecedentesFam as $key => $value) {
                    foreach ($familiares as $key2 => $value2) {
                        if ($value['id_familiar'] == $value2['id_familiar'])
                            array_push($nombreF, $value2['nombre']);
                    }
                }
                $compartir[] = $nombreF;
                $compartir[] = $antecedentesFam;

                //Drogas.
                $tipoDroga = $paciente->getTipoDroga();
                $habitos = $paciente->getDrogas($_GET['id_paciente']);

                foreach ($habitos as $key => $value) {
                    foreach ($tipoDroga as $key2 => $value2) {
                        if ($value['id_droga'] == $value2['id_droga'])
                            array_push($nombreD, $value2['nombre']);
                    }
                }
                $compartir[] = $nombreD;
                $compartir[] = $habitos;

                $compartir = serialize($compartir);
                $compartir = base64_encode($compartir);
                $compartir = urlencode($compartir);

                //link local
                $cadenaCompartir = 'http://vps793825.ovh.net/~rc/web/index.php?ctl=compartir&datos=' . $compartir;

                //---------------------------------------------

                $evolucion = $paciente->getEvolucion($_GET['id_paciente']);

                if (COUNT($evolucion) !== 0) {
                    $_SESSION['datos'] = $evolucion;
                }

                $_SESSION['paciente'] = $paciente->getPaciente1($_GET['id_paciente']);
                require '../app/templates/medicalHistory/historia_medica.php';
            } else {
                require '../app/templates/error/404.html';
            }
        }
    }

    public function datosPaciente()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");

        $paciente = new Paciente();
        $pacientesTodos = $paciente->getPacientes();
        $ids = array();
        $ocupacion = "";
        $empleo = "";
        $origen = "";
        $residencia = "";



        foreach ($pacientesTodos as $key => $value) {
            $ids[] = $value['id_paciente'];
        }
        if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {

            $datosPaciente = $paciente->getPaciente1($_GET['id_paciente']);


            //Obtener datos de la profesion
            $profesiones = $paciente->getProfesiones();
            foreach ($profesiones as $key => $value) {
                $idProfesiones[] = $value['id_profesion'];
                $nombreProfesiones[] = $value['nombre_empleo'];
            }
            if (in_array($datosPaciente['id_empleo'], $idProfesiones))
                $empleo = $nombreProfesiones[$datosPaciente['id_empleo'] - 2];


            //Obtener datos de la ocupacion
            $profesiones = $paciente->getProfesiones();
            foreach ($profesiones as $key => $value) {
                $idProfesiones[] = $value['id_profesion'];
                $nombreProfesiones[] = $value['nombre_empleo'];
            }
            if (in_array($datosPaciente['id_ocupacion'], $idProfesiones))
                $ocupacion = $nombreProfesiones[$datosPaciente['id_ocupacion'] - 2];


            //obtener datos sobre pais.
            $paises = $paciente->getPaises();
            foreach ($paises as $key => $value) {
                $idPaises[] = $value['id_pais'];
                $nombresPaises[] = $value['nombre_pais'];
            }
            if (in_array($datosPaciente['id_pais_origen'], $idPaises))
                $origen = $nombresPaises[array_search($datosPaciente['id_pais_origen'], $idPaises)];
            if (in_array($datosPaciente['id_pais_residencia'], $idPaises))
                $residencia = $nombresPaises[array_search($datosPaciente['id_pais_residencia'], $idPaises)];

            //Antecedentes.
            $antecedentesPer = $paciente->getAntecedentePersonal($_GET['id_paciente']);
            $antecedentesFam = $paciente->getAntecedenteFamiliar($_GET['id_paciente']);
            $antecedentes = $paciente->getAntecedentes();
            $familiares = $paciente->getFamiliares();

            foreach ($antecedentesPer as $key => $value) {
                foreach ($antecedentes as $key2 => $value2) {
                    if ($value['id_antecedente'] == $value2['id_antecedente'])
                        $nombreA[] = $value2['antecedente'];
                }
            }

            foreach ($antecedentesFam as $key => $value) {
                foreach ($familiares as $key2 => $value2) {
                    if ($value['id_familiar'] == $value2['id_familiar'])
                        $nombreF[] = $value2['nombre'];
                }
            }

            //Drogas.
            $tipoDroga = $paciente->getTipoDroga();
            $habitos = $paciente->getDrogas($_GET['id_paciente']);

            foreach ($habitos as $key => $value) {
                foreach ($tipoDroga as $key2 => $value2) {
                    if ($value['id_droga'] == $value2['id_droga'])
                        $nombreD[] = $value2['nombre'];
                }
            }
            require '../app/templates/medicalHistory/datos_personales.php';
        } else {
            require '../app/templates/error/404.html';
        }
    }

    public function perfil()
    {
        require '../app/templates/homeUser/datos_medico.php';
    }

    public function listaHistorias()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        if (isset($_POST['add_paciente'])) {
            $datos = [
                'name' => $nombre = recoge('name'),
                'lastname1' => $apellido1 = recoge('lastname1'),
                'lastname2' => $apellido2 = recoge('lastname2'),
                'dni' => $dni = recoge('dni'),
                'borndate' => $nacimiento = recoge('borndate')
            ];

            $reglas = [
                array(
                    'name' => 'name',
                    'regla' => 'palabraRestringida'
                ),
                array(
                    'name' => 'lastname1',
                    'regla' => 'palabraRestringida'
                ),
                array(
                    'name' => 'lastname2',
                    'regla' => 'palabra'
                ),
                array(
                    'name' => 'dni',
                    'regla' => 'dni'
                ),
                array(
                    'name' => 'borndate',
                    'regla' => 'date'
                )
            ];

            $validacion = new Validacion();

            $validaciones = $validacion->rules($reglas, $datos);
            if (is_array($validaciones)) {
                $paciente = new Paciente();
                $datosP = $paciente->getPacienteByLastDateIntroduction();
                $datosP = $datosP[0];

                if ($datosP['dni'] != $datos['dni'] && $datosP['fecha_nacimiento'] !== $datos['borndate']) {
                    $paciente->setPaciente($datos['name'], $datos['lastname1'], $datos['lastname2'], $datos['dni'], $datos['borndate']);
                    header("location: ./index.php?ctl=createPersonalData&id_paciente=" . $datosP['id_paciente']);
                }
            } else {
                $error = true;
                $paciente = new Paciente();
                $pacientesTodos = $paciente->getPacientes();

                $_SESSION['datos'] = $pacientesTodos;

                include '../app/templates/homeUser/home_user.php';
            }
        } else {
            $error = false;
            $paciente = new Paciente();
            $pacientesTodos = $paciente->getPacientes();

            $_SESSION['datos'] = $pacientesTodos;

            include '../app/templates/homeUser/home_user.php';
        }
    }

    //crear historia medica ---------------------------------------------------------------------

    public function createPersonalData()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        /*
        if (isset($_SESSION['datos']) && is_array($_SESSION['datos'])) {
            $datosSession = $_SESSION['datos'];
        }*/

        if (isset($_POST['save_continueDP'])) {

            echo recoge('borndate');

            $datos = [
                'name' => $name = recoge('name'),
                'lastname1' => $lastname1 = recoge('lastname1'),
                'lastname2' => $lastname2 = recoge('lastname2'),
                'dni' => $dni = recoge('dni'),
                'borndate' => $borndate = recoge('borndate'),
                'genero' => $sexo = recoge('gender'),
                'direction' => $direccion = recoge('direction'),
                'civilstatus' => $civil = recoge('civilstatus'),
                'empleo' => $empleo = recoge('empleo'),
                'training' => $formacion = recoge('training'),
                'origen' => $origen = recoge('origen'),
                'residence' => $residencia = recoge('residencia'),
                'secure' => $seguro = recoge('secure')
            ];


            $reglas = [
                array(
                    'name' => 'name',
                    'regla' => 'palabraRestringida'
                ),
                array(
                    'name' => 'lastname1',
                    'regla' => 'palabraRestringida'
                ),
                array(
                    'name' => 'lastname2',
                    'regla' => 'palabra'
                ),
                array(
                    'name' => 'dni',
                    'regla' => 'dni'
                ),
                array(
                    'name' => 'borndate',
                    'regla' => 'date'
                ),
                array(
                    'name' => 'genero',
                    'regla' => 'genero'
                ),
                array(
                    'name' => 'direction',
                    'regla' => 'texto'
                ),
                array(
                    'name' => 'civilstatus', 
                    'regla' => 'texto'
                ),
                array(
                    'name' => 'empleo',
                    'regla' => 'profesion' 
                ),
                array(
                    'name' => 'training',
                    'regla' => 'texto'
                ),
                array(
                    'name' => 'origen', 
                    'regla' => 'pais'
                ),
                array(
                    'name' => 'residence', 
                    'regla' => 'pais'
                ),
                array(
                    'name' => 'secure',
                    'regla' => 'texto'
                ),
            ];
            $validacion = new Validacion();

            $validaciones = $validacion->rules($reglas, $datos);
            if (is_array($validaciones)) {
                //hago update con los datos
                $paciente = new Paciente();

                $pacientesTodos = $paciente->getPacientes();
                foreach ($pacientesTodos as $key => $value) {
                    $ids[] = $value['id_paciente'];
                }
                if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
                    $paciente = $paciente->updatePaciente2($_GET['id_paciente'], $datos['name'], $datos['lastname1'], $datos['lastname2'], $datos['dni'], $datos['borndate'], $datos['genero'],$datos['direction'],$datos['dni'],$datos['civilstatus'],$datos['empleo'], $datos['training'], $datos['origen'], $datos['residence'], $datos['secure']);
                    header("location: ./index.php?ctl=createPersonalBackground&id_paciente=" . $_GET['id_paciente']);
                } else {
                    require '../app/templates/error/404.html';
                }
            } else {
                $error = true;
                //obtengo valores de paciente para imprimir
                $empleo = "";
                $paciente = new Paciente();
                $pacientesTodos = $paciente->getPacientes();
                foreach ($pacientesTodos as $key => $value) {
                    $ids[] = $value['id_paciente'];
                }
                if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
                    $Fulldatos = $paciente->getPaciente1($_GET['id_paciente']);

                    //obtener nombre del empleo
                    $profesiones = $paciente->getProfesiones();
                    foreach ($profesiones as $key => $value) {
                        $idProfesiones[] = $value['id_profesion'];
                        $nombreProfesiones[] = $value['nombre_empleo'];
                    }
                    if (in_array($Fulldatos['id_empleo'], $idProfesiones))
                        $Fulldatos['empleo'] = $nombreProfesiones[$Fulldatos['id_empleo'] - 1];
                    require '../app/templates/medicalHistory/createForm/create_datos_personales.php';

                    foreach ($profesiones as $key => $value) {
                        $Fulldatos['profesiones'] = array('nombre_empleo' => $value['nombre_empleo'], 'id_profesion' => $value['id_profesion']);
                    }

                    //obtener datos sobre pais.
                    $paises = $paciente->getPaises();
                    foreach ($paises as $key => $value) {
                        $idPaises[] = $value['id_pais'];
                        $nombresPaises[] = $value['nombre_pais'];
                    }
                    if (in_array($Fulldatos['id_pais_origen'], $idPaises))
                        $origen = $nombresPaises[array_search($Fulldatos['id_pais_origen'], $idPaises)];
                    if (in_array($Fulldatos['id_pais_residencia'], $idPaises))
                        $residencia = $nombresPaises[array_search($Fulldatos['id_pais_residencia'], $idPaises)];

                    $Fulldatos['paises'] = array();
                    foreach ($paises as $key => $value) {
                        array_push($Fulldatos['paises'], array('nombre_pais' => $value['nombre_pais'], 'id_pais' => $value['id_pais']));
                    }

                    $Fulldatos['origen'] = $origen;
                    $Fulldatos['residencia'] = $residencia;

                    $_SESSION['inputValue'] = $Fulldatos;
                    
                } else {
                    require '../app/templates/error/404.html';
                }
            }
        } else {
            $error = false;
            //obtengo valores de paciente para imprimir
            $empleo = "";
            $paciente = new Paciente();
            $pacientesTodos = $paciente->getPacientes();
            foreach ($pacientesTodos as $key => $value) {
                $ids[] = $value['id_paciente'];
            }
            if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
                $Fulldatos = $paciente->getPaciente1($_GET['id_paciente']);

                //obtener nombre del empleo
                $profesiones = $paciente->getProfesiones();
                foreach ($profesiones as $key => $value) {
                    $idProfesiones[] = $value['id_profesion'];
                    $nombreProfesiones[] = $value['nombre_empleo'];
                }
                if (in_array($Fulldatos['id_empleo'], $idProfesiones))
                    $Fulldatos['empleo'] = $nombreProfesiones[$Fulldatos['id_empleo']-2];

                foreach ($profesiones as $key => $value) {
                    $Fulldatos['profesiones'] = array('nombre_empleo' => $value['nombre_empleo'], 'id_profesion' => $value['id_profesion']);
                }

                //obtener datos sobre pais.
                $paises = $paciente->getPaises();
                foreach ($paises as $key => $value) {
                    $idPaises[] = $value['id_pais'];
                    $nombresPaises[] = $value['nombre_pais'];
                }
                if (in_array($Fulldatos['id_pais_origen'], $idPaises))
                    $origen = $nombresPaises[array_search($Fulldatos['id_pais_origen'], $idPaises)];
                if (in_array($Fulldatos['id_pais_residencia'], $idPaises))
                    $residencia = $nombresPaises[array_search($Fulldatos['id_pais_residencia'], $idPaises)];

                $Fulldatos['paises'] = array();
                foreach ($paises as $key => $value) {
                    array_push($Fulldatos['paises'], array('nombre_pais' => $value['nombre_pais'], 'id_pais' => $value['id_pais']));
                }

                $Fulldatos['origen'] = $origen;
                $Fulldatos['residencia'] = $residencia;

                $_SESSION['inputValue'] = $Fulldatos;
                require '../app/templates/medicalHistory/createForm/create_datos_personales.php';
            } else {
                require '../app/templates/error/404.html';
            }
        }
    }
    public function createPersonalBackground()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        /*
        if (isset($_SESSION['datos']) && is_array($_SESSION['datos'])) {
            $datosSession = $_SESSION['datos'];
        }*/
        $paciente = new Paciente();
        $pacientesTodos = $paciente->getPacientes();

        foreach ($pacientesTodos as $key => $value) {
            $ids[] = $value['id_paciente'];
        }
        if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {

            if (isset($_POST['save_continue'])) {
                //print_r($_POST);

                $paciente = new Paciente();
                $antecedentes = $paciente->getAntecedentes();
                $familiares = $paciente->getFamiliares();
                $arrayFamiliares = array();

                foreach ($familiares as $key => $value) {
                   $arrayFamiliares[$value['id_familiar']]= $value['nombre'];
                }

                foreach ($_POST as $key => $value) {
                    $check1 = false;
                    $check2 = false;

                        foreach ($antecedentes as $keyA => $valueA) {
                            if ($key === $valueA['antecedente'] && !in_array($key, $arrayFamiliares) && $check1 == false && $key !== 'save_continue') {
                                $datos[$key] = recoge($key);
                                $reglas[]=array('name' => $key, 'regla' => 'textolg');
                                $check1 = true;
                            }
                        }
                        foreach ($arrayFamiliares as $keyB => $valueB) {
                            if ($key === $valueB && $check2 == false && $key !== 'save_continue') {
                                $datos[$key] = recoge($key);
                                $reglas[]=array('name' => $key, 'regla' => 'textolg');
                                $check2 = true;
                            }
                        }
                }


                /*
                $datos = [
                    'hta' => $hta = recoge('hta'),
                    'diabetes' => $diabetes = recoge('diabetes'),
                    'alergia' => $alergia = recoge('alergia'),
                    'tbc' => $tbc = recoge('tbc'),
                    'ebpoc' => $ebpoc = recoge('ebpoc'),
                    'asma' => $asma = recoge('asma'),
                    'hepatitis' => $hepatitis = recoge('hepatitis'),
                    'sarampion' => $sarampion = recoge('sarampion'),
                    'varicela' => $varicela = recoge('varicela'),
                    'parotiditis' => $parotiditis = recoge('parotiditis'),
                    'rubeola' => $rubeola = recoge('rebeola'),
                    'quirurgico' => $quirurgico = recoge('quirurgico'),
                    'traumatico' => $traumatico = recoge('traumatico'),
                    'infecto' => $infecto = recoge('infecto'),
                    'obstetrico' => $obstetrico = recoge('obstetrico'),
                    'anticonceptivo' => $anticonceptivo = recoge('anticonceptivo'),
                    'droga' => $droga = recoge('droga'),
                    'gastrointestinal' => $gastrointenal = recoge('gastrointestinal')
                ];*/
                /*
                $reglas = [
                    array(
                        'name' => 'HTA',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Diabetes',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Hepatitis',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Alergia',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'TBC',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'EBPOC',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Asma',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Quirurgico',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Traumatico',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Sarampion',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Varicela',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Parotiditis',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Rubeola',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Infecto-contagiosas',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Obstetricos',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Anticonceptivo',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Drogas',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'Gastrointestinales',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'madre',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'padre',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'hijo',
                        'regla' => 'textolg'
                    ),
                    array(
                        'name' => 'hija',
                        'regla' => 'textolg'
                    ),

                ];*/
                $validacion = new Validacion();

                $validaciones = $validacion->rules($reglas, $datos);

                if (is_array($validaciones)) {

                    foreach ($datos as $key => $value) {
                        $check = false;
                        foreach ($antecedentes as $keyA => $valueA) {
                            if ($key === $valueA['antecedente'] && !in_array($key, $arrayFamiliares)) {
                                //echo "value: $value". $valueA['id_antecedente'] ."<br>";
                                $paciente->setAntecedentePersonal($_GET['id_paciente'], $valueA['id_antecedente'], $value);
                            }
                        }
                        foreach ($arrayFamiliares as $keyB => $valueB) {
                            if ($key === $valueB && $check == false) {
                                //echo "value: $value". $valueA['id_antecedente'] ."<br>";
                                $paciente->setAntecedenteFamiliar($_GET['id_paciente'], $value, $keyB);
                                $check = true;
                            }
                        
                        }
                    }
                    //header("location: ./index.php?ctl=createPsicobiologico&id_paciente=" . $_GET['id_paciente']);
                } else {
                    $error= true;
                    $paciente = new Paciente();
                    $Fulldatos = $paciente->getAntecedentePersonal($_GET['id_paciente']);
                    $Fulldatos2 = $paciente->getAntecedenteFamiliar($_GET['id_paciente']);
                    $antecedentes = $paciente->getAntecedentes();
                    $familiares = $paciente->getFamiliares();
    
                    ////////////////////////////////////
                    $cadena = "";
                    $cadenaEscrito = "";
                    $datos = array();
                    $antecedenteLleno = array();
                    $check = false;
                    //relleno las variable datos|antecedentesLlenos para manejar los datos.
                    foreach ($Fulldatos as $key => $value) {
                        $datos[$key] = $value;
                        $antecedenteLleno[] = $value['id_antecedente'];
                    }
                    //agrego todos los antecedentes personales, rellenando con valores existentes si los hay a la variable cadena
                    foreach ($antecedentes as $key => $valueA) {
                        $check = false;
                        foreach ($datos as $key => $valueD) {
                            if ($valueA['id_antecedente'] == $valueD['id_antecedente']) {
                                //$cadena .= '<a id="tag_' . $valueA['antecedente'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['antecedente'] . '","' . $valueD['descripcion'] . '")\'>' . $valueA['antecedente'] . ' </a>';
                                $cadenaEscrito .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $valueA['antecedente'] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $valueD['descripcion'] . '" name="' . $valueA['antecedente'] . '"></div></div></div>';
                            } else if (!in_array($valueA['id_antecedente'], $antecedenteLleno) && $check == false) {
                                $cadena .= '<a id="tag_' . $valueA['antecedente'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['antecedente'] . '", "")\'>' . $valueA['antecedente'] . ' </a>';
                                $check = true;
                            }
                        }
                    }
    
                    ////////////////////////////////////
                    $cadena2 = "";
                    $cadenaEscrito2 = "";
                    $datos2 = array();
                    $antecedenteLleno2 = array();
                    $check2 = false;
                    //relleno las variable datos|familiares para manejar los datos.
                    foreach ($Fulldatos2 as $key => $value) {
                        $datos2[$key] = $value;
                        $antecedenteLleno2[] = $value['id_familiar'];
                    }
                    //agrego todos los antecedentes familiares, rellenando con valores existentes si los hay a la variable cadena
                    foreach ($familiares as $key => $valueA) {
                        //print_r($valueA);
                        $check2 = false;
                        foreach ($datos2 as $key => $valueD) {
                            //echo "<br><br>" . $valueA['nombre'] . $valueA['id_familiar'] . "0<br><br>" . in_array($valueA['id_familiar'], $antecedenteLleno2) . $valueA['nombre'] . "    -si<br> . !in_array($valueA['id_familiar'], $antecedenteLleno2) . $valueA['nombre'] . "   -no<br>";
                            if ($valueA['id_familiar'] === $valueD['id_familiar']) {
                                //echo "<br><br>" . $valueA['nombre'] . $valueA['id_familiar'] . "1<br><br>";
                                $cadenaEscrito2 .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $valueA['nombre'] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $valueD['descripcion'] . '" name="' . $valueA['nombre'] . '"></div></div></div>';
                            } else if (!in_array($valueA['id_familiar'], $antecedenteLleno2) && $check2 == false) {
                                //echo "<br><br>" . $valueA['nombre']. $valueA['id_familiar'] . "2<br><br>";
                                $cadena2 .= '<a id="tag_' . $valueA['nombre'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['nombre'] . '" , "", "familiar")\'>' . $valueA['nombre'] . ' </a>';
                                $check2 = true;
                            } //else echo "no va nada <br>";
                        }
                    }
    
                    $_SESSION['inputValue'] = $cadena;
                    $_SESSION['existingValue'] = $cadenaEscrito;
                    $_SESSION['inputValue2'] = $cadena2;
                    $_SESSION['existingValue2'] = $cadenaEscrito2;
    
                    require '../app/templates/medicalHistory/createForm/create_antecedentes.php';
                }
            } else {
                $error= false;
                $paciente = new Paciente();
                $Fulldatos = $paciente->getAntecedentePersonal($_GET['id_paciente']);
                $Fulldatos2 = $paciente->getAntecedenteFamiliar($_GET['id_paciente']);
                $antecedentes = $paciente->getAntecedentes();
                $familiares = $paciente->getFamiliares();

                ////////////////////////////////////
                $cadena = "";
                $cadenaEscrito = "";
                $datos = array();
                $antecedenteLleno = array();
                $check = false;
                //relleno las variable datos|antecedentesLlenos para manejar los datos.
                foreach ($Fulldatos as $key => $value) {
                    $datos[$key] = $value;
                    $antecedenteLleno[] = $value['id_antecedente'];
                }
                //agrego todos los antecedentes personales, rellenando con valores existentes si los hay a la variable cadena
                foreach ($antecedentes as $key => $valueA) {
                    $check = false;
                    foreach ($datos as $key => $valueD) {
                        if ($valueA['id_antecedente'] == $valueD['id_antecedente']) {
                            //$cadena .= '<a id="tag_' . $valueA['antecedente'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['antecedente'] . '","' . $valueD['descripcion'] . '")\'>' . $valueA['antecedente'] . ' </a>';
                            $cadenaEscrito .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $valueA['antecedente'] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $valueD['descripcion'] . '" name="' . $valueA['antecedente'] . '"></div></div></div>';
                        } else if (!in_array($valueA['id_antecedente'], $antecedenteLleno) && $check == false) {
                            $cadena .= '<a id="tag_' . $valueA['antecedente'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['antecedente'] . '", "")\'>' . $valueA['antecedente'] . ' </a>';
                            $check = true;
                        }
                    }
                }

                ////////////////////////////////////
                $cadena2 = "";
                $cadenaEscrito2 = "";
                $datos2 = array();
                $antecedenteLleno2 = array();
                $check2 = false;
                //relleno las variable datos|familiares para manejar los datos.
                foreach ($Fulldatos2 as $key => $value) {
                    $datos2[$key] = $value;
                    $antecedenteLleno2[] = $value['id_familiar'];
                }
                //agrego todos los antecedentes familiares, rellenando con valores existentes si los hay a la variable cadena
                foreach ($familiares as $key => $valueA) {
                    //print_r($valueA);
                    $check2 = false;
                    foreach ($datos2 as $key => $valueD) {
                        //echo "<br><br>" . $valueA['nombre'] . $valueA['id_familiar'] . "0<br><br>" . in_array($valueA['id_familiar'], $antecedenteLleno2) . $valueA['nombre'] . "    -si<br> . !in_array($valueA['id_familiar'], $antecedenteLleno2) . $valueA['nombre'] . "   -no<br>";
                        if ($valueA['id_familiar'] === $valueD['id_familiar']) {
                            //echo "<br><br>" . $valueA['nombre'] . $valueA['id_familiar'] . "1<br><br>";
                            $cadenaEscrito2 .= '<div class="ms-sm-3 mb-2"><div class="d-flex mb-2 w-100 align-middle flex-wrap"><p class="col-12 col-md-5 col-lg-2 align-middle m-0">' . $valueA['nombre'] . '</p><div class="col-12 col-md-7 col-lg-10"><input class="form-control" type="text" value="' . $valueD['descripcion'] . '" name="' . $valueA['nombre'] . '"></div></div></div>';
                        } else if (!in_array($valueA['id_familiar'], $antecedenteLleno2) && $check2 == false) {
                            //echo "<br><br>" . $valueA['nombre']. $valueA['id_familiar'] . "2<br><br>";
                            $cadena2 .= '<a id="tag_' . $valueA['nombre'] . '" class="dropdown-item" onclick=\'createBlock("' . $valueA['nombre'] . '" , "", "familiar")\'>' . $valueA['nombre'] . ' </a>';
                            $check2 = true;
                        } //else echo "no va nada <br>";
                    }
                }

                $_SESSION['inputValue'] = $cadena;
                $_SESSION['existingValue'] = $cadenaEscrito;
                $_SESSION['inputValue2'] = $cadena2;
                $_SESSION['existingValue2'] = $cadenaEscrito2;

                require '../app/templates/medicalHistory/createForm/create_antecedentes.php';
            }
        } else {
            require '../app/templates/error/404.html';
        }
    }
    public function createPsicobiologico()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();
        $tipoDroga = array();

        /*
        if (isset($_SESSION['datos']) && is_array($_SESSION['datos'])) {
            $datosSession = $_SESSION['datos'];
        }*/

        $paciente = new Paciente();
        $pacientesTodos = $paciente->getPacientes();

        foreach ($pacientesTodos as $key => $value) {
            $ids[] = $value['id_paciente'];
        }
        if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
            if (isset($_POST['save_continue'])) {

                foreach ($_POST as $key => $value) {
                    if ($key !== 'save_continue') {
                        $datos[$key] = recoge($key);
                        if (count($datos) > 4)
                            $tipoDroga[$key] = recoge($key);
                    }
                }
                /*
                $datos = [
                    'ocupacion' => $ocupacion = recoge('ocupacion'), //select
                    'deporte' => $deporte = recoge('deporte'),
                    'nivel_estudio' => $estudio = recoge('nivel_estudio'),
                    'sueno' => $sueño = recoge('sueno'),
                    'recreacional' => $recreacional = recoge('recreacional'),
                    'frecuente' => $frecuente = recoge('frecuente'),
                    'diario' => $diario = recoge('diario'),
                ];*/

                $reglas = [
                    array(
                        'name' => 'ocupacion',
                        'regla' => 'numeric'
                    ),
                    array(
                        'name' => 'deporte',
                        'regla' => 'minmax'
                    ),
                    array(
                        'name' => 'nivel_estudio',
                        'regla' => 'minmax'
                    ),
                    array(
                        'name' => 'sueno',
                        'regla' => 'minmax'
                    ),
                    array(
                        'name' => 'recreacional',
                        'regla' => 'minmax'
                    ),
                    array(
                        'name' => 'frecuente',
                        'regla' => 'minmax'
                    ),
                    array(
                        'name' => 'diario',
                        'regla' => 'minmax'
                    ),
                ];
                $validacion = new Validacion();

                $validaciones = $validacion->rules($reglas, $datos);

                if (!is_array($validaciones)) {

                    $paciente = new Paciente();

                    //insert datos tabla usuario

                    $paciente->updateDatosBasicos($_GET['id_paciente'], $datos['ocupacion'], $datos['deporte'], $datos['nivel_estudio'], $datos['sueno']);

                    //_____________________________

                    $totalDrogas = $paciente->getTipoDroga();
                    $habitoDrogas = $paciente->getDrogas($_GET['id_paciente']);
                    $nombresDroga = array();
                    $nombreHabitos = array();
                    $check = false;

                    foreach ($tipoDroga as $key => $value) {
                        $check = false;
                        foreach ($totalDrogas as $key3 => $value3) {
                            if (in_array($key, $value3))
                                $idActual = $value3['id_droga'];
                        }

                        foreach ($habitoDrogas as $key2 => $value2) {
                            $idHabitosExistentes[] = $value2['id_droga'];
                        }

                        foreach ($habitoDrogas as $key2 => $value2) {
                            //update datos tabla droga.
                            if ($idActual == $value2['id_droga'] && $value !== $value2['descripcion']) { //si coincide con los datos anteriores.
                                $paciente->updateHabitos($value, $value2['id_droga'], $value2['id_droga_table'], 8);
                            } else if (!in_array($idActual, $idHabitosExistentes)) { //si no coincide con los anteriores y no está en el array
                                $check = true;
                            }
                        }
                        if ($check) {  //set datos tabla droga.
                            $paciente->setHabitos($_GET['id_paciente'], $idActual, $value);
                            $check = false;
                        }
                    }
                    header("location: ./index.php?ctl=createFunctionalExam&id_paciente=" . $_GET['id_paciente']);
                } else {
                    print_r($validaciones);
                }
            } else { //si no ha enviado datos
                $paciente = new Paciente();
                $tipoDroga = $paciente->getTipoDroga();
                $habitoDrogas = $paciente->getDrogas($_GET['id_paciente']);
                $profesiones = $paciente->getProfesiones();
                $datosBasicos = $paciente->getDatosBasicos($_GET['id_paciente']);

                $nombreProfesiones = array();
                $nombresDroga = array();
                $nombreHabitos = array();
                $check = false;

                //distingue que campos poseen datos antes de la actual vista
                foreach ($tipoDroga as $key => $value) {
                    foreach ($habitoDrogas as $key2 => $value2) {
                        //Posee datos anteriores.
                        if ($value['id_droga'] === $value2['id_droga']) {
                            $nombreHabitos[] = array('nombre' => $value['nombre'], 'descripcion' => $value2['descripcion']);
                            $check = false;
                        }
                        //NO posee datos anteriores.
                        else if (!in_array($value['id_droga'], $value2)) {
                            $check = true;
                        }
                    }
                    if ($check || count($habitoDrogas) == 0)
                        $nombresDroga[] = $value['nombre'];
                }

                foreach ($profesiones as $key => $value) {
                    $nombreProfesiones[] = array('nombre_empleo' => $value['nombre_empleo'], 'id_profesion' => $value['id_profesion']);
                }

                sort($nombresDroga);
                sort($nombreHabitos);
                $datos['habito'] = $nombreHabitos;
                $datos['tipoDroga'] = $nombresDroga;
                $datos['profesiones'] = $nombreProfesiones;
                $datos['datosBasicos'] = $datosBasicos;
                $_SESSION['datosP'] = $datos;

                require '../app/templates/medicalHistory/createForm/create_psicobiologico.php';
            }
        } else {
            require '../app/templates/error/404.html';
        }
    }

    public function createFunctionalExam()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        /*
        if (isset($_SESSION['datos']) && is_array($_SESSION['datos'])) {
            $datosSession = $_SESSION['datos'];
        }*/

        $paciente = new Paciente();
        $pacientesTodos = $paciente->getPacientes();

        foreach ($pacientesTodos as $key => $value) {
            $ids[] = $value['id_paciente'];
        }
        if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
            if (isset($_POST['save_continue'])) {
                $datos = [
                    'fur' => $fur = recoge('fur'), //select
                    'menstruacion' => $menstruacion = recoge('menstruacion'),
                    'micciones' => $micciones = recoge('micciones'),
                    'intestinal' => $intestinal = recoge('intestinal')
                ];

                $reglas = [
                    array(
                        'name' => 'fur',
                        'regla' => 'date'
                    ),
                    array(
                        'name' => 'menstruacion',
                        'regla' => 'texto'
                    ),
                    array(
                        'name' => 'micciones',
                        'regla' => 'texto'
                    ),
                    array(
                        'name' => 'intestinal',
                        'regla' => 'texto'
                    ),
                ];
                $validacion = new Validacion();

                $validaciones = $validacion->rules($reglas, $datos);

                if (is_array($validaciones)) {

                    $paciente = new Paciente();

                    $paciente->updateExamenFuncional($_GET['id_paciente'], $datos['fur'], $datos['menstruacion'], $datos['micciones'], $datos['intestinal']);
                    header("location: ./index.php?ctl=createPhysicalExam&id_paciente=" . $_GET['id_paciente']);
                } else {
                    $error=true;
                    $paciente = new Paciente();
                    $funcional = $paciente->getExamenFuncional($_GET['id_paciente']);
                    $_SESSION['datos'] = $funcional;

                require '../app/templates/medicalHistory/createForm/create_examen_funcional.php';
                }
            } else {
                $error=false;
                $paciente = new Paciente();
                $funcional = $paciente->getExamenFuncional($_GET['id_paciente']);
                $_SESSION['datos'] = $funcional;

                require '../app/templates/medicalHistory/createForm/create_examen_funcional.php';
            }
        } else {
            require '../app/templates/error/404.html';
        }
    }
    public function createPhysicalExam()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        $paciente = new Paciente();
        $pacientesTodos = $paciente->getPacientes();

        foreach ($pacientesTodos as $key => $value) {
            $ids[] = $value['id_paciente'];
        }
        if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
            if (isset($_POST['save_continue'])) {
                $datos = [
                    'peso' => $ocupacion = recoge('peso'), //select
                    'talla' => $deporte = recoge('talla'),
                    'tension' => $estudio = recoge('tension'),
                    'respiracion' => $sueño = recoge('respiracion'),
                    'pulso' => $sueño = recoge('pulso'),
                    'temperatura' => $sueño = recoge('temperatura')
                ];

                $reglas = [
                    array(
                        'name' => 'peso',
                        'regla' => 'numeric'
                    ),
                    array(
                        'name' => 'talla',
                        'regla' => 'numeric'
                    ),
                    array(
                        'name' => 'tension',
                        'regla' => 'texto'
                    ),
                    array(
                        'name' => 'respiracion',
                        'regla' => 'texto'
                    ),
                    array(
                        'name' => 'pulso',
                        'regla' => 'texto'
                    ),
                    array(
                        'name' => 'temperatura',
                        'regla' => 'numeric'
                    )
                ];
                $validacion = new Validacion();

                $validaciones = $validacion->rules($reglas, $datos);

                if (is_array($validaciones)) {

                    $paciente = new Paciente();

                    $paciente->updateExamenFisico($_GET['id_paciente'], $datos['peso'], $datos['talla'], $datos['tension'], $datos['respiracion'], $datos['pulso'], $datos['temperatura']);

                    header("location: ./index.php?ctl=createPlanDiagnosis&id_paciente=" . $_GET['id_paciente']);
                } else {
                    $error=true;
                    $paciente = new Paciente();
                    $fisico = $paciente->getExamenFisico($_GET['id_paciente']);

                    $_SESSION['datos'] = $fisico;
                    require '../app/templates/medicalHistory/createForm/create_examen_fisico.php';
                }
            } else {
                $error=false;
                $paciente = new Paciente();
                $fisico = $paciente->getExamenFisico($_GET['id_paciente']);
                $_SESSION['datos'] = $fisico;
                require '../app/templates/medicalHistory/createForm/create_examen_fisico.php';
            }
        } else {
            require '../app/templates/error/404.html';
        }
    }

    public function createPlanDiagnosis()
    {
        include("../app/libs/classValidar.php");
        include("../app/models/paciente_model.php");
        $datos = array();

        $paciente = new Paciente();
        $pacientesTodos = $paciente->getPacientes();

        foreach ($pacientesTodos as $key => $value) {
            $ids[] = $value['id_paciente'];
        }
        if (isset($_GET['id_paciente']) && in_array($_GET['id_paciente'], $ids)) {
            if (isset($_POST['guardar_historia'])) {
                $datos = [
                    'diagnostico' => $ocupacion = recoge('diagnostico'), //select
                    'plan' => $deporte = recoge('plan')
                ];

                $reglas = [
                    array(
                        'name' => 'diagnostico', // por modif
                        'regla' => 'textoXl'
                    ),
                    array(
                        'name' => 'plan', //por modif
                        'regla' => 'textoXl'
                    )
                ];
                $validacion = new Validacion();
                $validaciones = $validacion->rules($reglas, $datos);

                if (is_array($validaciones)) {
                    $paciente = new Paciente();
                    $paciente->updateDiagnosticoPlan($_GET['id_paciente'], $datos['diagnostico'], $datos['plan']);
                    header("location: ./index.php?ctl=listaHistorias");
                } else {
                    print_r($validaciones);

                    $paciente = new Paciente();
                    $diagnosticoPlan = $paciente->getDiagnosticoPlan($_GET['id_paciente']);

                    $_SESSION['datos'] = $diagnosticoPlan;
                    echo "fallo en validacion";

                    require '../app/templates/medicalHistory/createForm/create_analisis_diagnostico.php';
                }
            } else {

                $paciente = new Paciente();
                $diagnosticoPlan = $paciente->getDiagnosticoPlan($_GET['id_paciente']);

                $_SESSION['datos'] = $diagnosticoPlan;
                require '../app/templates/medicalHistory/createForm/create_analisis_diagnostico.php';
            }
        } else {
            require '../app/templates/error/404.html';
        }
    }
}
