<?php
	include_once "../../scripts/BDConnect.php";
	$txtNombreAdmin=$_POST['txtNombreAdmin'];
	$txtNumeroAdmin=$_POST['txtNumeroAdmin'];
	$txtAdminEmail=$_POST['txtAdminEmail'];

	



	$strQuery="UPDATE contacto SET nombre='$txtNombreAdmin', numero='$txtNumeroAdmin',
	email='$txtAdminEmail'";
	$conn->query($strQuery);
	?>
		<script type="text/javascript">
			top.location.href="../../";
		</script>
	<?php
?>