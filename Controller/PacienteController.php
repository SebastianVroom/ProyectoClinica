<?php
namespace Controller;
use Models\Paciente;
use View\PacienteView;
use Controller\BaseController;

class PacienteController extends BaseController{
    function __construct(){
        $this->model = new Paciente;
        $this->view = new PacienteView;
    }

    function mostrarAdmPaciente(){
        $this->chckRol('administrador');
        $Paciente = $this->model->consulPaciente();
        $this->view->mostrAdmPaciente($Paciente);
    }

    function deleteAdm(){
        $this->chckRol('administrador');
        $this->model->deletePaciente($_GET['id']);
        $this->mostrarAdmPaciente();
    }

    function modAdmPaciente(){
        $this->chckRol('administrador');
        $consul = $this->model->consulPaciente($_GET['id']);
        foreach($consul as $c){
            $resul = $c;
        }
        $this->view->modForm($resul);
    }
    
    function update(){
        $this->chckRol('administrador');
        $data=[];
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $data[':nombre'] = filter_var($_POST['nombre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(isset($_POST['apellidos']) && !empty($_POST['apellidos'])){
            $data[':apellidos'] = filter_var($_POST['apellidos'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(isset($_POST['mail']) && !empty($_POST['mail']) && filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
            $data[':mail'] = filter_var($_POST['mail'],FILTER_SANITIZE_EMAIL);
        }
        if(isset($_POST['alta']) && (filter_var($_POST['alta'], FILTER_VALIDATE_INT) === 0 || filter_var($_POST['alta'], FILTER_VALIDATE_INT))){
            $data[':alta'] = filter_var($_POST['alta'],FILTER_SANITIZE_NUMBER_INT);
        }
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        if(count($data) < 4){
            $this->view->displayError('Actualizando Paciente');
        }else{
            $this->model->updatePaciente($data,$id);
            $this->mostrarAdmPaciente();
        }

    }
}
?>