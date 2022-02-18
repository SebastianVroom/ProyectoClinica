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
            echo "<tr><td>".$p['nombre'].' '.$p['apellidos']."</td><td>".$p['correo']."</td><td>".$p['alta']."</td><td><a href='".BASE_URL."Paciente/deleteAdm&id=".$p['id']."'>Borrar</a> <a href='".BASE_URL."Paciente/modAdmPaciente&id=".$p['id']."''>Modificar</a></td></tr>";
        }
        echo '</table>';
    }

    function modForm($data){
        print(
            "<fieldset>
                <legend>Modifcacion Pacientes</legend>
                <form method='POST' action='".BASE_URL."Paciente/update' >
                <label>Nombre</label>
                <input name='nombre' value=".$data['nombre']."><br>
                <label>Apellidos</label>
                <input name='apellidos' value=".$data['apellidos']."><br>
                <label>Correo</label>
                <input name='mail' type='mail' value=".$data['correo']."><br>
                <label>Alta</label>
                <input type='number' name='alta' max='1' min='0' value=".$data['alta']."><br>
                <input type='hidden' name='id' value=".$_GET['id'].">
                <input type='submit'><input type='reset'>
                </form>
            </fieldset>"
        );
    }
};
?>