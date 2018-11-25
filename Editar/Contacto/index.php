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
	<style type="text/CSS">
        label{position: absolute;color: red;font-style: italic;font-size: 15;}
    </style>
</head>
<body>
	<?php
		$strQuery="SELECT * FROM contacto";
			$result=$conn->query($strQuery);
			$row=$result->fetch_array(MYSQLI_NUM);
	?>
	<form id="validaForm" name="validaForm" action="queryEdita.php" method="POST">
		<table align="center">
			<tr>
				<th colspan="2" style="text-align: center;">
					Datos del Administrador
				</th>
			</tr>
			<tr>
				<td>Nombre : </td>
				<td><input type="text" id="txtNombreAdmin" name="txtNombreAdmin" placeholder="Ej. Jose Martinez" value="<?php echo "$row[0]"; ?>"></td>
			</tr>	
			<tr>
				<td>Telefono: </td>
				<td><input type="text" id="txtNumeroAdmin" name="txtNumeroAdmin" placeholder="Ej. 665476786" value="<?php echo "$row[2]"; ?>"></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="text" id="txtAdminEmail" name="txtAdminEmail" placeholder="Ej. admin@mail.com" value="<?php echo "$row[3]"; ?>"></td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<input type="submit" class="btn btn-outline-info" name="btnDatosAdmin" id="btnDatosAdmin" value="Guardar" onclick="validaForma()">
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

	<script type="text/javascript" src="../../js/jQuery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script type="text/javascript" src="../../js/jquery.validate.js"></script>
	<script>
		function cancela(){
			top.location.href="../../";
		}
		function validaForma(){
                    $("#validaForm").validate({
                        rules: {txtNombreAdmin:"required",
                                txtNumeroAdmin: "required",
                                txtAdminEmail: "required"
                            	},
                         messages: {txtNombreAdmin:"Se requiere este dato",
                                txtNumeroAdmin: "Se requiere este dato",
                                txtAdminEmail: "Se requiere este dato"},
                            submitHandler: function(form){
                                $.ajax({
                                    url: validaForm.action, 
                                    type: validaForm.method, 
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