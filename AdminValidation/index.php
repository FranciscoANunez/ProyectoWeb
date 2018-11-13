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
      			<th scope="col">Cliente</th>
			    <th scope="col">Fecha</th>
			    <th scope="col">Horario</th>
			    <th scope="col">Ver Recibo</th>
			    <th scope="col">Validar</th>
			    <th scope="col">Rechazar</th>
    		</tr>
  		</thead>
  		<tbody>
  			<?php
  				$dia=date("Y-n-d");
  				$user=$_SESSION['user'];
  				$strQuery="SELECT dia,estatus,idTurno,recibo,idRenta FROM rentas WHERE dia >= '$dia' AND usuario = '$user'";
				$result=$conn->query($strQuery);

				if($result->num_rows>0){
					while($row=$result->fetch_array(MYSQLI_NUM)){
						?>
							<tr>
		      					<th scope="row"><?php echo "$row[0]"; ?></th>
		      					<th><?php if($row[1]=='A'){echo "Apartado";}else{ echo "Pagado";}; ?></th>
						      	<th><?php switch($row[2]){
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
						      	}?></th>
						      	<th> 
						      		
						      		<form action="subir.php" method="POST" enctype="multipart/form-data">
						      			<input type="hidden" name="txtRentaId" value="<?php echo "$row[4]"; ?>">
						      			<input type="hidden" name="txtRentaName" value="<?php echo "$row[0]-$row[2]"; ?>">
						      			<?php
						      				$botonValue="Subir";
						      				if(is_null($row[3])){
							      				?>
							      					<input type="file" name="image" class="btn btn-outline-info" accept="image/gif, image/jpeg, image/png">
							      					<input type="submit" name="btnsubir" value="<?php echo "$botonValue"; ?>">
							      				<?php		
							      			}else{
							      				?>
							      				<input type="button" class="btn btn-outline-secondary" value="Recibo Capturado" disabled>
							      				<?php
							      			}
						      			?>

						      			
						      			
						      		</form>
						      	</th>
						      		<?php  
						      			$dia=strtotime($row[0]);
						      			$diaHoy=strtotime(date("Y-n-d"));
						      			
						      			$extra="";
						      			
						      			if($dia-86400 <= $diaHoy){
						      				$extra="disabled";
						      			}
						      		?>
						      	
						      	
						      	<th> <button type="button" class="btn btn-outline-danger" onclick="cancelarRenta(<?php echo "$row[4]";  ?>)" <?php echo "$extra"; ?>>Cancelar</button></th>
		      				</tr>
						<?php
					}
					
				}else{
					?>
						<tr>
		      				<th scope="row" colspan="5">Sin rentas pendientes</th>
		      		    </tr>
					<?php
				}
  			?>
  	</tbody>
</table>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script>
		function subirRecibo(){
			top.frames[1].location.href="./subir.php";
		}
		function cancelarRenta(id){
			top.frames[1].location.href="./cancelarRecibo.php?id="+id;
		}
	</script>
</body>
</html>