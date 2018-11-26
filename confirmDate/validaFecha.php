<?php
	include_once "../scripts/BDConnect.php";
	
	session_start();

	$fecha=$_POST['txtFecha'];
	$turno=$_POST['selectTurno'];
	$usuario=$_SESSION['user'];
	$precio=$_POST['txtPrecio'];


	$strQuery="INSERT INTO rentas VALUES(NULL,'$usuario','$fecha','A',NULL,NULL,'$turno',$precio)";
	
	$result=$conn->query($strQuery);

	if($result){
		?>
		<script type="text/javascript">
			top.location.href="../";
		</script>
		<?php
	}else{
		echo "Error guardando la fecha";
		echo "$strQuery";
	}


?>