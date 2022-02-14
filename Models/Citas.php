<?php 
namespace Models;
use Lib\DataBase;

class Citas extends Database{
    public function __construct(
        ){
          parent::__construct();
        }
    
    function consulCitas($id = ''){
        if ($id != ''){
            $prep = $this->conexion->prepare('select citas.id,fecha,hora,doctores.nombre,doctores.apellidos,doctores.especialidad from citas,pacientes,doctores where citas.paciente_id = pacientes.id and citas.doctor_id=doctores.id and citas.paciente_id = :id');
            $prep->execute(array(':id'=>$id));
            return $prep;
        }else{
            $sql = 'select pacientes.nombre as Pnombre, pacientes.apellidos as Papellidos,citas.id,fecha,hora,doctores.nombre,doctores.apellidos,doctores.especialidad from citas,pacientes,doctores where citas.paciente_id = pacientes.id and citas.doctor_id=doctores.id';
            return $this->conexion->query($sql);
        }
    }

    function deleteCita($id){
        $prep = $this->conexion->prepare('delete from citas where id=:id');
        $prep->execute(array(':id'=>$id));
    }

    function Consuldet(){
        $sqlP = 'select nombre, apellidos, id, alta from pacientes';
        $sqlD = 'select nombre, apellidos, id, especialidad, alta from doctores';
        $resul = [];
        $resul['pacientes'] = $this->conexion->query($sqlP);
        $resul['doctores'] = $this->conexion->query($sqlD);
        return $resul;
    }

    function insertCita($data){
        $prep = $this->conexion->prepare('Insert into citas(doctor_id,fecha,hora,paciente_id) values(:doctor,:fecha,:tiempo,:paciente)');
        foreach($data as $clave=>$dato){
            $prep->bindValue($clave,$dato);
        }
        $prep->execute();
    }
}
?>