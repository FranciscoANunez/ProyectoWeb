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
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<style type="text/CSS">
        label{position: absolute;color: red;font-style: italic;font-size: 15;}
    </style>
</head>
<body>
	<?php
		$strQuery="SELECT * FROM datosAuditorio";
		$result=$conn->query($strQuery);
		$row=$result->fetch_array(MYSQLI_NUM);
	?>
	<form id="validaEdita" name="validaEdita" action="queryEdita.php" method="POST">
		<table align="center">
			<tr>
				<th colspan="2" style="text-align: center;">
					Datos del Lugar
				</th>
			</tr>
			<tr>
				<td>Nombre del Lugar: </td>
				<td><input type="text" id="txtNombreAuditorio" name="txtNombreAuditorio" placeholder="Ej. Auditorio Saltillo" value="<?php echo "$row[0]"; ?>"></td>
			</tr>	
			<tr>
				<td>Calle: </td>
				<td><input type="text" id="txtCalle" name="txtCalle" placeholder="Ej. Reynosa" value="<?php echo "$row[2]"; ?>"></td>
			</tr>
			<tr>
				<td>Numero: #</td>
				<td><input type="text"  id="txtNumero" name="txtNumero" placeholder="Ej. 127" value="<?php echo "$row[1]"; ?>"></td>
			</tr>
			<tr>
				<td>Colonia: </td>
				<td><input type="text" id="txtColonia" name="txtColonia" placeholder="Ej. Republica" value="<?php echo "$row[3]"; ?>"></td>
			</tr>
			<tr>
				<td>Ciudad: </td>
				<td><input type="text" id="txtCiudad" name="txtCiudad" placeholder="Ej. Saltillo" value="<?php echo "$row[4]"; ?>"></td>
			</tr>
			<tr>
				<td>Estado: </td>
				<td><input type="text" id="txtEstado" name="txtEstado" placeholder="Ej. Coahuila" value="<?php echo "$row[5]"; ?>"></td>
			</tr>
			<tr>
				<td>Codigo Postal: </td>
				<td><input type="text"  id="txtCodigo" name="txtCodigo" placeholder="Ej. 25000" value="<?php echo "$row[6]"; ?>"></td>
			</tr>
			</table>
	
			<!------------------------------------------------------------------------------------------------>
			<table align="center">
				<tr><th colspan="7" style="text-align: center;">Horarios</th></tr>
				<?php  
					$consultaHorarios="SELECT * FROM turno";
					$resultadoHorarios=$conn->query($consultaHorarios);
					$turnoDia;
					$turnoTarde;
					$turnoNoche;
					$turnoDiaTarde;
					$turnotardeNoche;
					$turnoCompleto;
					while ($row=$resultadoHorarios->fetch_array(MYSQLI_NUM)) {
						switch ($row[0]) {
								case 'd':
									$turnoDia=$row;
									break;
								case 't':
									$turnoTarde=$row;
									break;
								case 'n':
									$turnoNoche=$row;
									break;
								case 'm':
									$turnoDiaTarde=$row;
									break;
								case 'a':
									$turnotardeNoche=$row;
									break;
								case 'c':
									$turnoCompleto=$row;
									break;
							}	
					}
				?>
				
				<tr>
					<?php
						$checked="";
						if($turnoDia[2]){
							$checked="checked";
						}
						$diaI=$turnoDia[3];
						$diaF=$turnoDia[4];
						$precio=$turnoDia[5];
					?>
					<td><input type="checkbox" name="checkboxDia" <?php echo "$checked";  ?>>Valido</td>
					<td>Dia</td>
					<td><input type="number" name="numberDiaI" min="0" max="23" value="<?php echo "$diaI";?>"></td>
					<td>-</td>
					<td><input type="number" name="numberDiaF" min="0" max="23" value="<?php echo "$diaF";?>"></td>
					<td>Precio:</td>
					<td><input type="number" name="precioDia" min="1" value="<?php echo "$precio"; ?>"></td>
				</tr>
				<tr>
					<?php
						$checked="";
						if($turnoTarde[2]){
							$checked="checked";
						}
						$tardeI=$turnoTarde[3];
						$tardeF=$turnoTarde[4];
						$precio=$turnoTarde[5];
					?>
					<td><input type="checkbox" name="checkboxTarde" <?php echo "$checked";  ?>>Valido</td>
					<td>Tarde</td>
					<td><input type="number" name="numberTardeI" min="0" max="23" value="<?php echo "$tardeI";?>"></td>
					<td>-</td>
					<td><input type="number" name="numberTardeF" min="0" max="23" value="<?php echo "$tardeF";?>"></td>
					<td>Precio:</td>
					<td><input type="number" name="precioTarde" min="1" value="<?php echo "$precio"; ?>"></td>
				</tr>
				<tr>
					<?php
						$checked="";
						if($turnoNoche[2]){
							$checked="checked";
						}
						$nocheI=$turnoNoche[3];
						$nocheF=$turnoNoche[4];
						$precio=$turnoNoche[5];
					?>
					<td><input type="checkbox" name="checkboxNoche" <?php echo "$checked";  ?>>Valido</td>
					<td>Noche</td>
					<td><input type="number" name="numberNocheI" min="0" max="23" value="<?php echo "$nocheI";?>"></td>
					<td>-</td>
					<td><input type="number" name="numberNocheF" min="0" max="23" value="<?php echo "$nocheF";?>"></td>
					<td>Precio:</td>
					<td><input type="number" name="precioNoche" min="1" value="<?php echo "$precio"; ?>"></td>
				</tr>
				<tr>
					<?php
						$checked="";
						if($turnoDiaTarde[2]){
							$checked="checked";
						}
						$diaTardeI=$turnoDiaTarde[3];
						$diaTardeF=$turnoDiaTarde[4];
						$precio=$turnoDiaTarde[5];
					?>
					<td><input type="checkbox" name="checkboxDiaTarde" <?php echo "$checked";  ?>>Valido</td>
					<td>Dia y Tarde</td>
					<td><input type="number" name="numberDiaTardeI" min="0" max="23" value="<?php echo "$diaTardeI";?>"></td>
					<td>-</td>
					<td><input type="number" name="numberDiaTardeF" min="0" max="23" value="<?php echo "$diaTardeF";?>"></td>
					<td>Precio:</td>
					<td><input type="number" name="precioDiaTarde" min="1" value="<?php echo "$precio"; ?>"></td>
				</tr>
				<tr>
					<?php
						$checked="";
						if($turnotardeNoche[2]){
							$checked="checked";
						}
						$tardeNocheI=$turnotardeNoche[3];
						$tardeNocheF=$turnotardeNoche[4];
						$precio=$turnotardeNoche[5];
					?>
					<td><input type="checkbox" name="checkboxTardeNoche" <?php echo "$checked";  ?>>Valido</td>
					<td>Tarde y Noche</td>
					<td><input type="number" name="numberTardeNocheI" min="0" max="23" value="<?php echo "$tardeNocheI";?>"></td>
					<td>-</td>
					<td><input type="number" name="numberTardeNocheF" min="0" max="23" value="<?php echo "$tardeNocheF";?>"></td>
					<td>Precio:</td>
					<td><input type="number" name="precioTardeNoche" min="1" value="<?php echo "$precio"; ?>"></td>
				</tr>
				<tr>
					<?php
						$checked="";
						if($turnoCompleto[2]){
							$checked="checked";
						}
						$completoI=$turnoCompleto[3];
						$completoF=$turnoCompleto[4];
						$precio=$turnoCompleto[5];
					?>
					<td><input type="checkbox" name="checkboxCompleto" <?php echo "$checked";  ?>>Valido</td>
					<td>Completo</td>
					<td><input type="number" name="numberCompletoI" min="0" max="23" value="<?php echo "$completoI";?>"></td>
					<td>-</td>
					<td><input type="number" name="numberCompletoF" min="0" max="23" value="<?php echo "$completoF";?>"></td>
					<td>Precio:</td>
					<td><input type="number" name="precioCompleto" min="1" value="<?php echo "$precio"; ?>"></td>
				</tr>
				
			</table>
			<table align="center">
					<tr><th colspan="4" style="text-align: center;">Extras (maximo 3 extras)</th></tr>
					<?php  
					$consultaExtras="SELECT * FROM extras";
					$resultadoExtras=$conn->query($consultaExtras);
					$opcion1;
					$opcion2;
					$opcion3;
					if($renglonExtras=$resultadoExtras->fetch_array(MYSQLI_NUM)) {
						$opcion1=$renglonExtras;
					}
					if($renglonExtras=$resultadoExtras->fetch_array(MYSQLI_NUM)) {
						$opcion2=$renglonExtras;
					}
					if($renglonExtras=$resultadoExtras->fetch_array(MYSQLI_NUM)) {
						$opcion3=$renglonExtras;
					}
				?>

			<tr>
				<td>
					Opcion 1:
				</td>
				<td>
					<input type="text" name="txtOpcion1" value="<?php echo "$opcion1[0]"; ?>">
				</td>
				<td>
					Precio
				</td>
				<td>
					<input type="number" name="precioOpcion1" min="1" value="<?php echo "$opcion1[1]"; ?>">
				</td>
			</tr>
			<tr>
				<td>
					Opcion 2:
				</td>
				<td>
					<input type="text" name="txtOpcion2" value="<?php echo "$opcion2[0]"; ?>">
				</td>
				<td>
					Precio
				</td>
				<td>
					<input type="number" name="precioOpcion2" min="1" value="<?php echo "$opcion2[1]"; ?>">
				</td>
			</tr>
			<tr>
				<td>
					Opcion 3:
				</td>
				<td>
					<input type="text" name="txtOpcion3" value="<?php echo "$opcion3[0]"; ?>" >
				</td>
				<td>
					Precio
				</td>
				<td>
					<input type="number" name="precioOpcion3" min="1" value="<?php echo "$opcion3[1]"; ?>">
				</td>
			</tr>

			</table>
			<!------------------------------------------------------------------------------------------------>
			<table align="center">
			<tr>
				<td style="text-align: center;">
					<input type="submit" class="btn btn-outline-info" name="btnDatosAuditorio" id="btnDatosAuditorio" value="Guardar" onclick="validaForma()">
				</td>
				<td style="text-align: center;">
					<input type="button" class="btn btn-outline-danger" name="btnCancelar" id="btnCancelar" value="Cancelar" onclick="cancela()">
				</td>
			</tr>
		</table>
	</form>
	<table align="center">
		<div id="msgError"></div>
	</table>

	<script type="text/javascript" src="../js/jQuery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.js"></script>
	<script>
		function cancela(){
			top.location.href="../";
		}
		function validaForma(){
                    $("#validaEdita").validate({
                        rules: {txtNombreAuditorio:"required",
                                txtCalle: "required",
                                txtNumero: "required",
                                txtColonia: "required",
                                txtCiudad: "required",
                                txtEstado: "required",
                                txtCodigo: "required"
                            	},
                         messages: {txtNombreAuditorio:"Se requiere este dato",
                                txtCalle: "Se requiere este dato",
                                txtNumero: "Se requiere este dato",
                                txtColonia: "Se requiere este dato",
                                txtCiudad: "Se requiere este dato",
                                txtEstado: "Se requiere este dato",
                                txtCodigo: "Se requiere este dato"},
                            submitHandler: function(form){
                                $.ajax({
                                    url: validaEdita.action, 
                                    type: validaEdita.method, 
                                    data: $(form).serialize(),
                                    success: function(response) {
                                        $('#msgError').html(response);
                                    }
                                });
                            }
                    });
         }
		
	</script>
</body>
</html>