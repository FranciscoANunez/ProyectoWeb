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
<body onload="clickOpcion()">
	

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
					<select id="selectTurno" name="selectTurno" style="width: 100%" onchange="clickOpcion()">
						<?php

							$strQueryTurnos="SELECT * FROM turno";
							$resultadoTurno=$conn->query($strQueryTurnos);
							$turnoDia;
							$turnoTarde;
							$turnoNoche;
							$turnoDiaTarde;
							$turnoTardeNoche;
							$turnoCompleto;
							while ($renglonTurno=$resultadoTurno->fetch_array(MYSQLI_NUM)) {
								switch ($renglonTurno[0]) {
									case 'd':
										$turnoDia=$renglonTurno;
									break;
									case 't':
										$turnoTarde=$renglonTurno;
									break;
									case 'n':
										$turnoNoche=$renglonTurno;
									break;
									case 'm':
										$turnoDiaTarde=$renglonTurno;
									break;
									case 'a':
										$turnoTardeNoche=$renglonTurno;
									break;
									case 'c':
										$turnoCompleto=$renglonTurno;
									break;
								}	
							}






							$estatusDia=checaDia($fechaFormato,'d');
							$estatusTarde=checaDia($fechaFormato,'t');
							$estatusNoche=checaDia($fechaFormato,'n');
							$dt=true;
							$tn=true;
							$todo=true;
							if($estatusDia == 'D'){
								if($turnoDia[2]){
									echo "<option value=\"d\">Dia $ $turnoDia[5] $turnoDia[3]-$turnoDia[4]</option>";			
								}
							}else{
								$dt=false;
								$todo=false;
							}

							if($estatusTarde == 'D'){
								if ($turnoTarde[2]) {
									echo "<option value=\"t\">Tarde $ $turnoTarde[5] $turnoTarde[3]-$turnoTarde[4]</option>";			
								}
							}else{
								$dt=false;
								$tn=false;
								$todo=false;
							}

							if($estatusNoche == 'D'){
								if ($turnoNoche[2]) {
									echo "<option value=\"n\">Noche $ $turnoNoche[5] $turnoNoche[3]-$turnoNoche[4]</option>";			
								}
							}else{
								$tn=false;
								$todo=false;
							}

							if($dt){
								if ($turnoDiaTarde[2]) {
									echo "<option value=\"m\">Dia y Tarde $ $turnoDiaTarde[5] $turnoDiaTarde[3]-$turnoDiaTarde[4]</option>";			
								}
								
							}
							if($tn){
								if ($turnoTardeNoche[2]) {
									echo "<option value=\"a\">Tarde y Noche $ $turnoTardeNoche[5] $turnoTardeNoche[3]-$turnoTardeNoche[4]</option>";			
								}
							}
							if($todo){
								if ($turnoCompleto[2]) {
									echo "<option value=\"c\">Dia Completo $ $turnoCompleto[5] $turnoCompleto[3]-$turnoCompleto[4]</option>";	
								}
							}
						?>
					</select>
					<input type="hidden" name="txtPrecioDia" id="txtPrecioDia" value="<?php echo "$turnoDia[5]"; ?>">
					<input type="hidden" name="txtPrecioTarde" id="txtPrecioTarde" value="<?php echo "$turnoTarde[5]"; ?>">
					<input type="hidden" name="txtPrecioNoche" id="txtPrecioNoche" value="<?php echo "$turnoNoche[5]"; ?>">
					<input type="hidden" name="txtPrecioDiaTarde" id="txtPrecioDiaTarde" value="<?php echo "$turnoDiaTarde[5]"; ?>">
					<input type="hidden" name="txtPrecioTardeNoche" id="txtPrecioTardeNoche" value="<?php echo "$turnoTardeNoche[5]"; ?>">
					<input type="hidden" name="txtPrecioCompleto" id="txtPrecioCompleto" value="<?php echo "$turnoCompleto[5]"; ?>">
				</td>
			</tr>
		</table>
		<table align="center">
			<tr>
				<td>
					<?php 
						$strQueryExtras="SELECT * FROM extras";
						$resultadoExtras=$conn->query($strQueryExtras);
						while ($renglonExtras=$resultadoExtras->fetch_array(MYSQLI_NUM)) {
							if($renglonExtras[0]!=""){
								?>
									<label class="checkbox-inline"><input id="opcion<?php echo "$renglonExtras[2]"; ?>" type="checkbox" value="" onclick="clickOpcion()"><?php echo "$renglonExtras[0] $ $renglonExtras[1]"; ?></label>
										<input type="hidden" id="txtOpcion<?php echo "$renglonExtras[2]"; ?>" value="<?php echo "$renglonExtras[1]"; ?>">
								<?php
							}		
						}

					?>
					<!--<label class="checkbox-inline"><input id="sillasCheck" type="checkbox" value="" onclick="clickOpcion()">Sillas y Mesas $250</label>
					<label class="checkbox-inline"><input id="sonidoCheck" type="checkbox" value="" onclick="clickOpcion()">Sonido $150</label>
					<label class="checkbox-inline"><input id="cañonCheck" type="checkbox" value="" onclick="clickOpcion()">Cañon $150</label> 	-->
				</td>
				
			</tr>
			<tr>
				<td style="text-align: center;">
					<label id="signo">Total: $</label>
					<label id="precio"></label>
					<input type="hidden" name="txtPrecio" id="txtPrecio">
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
				function clickOpcion(){
					var opcionSelect=$('#selectTurno').val();
					var precio=0;
					switch(opcionSelect){
						case 'd':
							precio+=parseInt($('#txtPrecioDia').val());
						break;
						case 't':
							precio+=parseInt($('#txtPrecioTarde').val());
						break;
						case 'n':
							precio+=parseInt($('#txtPrecioNoche').val());
						break;
						case 'm':
							precio+=parseInt($('#txtPrecioDiaTarde').val());
						break;
						case 'a':
							precio+=parseInt($('#txtPrecioTardeNoche').val());
						break;
						case 'c':
							precio+=parseInt($('#txtPrecioCompleto').val());
						break;
					}
					if($('#opcion1').is(':checked')){
						precio+=parseInt($(txtOpcion1).val());	
					}
					if($('#opcion2').is(':checked')){
						precio+=parseInt($(txtOpcion2).val());	
					}
					if($('#opcion3').is(':checked')){
						precio+=parseInt($(txtOpcion3).val());	
					}
					
					$('#precio').html(precio);
					$('#txtPrecio').val(precio);

				}
			</script>

</body>
</html>