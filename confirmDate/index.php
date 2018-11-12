<?php
	session_start();
	include_once "../scripts/BDConnect.php";
	include_once "../scripts/consultaDia.php";
	$fecha=0;
	$fecha=$_GET['date'];
	$fechaCompare=strtotime($fecha);
	$fechaHoy=strtotime(date("d-n-Y"));

	$fechaFormato=date('Y-n-d',$fechaCompare);
	


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
	

	<form id="formConfirm" action="validaFecha.php?date=$fecha" method="POST">
		<table align="center">
			<tr style="text-align: center;">
				<th colspan="2">Confirmar Renta</th>
			</tr>
			<tr>
				<td>Fecha <input type="hidden" name="txtFecha" value="<?php echo "$fechaFormato"; ?>"></td>
				<td><input class="form-control" type="text" placeholder=" <?php echo "$fecha"; ?>" readonly></td>
			</tr>
			<tr>
				<td>Horario</td>
				<td>
					<select name="selectTurno" style="width: 100%">
						<?php
							$estatusDia=checaDia($fechaFormato,'d');
							$estatusTarde=checaDia($fechaFormato,'t');
							$estatusNoche=checaDia($fechaFormato,'n');
							$dt=true;
							$tn=true;
							$todo=true;
							if($estatusDia == 'D'){
								echo "<option value=\"d\">Dia $1000</option>";		
							}else{
								$dt=false;
								$todo=false;
							}

							if($estatusTarde == 'D'){
								echo "<option value=\"t\">Tarde $1100</option>";		
							}else{
								$dt=false;
								$tn=false;
								$todo=false;
							}

							if($estatusNoche == 'D'){
								echo "<option value=\"n\">Noche $1200</option>";		
							}else{
								$tn=false;
								$todo=false;
							}

							if($dt){
								echo "<option value=\"m\">Dia y Tarde $2000</option>";
							}
							if($tn){
								echo "<option value=\"a\">Tarde y Noche $2200</option>";
							}
							if($todo){
								echo "<option value=\"c\">Dia Completo $3000</option>";
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td><input type="submit" name="btnConfirm" value="Confirmar" onclick="enviarForma()"></td>
				<td><input type="button" name="btnConfirm" value="Cancelar" onclick="cancelarForma()"></td>
			</tr>
		</table>
	</form>
	<div id="respuesta"></div>

	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>

	<script>
				function enviarForma() {
					$("#formConfirm").validate({
						submitHandler: function(form) {
					        $.ajax({
					            url: form.action,
					            type: form.method,
					            data: $(form).serialize(),
					            success: function(response) {
					                $('#respuesta').html(response);
					            }            
					        });
					    }
					});
				}	
				function cancelarForma(){
					top.location.href="../";
				}
			</script>

</body>
</html>