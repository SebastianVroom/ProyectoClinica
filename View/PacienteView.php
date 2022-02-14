<?php
namespace View;

class PacienteView{
    function __construct()
    {
        
    }
    function displayError($msg){
        print('<p>Error: '.$msg.'</p>');
    }

    function mostrarMsg($msg){
        print('<h4>'.$msg.'</h4>');
    }

    function mostrAdmPaciente($pacientes){
        echo '<table><tr><td>Nombre</td><td>Email</td><td>De Alta</td><td>Acciones</td></tr>';
        foreach($pacientes as $p){
            echo "<tr><td>".$p['nombre'].' '.$p['apellidos']."</td><td>".$p['correo']."</td><td>".$p['alta']."</td><td><a href='index.php?controllador=Controller\PacienteController&accion=deleteAdm&id=".$p['id']."'>Borrar</a></td></tr>";
        }
        echo '</table>';
    }
};
?>