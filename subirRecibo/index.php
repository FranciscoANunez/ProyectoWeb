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
			    <th scope="col">Subir Recibo</th>
			    <th scope="col">Cancelar</th>
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
		      					<th><?php echo "$row[1]"; ?></th>
						      	<th><?php echo "$row[2]"; ?></th>
						      	<th> 
						      		<?php
						      			$botonValue="Subir";
						      			if(is_null($row[3])){
						      				$botonValue="Cambiar";
						      			}
						      		?>
						      		<form action="subirImagen.php" method="POST">
						      			<input type="hidden" name="txtRentaId" value="<?php echo "$row[4]"; ?>">
						      			<input type="file" name="subir" value="subir" class="btn btn-outline-info" accept="image/gif, image/jpeg, image/png">
						      			<input type="submit" name="btnsubir" value="<?php echo "$botonValue"; ?>">
						      		</form>
						      	</th>
						      	
						      	
						      	
						      	<th> <button type="button" class="btn btn-outline-danger" >Cancelar</button></th>
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
	</script>
</body>
</html>