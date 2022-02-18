<?php
if (isset($_SERVER['HTTPS'])){
    $base = 'https:';
}else{
    $base = 'http:';
}
define('BASE_URL', $base.'//localhost/ejercicios%20DWES/ProyectoClinica/');
?>