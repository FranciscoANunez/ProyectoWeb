<?php  
	session_start();
	include_once "../scripts/BDConnect.php";
	$nombre=$_SESSION['user'];
	$email=$_SESSION['mail'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form id="CambiaUsuario" method="POST" action="cambiaUsuario.php">
		<table align="center">
			<tr><th colspan="2" style="text-align: center;">Usuario</th></tr>
			<tr>
				<td>Usuario Nuevo:</td>
				<td><input type="text" name="txtUsuario" id="txtUsuario" placeholder="Usuario" value="<?php echo "$nombre";?>" ></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="txtEmail" id="txtEmail" placeholder="Email" value="<?php echo "$email";?>"></td>
			</tr>
			<tr>
				<td>Contraseña:</td>
				<td><input type="password" name="txtConfirmaNuevoUsuario" name="txtConfirmaNuevoUsuario" placeholder="Confirma Cambio"></td>
			</tr>
			<tr>
				<td><input type="submit" name="btnSubmit" value="Guardar"></td>
				<td><input type="button" name="btnCancelar" value="Cancelar"></td>
			</tr>
		</table>
	</form>
	<form id="CambiaPassword" method="POST" action="cambiaPassword.php">
		<table align="center">
			<tr><th colspan="2" style="text-align: center;">Cambiar Contraseña</th></tr>
			<tr>
				<td>Contraseña Nueva:</td>
				<td><input type="password" name="txtNuevaContra" placeholder="Nueva Contraseña"></td>
			</tr>
			<tr>
				<td>Confirma Contraseña::</td>
				<td><input type="password" name="txtConfirmaNuevaContra" placeholder="Confirma Nueva"></td>
			</tr>
			<tr>
				<td>Contraseña Anterior:</td>
				<td><input type="password" name="txtConfirmaNueva" placeholder="Confirma Cambio"></td>
			</tr>
			<tr>
				<td><input type="submit" name="btnSubmit" value="Guardar"></td>
				<td><input type="button" name="btnCancelar" value="Cancelar"></td>
			</tr>
		</table>
	</form>

</body>
</html>