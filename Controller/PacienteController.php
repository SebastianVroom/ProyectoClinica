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
}
?>