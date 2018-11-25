<?php  
	session_start();
	include_once "../scripts/BDConnect.php";
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
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table align="center">
		<tr>
			<th>
				Contacto
			</th>
		</tr>
		<?php  
			$strQuery="SELECT * FROM datosAuditorio";
			$result=$conn->query($strQuery);
			if($result->num_rows>0){
				$row=$result->fetch_array(MYSQLI_NUM);
				//nombre
				echo "<tr><th>$row[0]</th></tr>";
				//direccion
				echo "<tr><th>$row[2] #$row[1] Col. $row[3]</th></tr>";
				echo "<tr><th>$row[4], $row[5] C.P.: $row[6]</th></tr>";
			}
			?>
			</table>
			<br>
			<br>
			<table align="center">
			<?php
			$strQuery="SELECT * FROM contacto";
			$result=$conn->query($strQuery);
			if($result->num_rows>0){
				$row=$result->fetch_array(MYSQLI_NUM);
				//tirulo
				echo "<tr><th>Administrador</th></tr>";
				//nombre
				echo "<tr><th>$row[0]</th></tr>";
				//direccion
				echo "<tr><th>Tel.: $row[2]</th></tr>";
				echo "<tr><th>Email.: $row[3]</th></tr>";
			}
		?>	

	</table>
	
	
</body>
</html>