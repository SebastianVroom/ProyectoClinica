<?php
namespace View;

class DoctorView{
    function __construct()
    {
        
    }
    function displayError($msg){
        print('<p>Error: '.$msg.'</p>');
    }

    function mostrarMsg($msg){
        print('<h4>'.$msg.'</h4>');
    }

    function mostrDoctores($doctores){
        echo '<table><tr><td>Doctor</td><td>Especialidad</td><td>TLF</td></tr>';
        foreach($doctores as $d){
            if ($d['alta']){
                echo "<tr><td>".$d['nombre'].' '.$d['apellidos']."</td><td>".$d['especialidad']."</td><td>".$d['telefono']."</td></tr>";
            }
        }
        echo '</table>';
    }

    function mostrAdmDoctores($doctores){
        echo '<table><tr><td>Doctor</td><td>Especialidad</td><td>TLF</td><td>de Alta</td><td>Acciones</td></tr>';
        foreach($doctores as $d){
            echo "<tr><td>".$d['nombre'].' '.$d['apellidos']."</td><td>".$d['especialidad']."</td><td>".$d['telefono']."</td><td>".$d['alta']."</td><td><a href='index.php?controllador=Controller\DoctorController&accion=deleteAdm&id=".$d['id']."'>Borrar</a> <a href='index.php?controllador=Controller\DoctorController&accion=modAdmDoctor&id=".$d['id']."'>Modificar</a></td></tr>";
        }
        echo '</table>';
    }

    function prepForm(){
        print(
            "<fieldset>
                <legend>Registro Doctores</legend>
                <form method='POST' action='index.php?controllador=Controller\DoctorController&accion=registro' >
                <label>Nombre</label>
                <input name='nombre'><br>
                <label>Apellidos</label>
                <input name='apellidos'><br>
                <label>Especialidad</label>
                <input name='especialidad'><br>
                <label>Telefono</label>
                <input type='number' name='tlf'><br>
                <input type='submit'>
                </form>
            </fieldset>"
        );
    }

    function modForm($data){
        print(
            "<fieldset>
                <legend>Modifcacion Doctores</legend>
                <form method='POST' action='index.php?controllador=Controller\DoctorController&accion=update' >
                <label>Nombre</label>
                <input name='nombre' value=".$data['nombre']."><br>
                <label>Apellidos</label>
                <input name='apellidos' value=".$data['apellidos']."><br>
                <label>Especialidad</label>
                <input name='especialidad' value=".$data['especialidad']."><br>
                <label>Telefono</label>
                <input type='number' name='tlf' value=".$data['telefono']."><br>
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