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
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<table class="table table-striped ">
  		<thead class="thead-dark">
    		<tr>
      			<th scope="col">Fecha</th>
			    <th scope="col">Estatus</th>
			    <th scope="col">Horario</th>
    		</tr>
  		</thead>
  		<tbody>
  			<?php
  				$dia=date("Y-n-d");
  				$user=$_SESSION['user'];
  				$strQuery="SELECT dia,estatus,idTurno FROM rentas WHERE dia < '$dia' AND usuario = '$user'";
				$result=$conn->query($strQuery);

				if($result->num_rows>0){
					while($row=$result->fetch_array(MYSQLI_NUM)){
						?>
							<tr>
		      					<th scope="row"><?php echo "$row[0]"; ?></th>
		      					<th><?php 
		      						if ($row[1]=='O') {
		      							echo "Pagado";
		      						}else if($row[1]=='A'){
		      							echo "Fecha no Pagada";
		      						}else{
		      							echo "Sin Registro";
		      						}
		      						
		      					?></th>
						      	<th><?php 
						      		switch($row[2]){
							      		case 'd':
							      			echo "Mañana";
							      		break;
							      		case 't':
								      		echo "Tarde";	
							      		break;
							      		case 'n':
							      			echo "Noche";
							      		break;
							      		case 'm':
							      			echo "Mañana y Tarde";
							      		break;
							      		case 'a':
							      			echo "Tarde y Noche";
							      		break;
							      		case 'c':
							      			echo "Dia Completo";
							      		break;
							      	}
								?></th>
		      				</tr>
						<?php
					}
					
				}else{
					?>
						<tr>
		      				<th scope="row" colspan="3">Sin rentas previas</th>
		      		    </tr>
					<?php
				}
  			?>
  	</tbody>
</table>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>