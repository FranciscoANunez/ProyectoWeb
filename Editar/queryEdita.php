<?php
	include_once "../scripts/BDConnect.php";
	$txtNombreAuditorio=$_POST['txtNombreAuditorio'];
	$txtCalle=$_POST['txtCalle'];
	$txtNumero=$_POST['txtNumero'];
	$txtColonia=$_POST['txtColonia'];
	$txtCiudad=$_POST['txtCiudad'];
	$txtEstado=$_POST['txtEstado'];
	$txtCodigo=$_POST['txtCodigo'];



	$strQuery="UPDATE datosAuditorio SET nombre='$txtNombreAuditorio', numero='$txtNumero',
	calle='$txtCalle', colonia='$txtColonia', ciudad='$txtCiudad', estado='$txtEstado', codigoPostal='$txtCodigo'";
	$conn->query($strQuery);
	?>
		<script type="text/javascript">
			top.location.href="../";
		</script>
	<?php
?>