<?php
include_once("conexion.php");


/* Al extender la conexión, se llama al constructor de connection, lo cual da acceso a $db */
/* Los nombres de las funciones son explicativas. */
class Usuario extends conexion
{
    public function getUserId($u)
    {
        return $this->db->query("SELECT `iduser` FROM `user` WHERE `username` = '$u'", PDO::FETCH_ASSOC)->fetch()['iduser'];
    }

    public function getUserById($id)
    {
        return $this->db->query("SELECT * FROM `usuario` WHERE `id_usuario` = $id", PDO::FETCH_ASSOC)->fetch();
    }

    public function getUserByUsername($u)
    {
        return $this->db->query("SELECT * FROM `usuario` WHERE `user_name` = '$u'", PDO::FETCH_ASSOC)->fetch();
    }

    public function getUsers()
    {
        return $this->db->query("SELECT * FROM `usuario` ORDER BY `id_usuario` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }

    public function setUsuario($usuario, $pw, $nombre, $apellido1, $apellido2, $sexo, $fechaNac, $direccion, $dni, $tipo_usuario = 0)
    {
        $creation_date = date("Y-m-d");
        $sql = "INSERT INTO usuario (tipo_usuario, user_name, contrasena, nombre, primer_apellido, segundo_apellido, Sexo, fecha_nacimiento, direccion, dni) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $this->db->prepare($sql)->execute([$tipo_usuario, $usuario, $pw, $nombre, $apellido1, $apellido2, $sexo, $fechaNac, $direccion, $dni]);
    }

    public function updateUsuario($idPaciente, $usuario, $pw, $nombre, $apellido1, $apellido2, $sexo, $fechaNac, $direccion, $dni, $tipo_usuario)
    {
        $sql = "UPDATE usuario SET `tipo_usuario`=?, `user_name`=?, `contrasena`=?, `nombre`=?, `primer_apellido`=?, `segundo_apellido`=?, `Sexo`=?, `fecha_nacimiento`=?, `direccion`=?, `dni`=? WHERE `id_usuario`=?";
        $this->db->prepare($sql)->execute(array($tipo_usuario, $usuario, $pw, $nombre, $apellido1, $apellido2, $sexo, $fechaNac, $direccion, $dni, $idPaciente));
    }
    public function role($user_id)
    {
        return $this->db->query("SELECT `role` FROM `user` WHERE `iduser`=$user_id", PDO::FETCH_ASSOC)->fetch();
    }
}
    
    /*

    public $id_usuario;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_idUsuario($Usuario) {
         
    }

    public function get_Usuario($idUsuario)
    {

        try {
            $consulta = "select * FROM usuarios WHERE id=?";

            $resultado = parent::prepare($consulta);

            $resultado->bindParam(1, $idUsuario);

            if ($resultado->execute()) {

                $arrayResultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        if (count($arrayResultado) != 0) {
            foreach ($arrayResultado as $key =>$value) {
                $resultado = $value;
            }
            return $resultado;
        } else {
            $errores["usuario"] = "El usuario no existe";
            return false;
        }
    }

    public function set_Usuario($usuario, $pass, $activo, $email, $fNacimiento, $sexo, $nombre, &$errores)
    {

        if ($this->isset_Usuario($usuario, $this)) {
            $errores["usuario"] = "El usuario ya existe";
            return false;
        } else {
            try {
                // Preparamos consulta
                $stmt = parent::prepare("INSERT INTO usuarios (usuario, pass, activo, email, fNacimiento, sexo, nombre) values (?, ?, ?, ?, ?, ?, ?)");

                // Bind
                $stmt->bindParam(1, $usuario);
                $stmt->bindParam(2, $pass);
                $stmt->bindParam(3, $activo);
                $stmt->bindParam(4, $email);
                $stmt->bindParam(5, $fNacimiento);
                $stmt->bindParam(6, $sexo);
                $stmt->bindParam(7, $nombre);
                //tambien con $stmt->blindValue() *//*

                // Excecute
                if ($stmt->execute()) {
                    $id_usuario = parent::lastInsertId();
                    return $id_usuario;
                } else
                    echo "No se ha insertado ningún registro";
                    return false;
            } catch (PDOException $e) {

                // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                $errores['datos'] = "Ha habido un error <br>";
            }
        }
    }

    public static function isset_Usuario($usuario, $pdo = NULL, &$errores = NULL)
    {
        try {
            $consulta = "select usuario FROM usuarios WHERE usuario=?";

            $resultado = $pdo->prepare($consulta);

            $resultado->bindParam(1, $usuario);

            if ($resultado->execute()) {

                $arrayResultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

        if (count($arrayResultado) != 0) {
            return true;
        } else {
            $errores["usuario"] = "El usuario no existe";
            return false;
        }
    }

    public function cContrasena_Usuario($usuario, $pass, &$errores)
    {
        try {
            $consulta = "select pass FROM usuarios WHERE usuario=?";

            $resultado = parent::prepare($consulta);

            $resultado->bindParam(1, $usuario);

            if ($resultado->execute()) {

                $arrayResultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

                foreach ($arrayResultado as $key => $value)
                {
                    $contra=$value;
                }
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

        if (password_verify($pass, $contra["pass"])) {
            return true;
        } else {
            $errores["contrasena"] = "La contraseña no coincide";
            return false;
        }
    }
}*/
