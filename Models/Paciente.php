<?php 
namespace Models;
use Lib\DataBase;

class Paciente extends Database{
    public function __construct(
        ){
          parent::__construct();
        }
    
    function consulPaciente(){
        $sql = 'select * from pacientes';
        return $this->conexion->query($sql);
    }

    function deletePaciente($id){
        $prep = $this->conexion->prepare('update pacientes set alta = 0 where id=:id');
        $prep->execute(array(':id'=>$id));
    }
}
?>