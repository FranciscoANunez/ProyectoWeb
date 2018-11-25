<?php  
	session_start();
	include_once "../../scripts/BDConnect.php";
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
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/site-demos.css">
	 <style type="text/CSS">
        label{position: absolute;color: red;font-style: italic;font-size: 15;}
    </style>
</head>
<body>
	<form id="validaForm" name="validaForm" action="queryEdita.php" method="POST" enctype="multipart/form-data">
		<table align="center">
			<tr>
				<th colspan="2" style="text-align: center;">
					Imagenes del Sitio
				</th>
			</tr>
			<tr>
				<th colspan="2">
					<input type="file" id="image" name="image[]" class="btn btn-outline-info" accept="image/gif, image/jpeg, image/png" multiple>
				</th>
			</tr>
			<tr>
				<td colspan="2"><input type="checkbox" name="checkConserva" id="checkConserva">Conservar imagenes actuales</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<input type="submit" class="btn btn-outline-info" name="btnDatosAuditorio" id="btnDatosAuditorio" value="Guardar" name="submit" onclick="validaForma()">
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


	<script src="../../js/jquery-1.11.1.min.js"></script>
	<script src="../../js/jquery.validate.min.js"></script>
	<script src="../../js/additional-methods.min.js"></script>

	<!--<script type="text/javascript" src="../../js/jQuery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/jquery.validate.js"></script>-->
	<script>
		function cancela(){
			top.location.href="../../";
		}

		function validaForma(){
					$("#validaForm").validate({
						rules: {'image[]': {required: true,extension: "png|jpe?g"}},
                        messages: {'image[]':{required : "Se requere este dato",extension: "Solo formato png y jpg"}}
                    });
         }

	</script>
</body>
</html>