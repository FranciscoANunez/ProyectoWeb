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