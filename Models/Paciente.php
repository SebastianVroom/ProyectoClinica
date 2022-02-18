<?php 
namespace Models;
use Lib\DataBase;

class Paciente extends Database{
    public function __construct(
        ){
          parent::__construct();
        }
    
    function consulPaciente($id=''){
        if ($id != ''){
            $prep = $this->conexion->prepare('select * from pacientes where id = :id');
            $prep->execute(array(':id'=>$id));
            return $prep;
        }else{
            $sql = 'select * from pacientes';
            return $this->conexion->query($sql);
        }
    }

    function deletePaciente($id){
        $prep = $this->conexion->prepare('update pacientes set alta = 0 where id=:id');
        $prep->execute(array(':id'=>$id));
    }

    function updatePaciente($data,$id){
        $prep = $this->conexion->prepare('
        update pacientes set nombre=:nombre,apellidos=:apellidos,correo=:mail,alta=:alta where id='.$id);
        foreach($data as $clave=>$dato){
            $prep->bindValue($clave,$dato);
        }
        $prep->execute();
    }
}
?>