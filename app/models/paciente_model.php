<?php
include_once("conexion.php");


/* Al extender la conexión, se llama al constructor de connection, lo cual da acceso a $db */
/* Los nombres de las funciones son explicativas. */
class Paciente extends conexion
{
    //---------------PACIENTES.
    public function getPacientes()
    {
        return $this->db->query("SELECT id_paciente, nombre, primer_apellido, segundo_apellido, edad, sexo FROM `paciente` ORDER BY `nombre` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }
    public function getIdPacienteByLastDateIntroduction()
    {
        return $this->db->query("SELECT id_paciente FROM `paciente` ORDER BY `fecha_introduccion` ASC LIMIT 1", PDO::FETCH_ASSOC)->fetchAll();
    }
    public function getPacienteByLastDateIntroduction()
    {
        return $this->db->query("SELECT * FROM `paciente` ORDER BY `fecha_introduccion` ASC LIMIT 1", PDO::FETCH_ASSOC)->fetchAll();
    }

    //---------------DATOS BASICOS DEL PACIENTE.
    public function setPaciente($nombre, $primer_apellido, $segundo_apellido, $dni, $fecha_nacimiento)
    {
        $creation_date = date("Y-m-d");
        $sql = "INSERT INTO paciente (nombre, primer_apellido, segundo_apellido, fecha_nacimiento, dni, fecha_introduccion ) VALUES (?,?,?,?,?,?)";
        $this->db->prepare($sql)->execute([$nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $dni, $creation_date]);
    }

    public function getPaciente1($id)
    {
        return $this->db->query("SELECT * FROM `paciente` WHERE `id_paciente` = '$id'", PDO::FETCH_ASSOC)->fetch();
    }

    public function updatePaciente1($idPaciente, $fechaNac, $sexo, $direccion, $estadoCivil, $id_empleo, $formacion, $id_paisOrigen, $id_paisResidencia, $seguroMed )
    {
        $edad=calcularEdad($fechaNac);

        $sql = "UPDATE paciente SET `edad`=?, `Sexo`=?, `direccion`=?, `estado_civil`=?, `id_empleo`=?, `formacion`=?, `id_pais_origen`=?, `id_pais_residencia`=?, `seguro_medico`=? WHERE `id_paciente`=?";
    $this->db->prepare($sql)->execute(array($edad,$sexo, $direccion, $estadoCivil, $id_empleo, $formacion, $id_paisOrigen, $id_paisResidencia, $seguroMed, $idPaciente));
    }

    public function updatePaciente2($idPaciente, $nombre, $primer_apellido, $segundo_apellido, $edad, $sexo, $fechaNac, $direccion, $dni, $estadoCivil, $id_empleo, $formacion, $id_paisOrigen, $id_paisResidencia, $seguroMed)
    {
        $edad=calcularEdad($fechaNac);

        $sql = "UPDATE paciente SET `nombre`=?,`primer_apellido`=?, `segundo_apellido`=?, `edad`=?, `Sexo`=?, `fecha_nacimiento`=?, `direccion`=?, `dni`=?,`estado_civil`=?, `id_empleo`=?, `formacion`=?, `id_pais_origen`=?, `id_pais_residencia`=?, `seguro_medico`=? WHERE `id_paciente`=?";
    $this->db->prepare($sql)->execute(array($nombre, $primer_apellido, $segundo_apellido, $edad, $sexo, $fechaNac, $direccion, $dni, $estadoCivil, $id_empleo, $formacion, $id_paisOrigen, $id_paisResidencia, $seguroMed, $idPaciente));
    }


    //---------------ANTECEDENTES.
    public function getAntecedentePersonal($id)
    {
        return $this->db->query("SELECT * FROM `antecedente_personal` WHERE `id_paciente` = '$id' ORDER BY `id_antecedente` DESC", PDO::FETCH_ASSOC)->fetchAll();
    }

    public function getAntecedenteFamiliar($id)
    {
        return $this->db->query("SELECT * FROM `antecedente_familiar` WHERE `id_paciente` = '$id' ORDER BY `id_antecedente` DESC", PDO::FETCH_ASSOC)->fetchAll();
    }

    public function getNameAntecedente($id)
    {
        return $this->db->query("SELECT antecedente FROM `antecedente` WHERE `id_antecedente` = '$id'", PDO::FETCH_ASSOC)->fetch();
    }
    public function getAntecedentes()
    {
      return $this->db->query("SELECT * FROM `antecedente` ORDER BY `antecedente` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }
    public function getFamiliares()
    {
      return $this->db->query("SELECT * FROM `familiar` ORDER BY `nombre` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }

    //funciona como un set y update dependiendo de la existencia de sus datos.
    public function setAntecedentePersonal($idPaciente, $idAntecedente, $descripcion)
    {
        $datosAnteriores = $this->getAntecedentePersonal($idPaciente);
        foreach ($datosAnteriores as $key => $value) {
            $idAntecedentesCreados[] = $value['id_antecedente'];
        }
        $check = false;
        foreach ($datosAnteriores as $key => $value) {
            if ($idAntecedente === $value['id_antecedente'] ) {
                $sql = "UPDATE antecedente_personal SET `id_paciente`=?, `descripcion`=? WHERE (`id_antecedente`=?) AND (`id_paciente`=?)";
                $this->db->prepare($sql)->execute(array($idPaciente, $descripcion, $idAntecedente, $idPaciente));
                
            } else if (!in_array($idAntecedente, $idAntecedentesCreados) && $check == false) {
                $sql = "INSERT INTO antecedente_personal (id_paciente, descripcion, id_antecedente ) VALUES (?,?,?)";
                $this->db->prepare($sql)->execute([$idPaciente, $descripcion, $idAntecedente]);
                $check = true;
            }
        }
    }

    //funciona como un set y update dependiendo de la existencia de sus datos.
    public function setAntecedenteFamiliar($idPaciente, $descripcion, $idFamiliar, $idAntecedente=20)
    {
        $datosAnteriores = $this->getAntecedenteFamiliar($idPaciente);

        foreach ($datosAnteriores as $key => $value) {
            $idAntecedentesCreados[] = $value['id_familiar'];
        }

        $check = false;
        foreach ($idAntecedentesCreados as $key => $value) {
            if ($idFamiliar == $value ) {
                $sql = "UPDATE antecedente_familiar SET `id_antecedente`=?, `descripcion`=? WHERE (`id_familiar`=?) AND (`id_paciente`=?)";
                $this->db->prepare($sql)->execute(array($idAntecedente, $descripcion, $idFamiliar, $idPaciente));
            } else if (!in_array($idFamiliar, $idAntecedentesCreados) && $check == false) {
                $check = true;
            }
        }
        if ($check){
            $sql = "INSERT INTO antecedente_familiar (id_paciente, id_antecedente, id_familiar, descripcion) VALUES (?,?,?,?)";
            $this->db->prepare($sql)->execute([$idPaciente, $idAntecedente, $idFamiliar, $descripcion ]);
        }
        
    }

    //---------------HABITOS PSICOBIOLÓGICOS.
    public function getDatosBasicos($id)
    {
        return $this->db->query("SELECT id_ocupacion, deporte, nivel_estudio, sueño FROM `paciente` WHERE `id_paciente` = '$id'", PDO::FETCH_ASSOC)->fetch();
    }
    public function getDrogas($id)
    {
        return $this->db->query("SELECT * FROM `droga` WHERE `id_paciente` = '$id' ORDER BY `id_droga_table` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }
    public function getTipoDroga()
    {
        return $this->db->query("SELECT * FROM `tipo_droga` ORDER BY `nombre` DESC", PDO::FETCH_ASSOC)->fetchAll();
    }

    //update de los datos basicos (tabla paciente) 
    public function updateDatosBasicos($idPaciente, $id_ocupacion, $deporte, $nivel_estudio, $sueño) {
        $sql = "UPDATE paciente SET `id_ocupacion`=?, `deporte`=?, `nivel_estudio`=?, `sueño`=? WHERE `id_paciente`=?";
        $this->db->prepare($sql)->execute(array($id_ocupacion, $deporte, $nivel_estudio, $sueño, $idPaciente));
    }

    //update y set de los habitos de consumo (tabla droga)
    public function updateHabitos($descripcion, $idDroga, $idTabla, $idPaciente) {
        $sql = "UPDATE droga SET `descripcion`=?, `id_droga`=? WHERE (`id_droga_table`=?) AND (`id_paciente`=?)";
                $this->db->prepare($sql)->execute(array($descripcion, $idDroga, $idTabla, $idPaciente));
    }

    public function setHabitos($idPaciente, $idDroga, $descripcion ){
        $sql = "INSERT INTO droga (descripcion, id_droga, id_paciente) VALUES (?,?,?)";
        $this->db->prepare($sql)->execute([$descripcion, $idDroga, $idPaciente]);
    }

    //---------------PROFESIONES.
    public function getProfesiones()
    {
        return $this->db->query("SELECT * FROM `profesiones` ORDER BY `id_profesion` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }

    //---------------PAISES.
    public function getPaises()
    {
        return $this->db->query("SELECT * FROM `paises` ORDER BY `id_pais` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }

    //---------------Examen Funcional.
    public function updateExamenFuncional($idPaciente, $fur, $menstruacion, $micciones, $intestinal) {
        $sql = "UPDATE paciente SET `FUR`=?, `menstruacion`=?, `micciones`=?, `habito_intestinal`=? WHERE `id_paciente`=?";
        $this->db->prepare($sql)->execute(array($fur, $menstruacion, $micciones, $intestinal, $idPaciente));

    }
    public function getExamenFuncional($id)
    {
        return $this->db->query("SELECT FUR, menstruacion, micciones, habito_intestinal FROM `paciente` WHERE `id_paciente` = '$id'", PDO::FETCH_ASSOC)->fetch();
    }


    //---------------Examen Fisico.
    public function updateExamenFisico($idPaciente, $peso, $talla, $tension_arterial, $respiracion, $pulso, $temperatura) {
        $sql = "UPDATE paciente SET `peso`=?, `talla`=?, `tension_arterial`=?, `respiraciones`=?, `Pulso`=?, `temperatura`=? WHERE `id_paciente`=?";
        $this->db->prepare($sql)->execute(array($peso, $talla, $tension_arterial, $respiracion, $pulso, $temperatura, $idPaciente));

    }
    public function getExamenFisico($id)
    {
        return $this->db->query("SELECT peso, talla, tension_arterial, respiraciones, Pulso, temperatura FROM `paciente` WHERE `id_paciente` = '$id'", PDO::FETCH_ASSOC)->fetch();
    }

    //---------------Examen Fisico.
    public function updateDiagnosticoPlan($idPaciente, $diagnostico, $plan) {
        $sql = "UPDATE paciente SET `diagnostico`=?, `plan`=? WHERE `id_paciente`=?";
        $this->db->prepare($sql)->execute(array($diagnostico, $plan, $idPaciente));

    }
    public function getDiagnosticoPlan($id)
    {
        return $this->db->query("SELECT diagnostico, plan FROM `paciente` WHERE `id_paciente` = '$id'", PDO::FETCH_ASSOC)->fetch();
    }
    
    //---------------Evolucion.
    public function setEvolucion($idPaciente, $evolucion) {
        $creation_date = date("y-m-d");
 
        $fechaCompleta= getdate();
        $hora = $fechaCompleta['hours'] . ":". $fechaCompleta['minutes'];
        
        $sql = "INSERT INTO evolucion (descripcion, fecha, hora, id_paciente) VALUES (?,?,?,?)";
        $this->db->prepare($sql)->execute([$evolucion, $creation_date, $hora, $idPaciente]);
    }
    public function getEvolucion($id)
    {
        return $this->db->query("SELECT * FROM `evolucion` WHERE `id_paciente` = '$id' ORDER BY `fecha` ASC", PDO::FETCH_ASSOC)->fetchAll();
    }
    //borrar evolucion : . . . 
}
