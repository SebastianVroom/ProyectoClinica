<div>
    <a href="index.php?controllador=Controller\DoctorController&accion=mostrarAdmDoctor">Ver todos los Doctores</a>
    <a href="index.php?controllador=Controller\PacienteController&accion=mostrarAdmPaciente">Ver todos los pacientes</a>
    <a href="index.php?controllador=Controller\CitasController&accion=mostrarAdmCitas">Ver todas las citas</a>
    <a href="index.php?controllador=Controller\CitasController&accion=prepAdmForm">Crear Cita</a>
    <a href="index.php?controllador=Controller\DoctorController&accion=createAdmDoctor">Registrar Doctor</a>
    <a href="index.php?controllador=Controller\LoginController&accion=logout">Logout</a>
    <fieldset>
        <legend>Registro paciente</legend>
    <form method="post" action="index.php?controllador=Controller\RegisterController&accion=registro">
        <label>Nombre</label>
        <input name='nombre'><br>
        <label>Apellidos</label>
        <input name='apellidos'><br>
        <label>email</label>
        <input type='email' name='mail'><br>
        <label>contraseña</label>
        <input type='password' name='cont'><br>
        <input type="submit">
    </form>
    </fieldset>
</div>
<hr>