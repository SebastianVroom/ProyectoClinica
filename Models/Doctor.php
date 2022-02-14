<?php 
namespace Models;
use Lib\DataBase;

class Doctor extends Database{
    public function __construct(
        ){
          parent::__construct();
        }
    
    function consulDoctores($id=''){
        if ($id != ''){
            $prep = $this->conexion->prepare('select * from doctores where id = :id');
            $prep->execute(array(':id'=>$id));
            return $prep;
        }else{
            $sql = 'select * from doctores';
            return $this->conexion->query($sql);
        }
    }

    function deleteDoctores($id){
        $prep = $this->conexion->prepare('update doctores set alta = 0 where id=:id');
        $prep->execute(array(':id'=>$id));
    }

    function insertDoctor($data){
        $prep = $this->conexion->prepare('Insert into doctores(nombre,apellidos,especialidad,telefono) values(:nombre,:apellidos,:especialidad,:tlf)');
        foreach($data as $clave=>$dato){
            $prep->bindValue($clave,$dato);
        }
        $prep->execute();
    }

    function updateDoctor($data,$id){
        $prep = $this->conexion->prepare('
        update doctores set nombre=:nombre,apellidos=:apellidos,especialidad=:especialidad,telefono=:tlf,alta=:alta where id='.$id);
        foreach($data as $clave=>$dato){
            $prep->bindValue($clave,$dato);
        }
        $prep->execute();
    }
}
?>