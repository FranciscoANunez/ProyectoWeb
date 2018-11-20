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
  				$user=$_SESSION['user'];
  				$strQuery="SELECT idRenta,usuario,dia,idTurno,recibo FROM rentas WHERE recibo IS NOT NULL AND estatus='A'";
				$result=$conn->query($strQuery);

				if($result->num_rows>0){
					while($row=$result->fetch_array(MYSQLI_NUM)){
						?>
							<tr>
		      					<th scope="row"><?php echo "$row[1]"; ?></th>
		      					<th> <?php echo "$row[2]"; ?> </th>
		      					<th><?php switch($row[3]){
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
						      		<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal<?php echo "$row[0]"; ?>">Ver Recibo</button>
						      		<div class="modal fade" id="myModal<?php echo "$row[0]"; ?>" role="dialog">
    									<div class="modal-dialog">
								    	<!-- Modal content-->
											<div class="modal-content">
        										<div class="modal-header">
          											<button type="button" class="close" data-dismiss="modal">&times;</button>
          											<h4 class="modal-title">Recibo</h4>
        										</div>
        										<div class="modal-body">
          											<img width="100%" src="<?php echo "$row[4]";?>">
        										</div>
        										<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        										</div>
     										</div>
    									</div>
  									</div>
						      	</th>
						      	<th><button type="button" class="btn btn-outline-success" onclick="validarRenta(<?php echo "$row[0]"; ?>)">Validar</button></th>
						      	<th> <button type="button" class="btn btn-outline-danger" onclick="cancelarRenta(<?php echo "$row[0]"; ?>)">Rechazar</button></th>

						      	
		      				</tr>
						<?php
					}
					
				}else{
					?>
						<tr>
		      				<th scope="row" colspan="6">Sin rentas por validar</th>
		      		    </tr>
					<?php
				}
  			?>
  	</tbody>
</table>
	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script>
		function validarRenta(id){
			top.frames[1].location.href="./validar.php?id="+id;
		}
		function cancelarRenta(id){
			top.frames[1].location.href="./cancelar.php?id="+id;
		}
	</script>
</body>
</html>