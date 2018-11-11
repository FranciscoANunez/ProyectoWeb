<?php
	session_start();
	$fecha=0;
	$fecha=$_GET['date'];
	$fechaCompare=strtotime($fecha);
	$fechaHoy=strtotime(date("d-n-Y"));


	if (!isset($_SESSION['user'])) {
		echo "<link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\">";
		echo "<script type=\"text/javascript\" src=\"../js/jQuery.js\"></script>
	<script type=\"text/javascript\" src=\"../js/bootstrap.js\"></script>";
		echo "<div class=\"alert alert-danger\" role=\"alert\"> DEBES AUTENTICARTE PRIMERO</div>";
		echo "<script type=\"text/javascript\">
 	   			setTimeout(function() {top.location.href=\"../\";}, 2500);
 	   		</script>";
		exit();	
	}

	if($fechaHoy > $fechaCompare){
		echo "<link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\">";
		echo "<script type=\"text/javascript\" src=\"../js/jQuery.js\"></script>
	<script type=\"text/javascript\" src=\"../js/bootstrap.js\"></script>";
		echo "<div class=\"alert alert-danger\" role=\"alert\"> ESTA FECHA NO PUEDE SER APARTADA </div>";
		echo "<script type=\"text/javascript\">
 	   			setTimeout(function() {top.location.href=\"../\";}, 2500);
 	   		</script>";
		exit();
	}
	

	
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	

	<form action="validaFecha.php?date=$fecha" method="GET">
		<table align="center">
			<tr style="text-align: center;">
				<th colspan="2">Confirmar Renta</th>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input class="form-control" type="text" placeholder=" <?php echo "$fecha"; ?>" readonly></td>
			</tr>
			<tr>
				<td>Horario</td>
				<td>
					<select style="width: 100%">
						<option value="0">Dia $1000</option>
						<option value="1">Tarde $1100</option>
						<option value="2">Noche $1200</option>
						<option value="3">Dia y Tarde $2000</option>
						<option value="4">Tarde y Noche $2200</option>
						<option value="5">Dia Completo $3000</option>
					</select>
				</td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td><input type="submit" name="btnConfirm" value="Confirmar"></td>
			</tr>
		</table>
	</form>

	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>