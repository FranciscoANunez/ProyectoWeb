<?php  

	session_cache_limiter('private');

	session_cache_expire(0);

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
	<link rel="stylesheet" href="../css/site-demos.css">
	 <style type="text/CSS">
        label{position: absolute;color: red;font-style: italic;font-size: 15;}
    </style>
    <script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/jquery.validate.min.js"></script>
	<script src="../js/additional-methods.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body>
	<table class="table table-striped ">
  		<thead class="thead-dark">
    		<tr>
      			<th scope="col">Fecha</th>
      			<?php
	      			if($_SESSION['type']=='A'){
	  					echo "<th scope=\"col\">Cliente</th>";
	  				}
  				?>
			    <th scope="col">Estatus</th>
			    <th scope="col">Horario</th>
			    <th scope="col">Precio</th>
			    <th scope="col">Subir Recibo</th>
			    <th scope="col">Cancelar</th>
			    
    		</tr>
  		</thead>
  		<tbody>
  			<?php
  				$dia=date("Y-n-d");
  				$user=$_SESSION['user'];
  				$strQuery="SELECT dia,estatus,idTurno,recibo,idRenta,usuario,precio FROM rentas WHERE dia >= '$dia'";
  				if($_SESSION['type']!='A'){
  						$strQuery="$strQuery AND usuario = '$user'";

  				}
				$result=$conn->query($strQuery);

				if($result->num_rows>0){
					$numeroDeRenglones=0;
					while($row=$result->fetch_array(MYSQLI_NUM)){
						?>
							<tr>
		      					<th scope="row"><?php echo "$row[0]"; ?></th>
		      					<?php
		      						if($_SESSION['type']=='A'){
  										echo "<th scope=\"row\"> $row[5] </th>";
  									}
		      					?>
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
						      	<th>$<?php echo"$row[6]";?></th>
						      	<th> 
						      		
						      		<form id="form<?php echo "$numeroDeRenglones"; ?>" action="subir.php" method="POST" enctype="multipart/form-data">

						      			<input type="hidden" name="txtRentaId" value="<?php echo "$row[4]"; ?>">
						      			<input type="hidden" name="txtRentaName" value="<?php echo "$row[0]-$row[2]"; ?>">
						      			<?php
						      				$botonValue="Subir";
						      				if($row[5] == $_SESSION['user']){
						      					if(is_null($row[3]) ){
							      				?>
							      					<input type="file" name="image" class="btn btn-outline-info" accept="image/gif, image/jpeg, image/png" required>
							      					<input type="submit" name="btnsubir" value="<?php echo "$botonValue"; ?>">

							      					</form>
							      					<script>
							      						$('#form<?php echo "$numeroDeRenglones"; ?>').validate();
							      					</script>
							      				<?php		
								      			}else{
								      				?>
								      				</form>
								      				<button class="btn btn-outline-success" data-toggle="modal" data-target="#myModal<?php echo "$numeroDeRenglones"; ?>">Ver Recibo</button>
								      				<div class="modal fade" id="myModal<?php echo "$numeroDeRenglones"; ?>" role="dialog">
    													<div class="modal-dialog">
								    						<!-- Modal content-->
															<div class="modal-content">
        														<div class="modal-header">
          															<button type="button" class="close" data-dismiss="modal">&times;</button>
          															<h4 class="modal-title">Recibo</h4>
        														</div>
        														<div class="modal-body">
          															<img width="100%" src="<?php echo "$row[3]";?>">
        														</div>
        														<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        														</div>
     														</div>
    													</div>
  													</div>
								      				<?php
								      					if($row[1]=='A'){
								      				?>
								      				<button class="btn btn-outline-danger" onclick="cancelarRecibo(<?php echo "$row[4]"; ?>)">Cancelar Recibo</button>
								      				<?php
								      				}
								      			}
						      				}
						      			?>
						      		
						      	</th>
						      		<?php  
						      			$dia=strtotime($row[0]);
						      			$diaHoy=strtotime(date("Y-n-d"));
						      			
						      			$extra="";
						      			
						      			if($_SESSION['type']!='A'){
						      				if($dia-86400 <= $diaHoy){
						      					$extra="disabled";
						      				}
						      			}
						      			
						      		?>
						      	
						      	
						      	<th> <button type="button" class="btn btn-outline-danger" onclick="cancelarRenta(<?php echo "$row[4]";  ?>)" <?php echo "$extra"; ?>>Cancelar rentas</button></th>

		      				</tr>
						<?php
						$numeroDeRenglones++;
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
	
	<script>
		function subirRecibo(){
			top.frames[1].location.href="./subir.php";
		}
		function cancelarRenta(id){
			top.frames[1].location.href="./cancelarRecibo.php?id="+id;
		}
		function cancelarRecibo(id){
			top.frames[1].location.href="./cancelar.php?id="+id;
		}

	</script>
</body>
</html>