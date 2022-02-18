<?php
namespace Controller;
use Models\Doctor;
use View\DoctorView;
use Controller\BaseController;

class DoctorController extends BaseController{
    function __construct(){
        $this->model = new Doctor;
        $this->view = new DoctorView;
    }

    function mostrarDoctor(){
        $this->chckRol('paciente');
        $Doctor = $this->model->consulDoctores();
        $this->view->mostrDoctores($Doctor);
    }

    function mostrarAdmDoctor(){
        $this->chckRol('administrador');
        $Doctor = $this->model->consulDoctores();
        $this->view->mostrAdmDoctores($Doctor);
    }

    function deleteAdm(){
        $this->chckRol('administrador');
        $this->model->deleteDoctores($_GET['id']);
        $this->mostrarAdmDoctor();
    }

    function createAdmDoctor(){
        $this->chckRol('administrador');
        $this->view->prepForm();
    }

    function registro(){
        $this->chckRol('administrador');
        $data=[];
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $data[':nombre'] = filter_var($_POST['nombre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(isset($_POST['apellidos']) && !empty($_POST['apellidos'])){
            $data[':apellidos'] = filter_var($_POST['apellidos'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(isset($_POST['especialidad']) && !empty($_POST['especialidad'])){
            $data[':especialidad'] = filter_var($_POST['especialidad'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(isset($_POST['tlf']) && !empty($_POST['tlf']) && filter_var($_POST['tlf'], FILTER_VALIDATE_INT)){
            $data[':tlf'] = filter_var($_POST['tlf'],FILTER_SANITIZE_NUMBER_INT);
        }
        if(count($data) < 4){
            $this->view->displayError('registrando doctor');
        }else{
            $this->model->insertDoctor($data);
            $this->mostrarAdmDoctor();
        }
    }
    
    function modAdmDoctor(){
        $this->chckRol('administrador');
        $consul = $this->model->consuldoctores($_GET['id']);
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
        if(isset($_POST['especialidad']) && !empty($_POST['especialidad'])){
            $data[':especialidad'] = filter_var($_POST['especialidad'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        if(isset($_POST['tlf']) && !empty($_POST['tlf']) && filter_var($_POST['tlf'], FILTER_VALIDATE_INT)){
            $data[':tlf'] = filter_var($_POST['tlf'],FILTER_SANITIZE_NUMBER_INT);
        }
        if(isset($_POST['alta']) && (filter_var($_POST['alta'], FILTER_VALIDATE_INT) === 0 || filter_var($_POST['alta'], FILTER_VALIDATE_INT))){
            $data[':alta'] = filter_var($_POST['alta'],FILTER_SANITIZE_NUMBER_INT);
        }
        $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        if(count($data) < 5){
            $this->view->displayError('Actualizando doctor');
        }else{
            $this->model->updateDoctor($data,$id);
            $this->mostrarAdmDoctor();
        }

    }
}
?>