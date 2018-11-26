<?php
	include_once "../scripts/BDConnect.php";
	$txtNombreAuditorio=$_POST['txtNombreAuditorio'];
	$txtCalle=$_POST['txtCalle'];
	$txtNumero=$_POST['txtNumero'];
	$txtColonia=$_POST['txtColonia'];
	$txtCiudad=$_POST['txtCiudad'];
	$txtEstado=$_POST['txtEstado'];
	$txtCodigo=$_POST['txtCodigo'];


	$checkboxDia;
	if(isset($_POST['checkboxDia'])){
		$checkboxDia=1;
	}else{
		$checkboxDia=0;
	}
	$numberDiaI=$_POST['numberDiaI'];
	$numberDiaF=$_POST['numberDiaF'];
	$precioDia=$_POST['precioDia'];



	$checkboxTarde;
	if(isset($_POST['checkboxTarde'])){
		$checkboxTarde=1;
	}else{
		$checkboxTarde=0;
	}
	$numberTardeI=$_POST['numberTardeI'];
	$numberTardeF=$_POST['numberTardeF'];
	$precioTarde=$_POST['precioTarde'];


	$checkboxNoche;
	if(isset($_POST['checkboxNoche'])){
		$checkboxNoche=1;
	}else{
		$checkboxNoche=0;
	}
	$numberNocheI=$_POST['numberNocheI'];
	$numberNocheF=$_POST['numberNocheF'];
	$precioNoche=$_POST['precioNoche'];


	$checkboxDiaTarde;
	if(isset($_POST['checkboxDiaTarde'])){
		$checkboxDiaTarde=1;
	}else{
		$checkboxDiaTarde=0;
	}
	$numberDiaTardeI=$_POST['numberDiaTardeI'];
	$numberDiaTardeF=$_POST['numberDiaTardeF'];
	$precioDiaTarde=$_POST['precioDiaTarde'];

	$checkboxTardeNoche;
	if(isset($_POST['checkboxTardeNoche'])){
		$checkboxTardeNoche=1;
	}else{
		$checkboxTardeNoche=0;
	}
	$numberTardeNocheI=$_POST['numberTardeNocheI'];
	$numberTardeNocheF=$_POST['numberTardeNocheF'];
	$precioTardeNoche=$_POST['precioTardeNoche'];

	$checkboxCompleto;
	if(isset($_POST['checkboxCompleto'])){
		$checkboxCompleto=1;
	}else{
		$checkboxCompleto=0;
	}
	$numberCompletoI=$_POST['numberCompletoI'];
	$numberCompletoF=$_POST['numberCompletoF'];
	$precioCompleto=$_POST['precioCompleto'];	



	$txtOpcion1=$_POST['txtOpcion1'];
	$precioOpcion1=$_POST['precioOpcion1'];

	$txtOpcion2=$_POST['txtOpcion2'];
	$precioOpcion2=$_POST['precioOpcion2'];

	$txtOpcion3=$_POST['txtOpcion3'];
	$precioOpcion3=$_POST['precioOpcion3'];





	$strQuery="UPDATE datosAuditorio SET nombre='$txtNombreAuditorio', numero='$txtNumero',
	calle='$txtCalle', colonia='$txtColonia', ciudad='$txtCiudad', estado='$txtEstado', codigoPostal='$txtCodigo'";
	$conn->query($strQuery);

	$strQueryTurnosDia="UPDATE turno set valido=$checkboxDia,horaI=$numberDiaI,horaF=$numberDiaF,precio=$precioDia WHERE idTurno='d'";
	$conn->query($strQueryTurnosDia);
	$strQueryTurnosTarde="UPDATE turno set valido=$checkboxTarde,horaI=$numberTardeI,horaF=$numberTardeF,precio=$precioTarde WHERE idTurno='t'";
	$conn->query($strQueryTurnosTarde);
	$strQueryTurnosNoche="UPDATE turno set valido=$checkboxNoche,horaI=$numberNocheI,horaF=$numberNocheF,precio=$precioNoche WHERE idTurno='n'";
	$conn->query($strQueryTurnosNoche);
	$strQueryTurnosDiaTarde="UPDATE turno set valido=$checkboxDiaTarde,horaI=$numberDiaTardeI,horaF=$numberDiaTardeF,precio=$precioDiaTarde WHERE idTurno='m'";
	$conn->query($strQueryTurnosDiaTarde);
	$strQueryTurnosTardeNoche="UPDATE turno set valido=$checkboxTardeNoche,horaI=$numberTardeNocheI,horaF=$numberTardeNocheF,precio=$precioTardeNoche WHERE idTurno='a'";
	$conn->query($strQueryTurnosTardeNoche);
	$strQueryTurnosCompleto="UPDATE turno set valido=$checkboxCompleto,horaI=$numberCompletoI,horaF=$numberCompletoF,precio=$precioCompleto WHERE idTurno='c'";
	$conn->query($strQueryTurnosCompleto);

	$strQueryExtra1="UPDATE extras SET opcion='$txtOpcion1',precion=$precioOpcion1 WHERE numero=1";
	$conn->query($strQueryExtra1);
	
	$strQueryExtra2="UPDATE extras SET opcion='$txtOpcion2',precion=$precioOpcion2 WHERE numero=2";
	$conn->query($strQueryExtra2);
	
	$strQueryExtra3="UPDATE extras SET opcion='$txtOpcion3',precion=$precioOpcion3 WHERE numero=3";
	$conn->query($strQueryExtra3);
	

	

	?>
		<script type="text/javascript">
			top.location.href="../";
		</script>
	<?php
?>