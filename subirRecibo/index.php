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
    		</tr>
  		</thead>
  		<tbody>
  			<?php
  				$dia=date("Y-n-d");
  				$user=$_SESSION['user'];
  				$strQuery="SELECT dia,estatus,idTurno,recibo FROM rentas WHERE dia >= '$dia' AND usuario = '$user'";
				$result=$conn->query($strQuery);

				if($result->num_rows>0){
					while($row=$result->fetch_array(MYSQLI_NUM)){
						?>
							<tr>
		      					<th scope="row"><?php echo "$row[0]"; ?></th>
		      					<th><?php echo "$row[1]"; ?></th>
						      	<th><?php echo "$row[2]"; ?></th>
						      	<th> <button type="button" <?php 
						      		if(is_null($row[3])){
						      			echo "class=\"btn btn-outline-secondary\"";
						      			echo "disabled";

						      		}else{
						      			echo "class=\"btn btn-outline-info\"";
						      			echo "onclick=\"subirArchivo()\"";
						      		}
						      	?>> Subir Recibo </button> </th>
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
	<script>
		function subirRecibo(){
			top.frames[1].location.href="./subir.php";
		}
	</script>
</body>
</html>