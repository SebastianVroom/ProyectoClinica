<?php 
require_once "autoloader.php";
require_once "View/header.php";
require_once "Lib/PageConfig.php";

$style = BASE_URL.'index.css'?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Clinica
        </title>
        <meta charset="UTF-8" http-equiv="content-type" content="text/html">
        <link rel="stylesheet" media="screen" type="text/css" href=<?=$style?>>
        <script src=""></script>
    </head>
    <body>
<?php

session_start();

if (isset($_SESSION['usertype'])){
    if ($_SESSION['usertype'] == 'paciente'){
        require_once 'View/asidepac.php';
    }else if($_SESSION['usertype'] == 'administrador'){
        require_once 'View/asideadm.php';
    }
}else{
    require_once "View/asideoff.php";
}

if(isset($_GET['controllador']) && !empty($_GET['controllador']) && isset($_GET['accion']) && !empty($_GET['accion'])){
    $cont = 'Controller\\'.$_GET['controllador'].'Controller';
    $act = $_GET['accion'];
    if (class_exists($cont)){
        $cont = new $cont;
        if (method_exists($cont,$act)){
            $cont->$act();
        }
    }else{
        require_once "View/default.php";
    }
}else{
    require_once "View/default.php";
}
?>
    </body>
</html>