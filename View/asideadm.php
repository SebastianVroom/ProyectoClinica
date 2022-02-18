<div>
    <a href="<?=BASE_URL?>Doctor/mostrarAdmDoctor">Ver todos los Doctores</a>
    <a href="<?=BASE_URL?>Paciente/mostrarAdmPaciente">Ver todos los pacientes</a>
    <a href="<?=BASE_URL?>Citas/mostrarAdmCitas">Ver todas las citas</a>
    <a href="<?=BASE_URL?>Citas/prepAdmForm">Crear Cita</a>
    <a href="<?=BASE_URL?>Doctor/createAdmDoctor">Registrar Doctor</a>
    <a href="<?=BASE_URL?>Login/logout">Logout</a>
    <fieldset>
        <legend>Registro paciente</legend>
    <form method="post" action="<?=BASE_URL?>Register/registro">
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