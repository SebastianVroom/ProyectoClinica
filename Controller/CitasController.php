<?php
namespace Controller;
use Models\Citas;
use View\CitasView;
use Controller\BaseController;

class CitasController extends BaseController{
    function __construct(){
        $this->model = new Citas;
        $this->view = new CitasView;
    }
    
    function mostrarCitas(){
        $this->chckRol('paciente');
        $citas = $this->model->consulCitas($_SESSION['userdata']['id']);
        $this->view->mostrCitas($citas);
    }

    function mostrarAdmCitas(){
        $this->chckRol('administrador');
        $citas = $this->model->consulCitas();
        $this->view->mostrAdmCitas($citas);
    }

    function delete(){
        $this->chckRol('paciente');
        $this->model->deleteCita($_GET['id']);
        $this->mostrarCitas();
    }

    function deleteAdm(){
        $this->chckRol('administrador');
        $this->model->deleteCita($_GET['id']);
        $this->mostrarAdmCitas();
    }

    function prepAdmForm(){
        $this->chckRol('administrador');
        $data = $this->model->Consuldet();
        $this->view->showAdmForm($data);
    }

    function prepForm(){
        $this->chckRol('paciente');
        $data = $this->model->Consuldet();
        $this->view->showForm($data);
    }

    function crearAdmCita(){
        $this->chckRol('administrador');
        $data=[];
        if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
            $data[':fecha'] = filter_var($_POST['fecha'],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['tiempo']) && !empty($_POST['tiempo'])){
            $data[':tiempo'] = filter_var($_POST['tiempo'],FILTER_SANITIZE_SPECIAL_CHARS);
        }if(isset($_POST['paciente']) && !empty($_POST['paciente'] && filter_var($_POST['paciente'],FILTER_VALIDATE_INT))){
            $data[':paciente'] = filter_var($_POST['paciente'],FILTER_SANITIZE_NUMBER_INT);
        }if(isset($_POST['doctor']) && !empty($_POST['doctor'] && filter_var($_POST['doctor'],FILTER_VALIDATE_INT))){
            $data[':doctor'] = filter_var($_POST['doctor'],FILTER_SANITIZE_NUMBER_INT);
        }if(count($data) < 4){
            $this->view->displayError('Registrando Cita');
        }else{
            $this->model->insertAdmCita($data);
            $this->mostrarCitas();
        }
    }

    function crearCita(){
        $this->chckRol('paciente');
        $data=[];
        if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
            $data[':fecha'] = filter_var($_POST['fecha'],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['tiempo']) && !empty($_POST['tiempo'])){
            $data[':tiempo'] = filter_var($_POST['tiempo'],FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if(isset($_POST['doctor']) && !empty($_POST['doctor'] && filter_var($_POST['doctor'],FILTER_VALIDATE_INT))){
            $data[':doctor'] = filter_var($_POST['doctor'],FILTER_SANITIZE_NUMBER_INT);
        }if(count($data) < 3){
            $this->view->displayError('Registrando Cita');
        }else{
            $data[':paciente']=$_SESSION['userdata']['id'];
            $this->model->insertCita($data);
            $this->mostrarCitas();
        }
    }
}
?>