<?php  
	include_once "BDConnect.php";
	include_once "consultaDia.php";

	$mes=$_POST['mes'];
	$anioNumero=$_POST['anio'];

	$fecha=strtotime("$anioNumero-$mes-01");

	$mesNombre=date("F",$fecha);
	$diasDelMes=date("t",$fecha);
	$dayBeg=date("w", $fecha);

	?>
		<table id="calendar" border="1" align="center" style="width: 80%;">
			<tr id="month">
				<th style="text-align: center; " onclick="mesAtras()"> < </th>
				<th colspan="5" style="text-align: center;">
					<?php echo "$mesNombre $anioNumero";?>	
				</th>
				<th style="text-align: center;" onclick="mesAdelante()"> > </th>
			</tr>
			<tr id="days">
				<?php 	
					echo "<th style=\"width: 14%;\">Domingo</th>";	
					echo "<th style=\"width: 14%;\">Lunes</th>";	
					echo "<th style=\"width: 14%;\">Martes</th>";	
					echo "<th style=\"width: 14%;\">Miercoles</th>";	
					echo "<th style=\"width: 14%;\">Jueves</th>";	
					echo "<th style=\"width: 14%;\">Viernes</th>";	
					echo "<th style=\"width: 14%;\">Sabado</th>";	
				?>	
			</tr>


			<?php
				$fechaHoy=strtotime(date("Y-n-d"));
				$contadorDeDias=1;
				$contDays=0;
				echo "<tr>";
				for (; $contDays < $dayBeg; $contDays++) { 
					echo "<td style=\"width: 14%;\"> </td>";
				}
				$contDays=7;

				for ($dayCont=$dayBeg; $dayCont < $contDays; $dayCont++) { 
					$fechaAImprimir=strtotime("$anioNumero-$mes-$contadorDeDias");



					echo "<td id=\"$contadorDeDias-$mes-$anioNumero\" style=\"width: 14%;\" ";
					if($fechaAImprimir < $fechaHoy){
						echo ">
							<div class=\"PASADO\">&nbsp;</div>
							<div class=\"PASADO\">&nbsp;</div>
							<div class=\"PASADO\">&nbsp;</div>
							$contadorDeDias 
							</td>";						
					}else{

						$eventoClick = "onmouseover='javascript: this.bgColor=\"#BCF5A9\"; this.style.cursor=\"hand\";'
										onmouseout='javascript:this.bgColor=\"#FFFFFF\"; this.style.cursor=\"default\";'
						onclick='fechaClickeada($contadorDeDias+\"-\"+$mes+\"-\"+$anioNumero);'";

						$conta=0;
						$diaEstatus="";
						$tardeEstatus="";
						$nocheEstatus="";

						$esta=checaDia("$anioNumero-$mes-$contadorDeDias",'d');
						switch ($esta) {
							case 'D':
								$diaEstatus="<div class=\"DISPONIBLE\">&nbsp;</div>";
							break;
							case 'A':
								$diaEstatus="<div class=\"APARTADO\">&nbsp;</div>";
								$conta++;
							break;
							case 'O':
								$diaEstatus="<div class=\"OCUPADO\">&nbsp;</div>";
								$conta++;
							break;
						}
						$esta=checaDia("$anioNumero-$mes-$contadorDeDias",'t');
						switch ($esta) {
							case 'D':
								$tardeEstatus="<div class=\"DISPONIBLE\">&nbsp;</div>";
							break;
							case 'A':
								$tardeEstatus="<div class=\"APARTADO\">&nbsp;</div>";
								$conta++;
							break;
							case 'O':
								$tardeEstatus="<div class=\"OCUPADO\">&nbsp;</div>";
								$conta++;
							break;
						}
						$esta=checaDia("$anioNumero-$mes-$contadorDeDias",'n');
						switch ($esta) {
							case 'D':
								$nocheEstatus="<div class=\"DISPONIBLE\">&nbsp;</div>";
							break;
							case 'A':
								$nocheEstatus="<div class=\"APARTADO\">&nbsp;</div>";
								$conta++;
							break;
							case 'O':
								$nocheEstatus="<div class=\"OCUPADO\">&nbsp;</div>";
								$conta++;
							break;
						}

						if($conta==3){
							$eventoClick="";
						}
						echo "$eventoClick > $diaEstatus $tardeEstatus $nocheEstatus $contadorDeDias </td>";
					}

					
					$contadorDeDias++;
				}
				echo "</tr>";

				while ( $contadorDeDias<= $diasDelMes) {
					echo "<tr>";
					for ($i=0; $i < 7; $i++) { 
						if($contadorDeDias > $diasDelMes){
							echo "<td style=\"width: 14%;\"> </td>";
						$contadorDeDias++;
						}else{
							$fechaAImprimir=strtotime("$anioNumero-$mes-$contadorDeDias");
							echo "<td id=\"$contadorDeDias-$mes-$anioNumero\" style=\"width: 14%;\" ";
					if($fechaAImprimir < $fechaHoy){
						echo ">
							<div class=\"PASADO\">&nbsp;</div>
							<div class=\"PASADO\">&nbsp;</div>
							<div class=\"PASADO\">&nbsp;</div>
							$contadorDeDias
							</td>";						
					}else{
						$eventoClick = "onmouseover='javascript: this.bgColor=\"#BCF5A9\"; this.style.cursor=\"hand\";'
										onmouseout='javascript:this.bgColor=\"#FFFFFF\"; this.style.cursor=\"default\";'
						onclick='fechaClickeada($contadorDeDias+\"-\"+$mes+\"-\"+$anioNumero);'";

						$conta=0;
						$diaEstatus="";
						$tardeEstatus="";
						$nocheEstatus="";

						$esta=checaDia("$anioNumero-$mes-$contadorDeDias",'d');
						switch ($esta) {
							case 'D':
								$diaEstatus="<div class=\"DISPONIBLE\">&nbsp;</div>";
							break;
							case 'A':
								$diaEstatus="<div class=\"APARTADO\">&nbsp;</div>";
								$conta++;
							break;
							case 'O':
								$diaEstatus="<div class=\"OCUPADO\">&nbsp;</div>";
								$conta++;
							break;
						}
						$esta=checaDia("$anioNumero-$mes-$contadorDeDias",'t');
						switch ($esta) {
							case 'D':
								$tardeEstatus="<div class=\"DISPONIBLE\">&nbsp;</div>";
							break;
							case 'A':
								$tardeEstatus="<div class=\"APARTADO\">&nbsp;</div>";
								$conta++;
							break;
							case 'O':
								$tardeEstatus="<div class=\"OCUPADO\">&nbsp;</div>";
								$conta++;
							break;
						}
						$esta=checaDia("$anioNumero-$mes-$contadorDeDias",'n');
						switch ($esta) {
							case 'D':
								$nocheEstatus="<div class=\"DISPONIBLE\">&nbsp;</div>";
							break;
							case 'A':
								$nocheEstatus="<div class=\"APARTADO\">&nbsp;</div>";
								$conta++;
							break;
							case 'O':
								$nocheEstatus="<div class=\"OCUPADO\">&nbsp;</div>";
								$conta++;
							break;
						}

						if($conta==3){
							$eventoClick="";
						}
						echo "$eventoClick > $diaEstatus $tardeEstatus $nocheEstatus $contadorDeDias </td>";
					}
							$contadorDeDias++;	
						}
						
					}
					echo "</tr>";
				}

			?>

		</table>

?>