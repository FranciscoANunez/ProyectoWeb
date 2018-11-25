<?php
	include_once "../scripts/BDConnect.php";
	$id=$_GET['id'];

	$getNombre="SELECT recibo FROM rentas WHERE idRenta=$id";
	$result=$conn->query($getNombre);
	$row=$result->fetch_array(MYSQLI_NUM);
	$nombre=$row[0];
	unlink($nombre);


	$strQuery="UPDATE rentas SET recibo=NULL WHERE idRenta=$id";
	$conn->query($strQuery);
	?>
		<script type="text/javascript">
			top.frames[1].location.href="./";
		</script>
	<?php
?>