<table id="calendar" border="1" align="center" style="width: 80%;">
			<tr id="month" >
				<th colspan="7" style="text-align: center;">
					<?php echo "$mesNombre $anioNumero";?>	
				</th>
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
				$contadorDeDias=1;
				$contDays=0;
				echo "<tr>";
				for (; $contDays < $dayBeg; $contDays++) { 
					echo "<td style=\"width: 14%;\"> </td>";
				}
				$contDays=7;

				for ($dayCont=$dayBeg; $dayCont < $contDays; $dayCont++) { 
					echo "<td style=\"width: 14%;\">$contadorDeDias</td>";
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
							echo "<td style=\"width: 14%;\">$contadorDeDias</td>";
							$contadorDeDias++;	
						}
						
					}
					echo "</tr>";
				}

			?>
			



		</table>