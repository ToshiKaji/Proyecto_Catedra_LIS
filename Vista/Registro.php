<?php
require_once('Layout/Header.php');
?>
<div Class="Formulario">
<form action="Login.php" method="get">
<label>Usuario</label><br>
<input type="" name="usercli"><br>
<label>Contraseña</label><br>
<input type="password" name="pwcli"><br>
<label>Nombre</label><br>
<input type="text" name="nombre"><br>
<label>Apellido</label><br>
<input type="text" name="apellido"><br>
<label>DUI</label><br>
<input type="text" name="dui"><br><br>
<input type="submit" class="btn" name="btnregistrar">
<input type="hidden" name="m" value="Ingresar_cliente">

</form>
</div>

