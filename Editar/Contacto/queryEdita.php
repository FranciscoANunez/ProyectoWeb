<?php
	include_once "../../scripts/BDConnect.php";
	$txtNombreAdmin=$_POST['txtNombreAdmin'];
	$txtNumeroAdmin=$_POST['txtNumeroAdmin'];
	$txtAdminEmail=$_POST['txtAdminEmail'];

	$txtAdminCuentaBanco1=$_POST['txtAdminCuentaBanco1'];
	$txtAdminCuentaNumero1=$_POST['txtAdminCuentaNumero1'];

	$txtAdminCuentaBanco2=$_POST['txtAdminCuentaBanco2'];
	$txtAdminCuentaNumero2=$_POST['txtAdminCuentaNumero2'];

	



	$strQuery="UPDATE contacto SET nombre='$txtNombreAdmin', numero='$txtNumeroAdmin',
	email='$txtAdminEmail', cuenta1Banco='$txtAdminCuentaBanco1', cuenta1Numero='$txtAdminCuentaNumero1', cuenta2Banco='$txtAdminCuentaBanco2', cuenta2Numero='$txtAdminCuentaNumero2'";
	$conn->query($strQuery);
	?>
		<script type="text/javascript">
			top.location.href="../../";
		</script>
	<?php
?>