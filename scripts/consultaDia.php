<?php  
	include_once "./BDConnect.php";
	
	function checaDia($dia1,$turno){
		global $conn;
		$regresar='D';

		$condicion="";
		switch ($turno) {
			case 'd':
				$condicion="idTurno='d' OR idTurno='m' OR idTurno='c'";
			break;
			case 't':
				$condicion="idTurno='t' OR idTurno='m' OR idTurno='a' OR idTurno='c'";
			break;
			case 'n':
				$condicion="idTurno='n' OR idTurno='a' OR idTurno='c'";
			break;
		}

		$strQuery="SELECT estatus FROM rentas WHERE dia='$dia1' AND ($condicion) ";
		$result=$conn->query($strQuery);

		if($result->num_rows>0){
			$row=$result->fetch_array(MYSQLI_NUM);
			$regresar=$row[0];
		}

		return $regresar;
	}
?>