<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		div.DISPONIBLE{
			background-color: white;
		}

		td:hover div.DISPONIBLE{
			background-color: #BCF5A9;
		}

		div.APARTADO{
			background-color: yellow;
		}

		div.OCUPADO{
			background-color: red;
		}

		div.PASADO{
			background-color: gray;
		}

	</style>
</head>
<body onload="calendarioFunction()">
	<center>
	<div id="carouselAuditorio" class="carousel slide" data-ride="carousel">
  		<div class="carousel-inner" >
    		<div class="carousel-item active" style="height: 200px;">
      			<img class="d-block w-50 mh-100" src="img/auditorio1.jpg" alt="First slide">
    		</div>
    		<div class="carousel-item" style="height: 200px;">
      			<img class="d-block w-50 mh-100" src="img/auditorio2.jpg" alt="Second slide">
    		</div>
		    <div class="carousel-item" style="height: 200px;">
      			<img class="d-block w-50 mh-100" src="img/auditorio3.jpg" alt="Third slide">
    		</div>
  		</div>
	</div>
	</center>


	<!--<center><div class="d-block w-100" id="datetimepicker"></div></center>-->
	<?php
		$mesNombre=date("F");
		$anioNumero=date("Y");
		$mesNumero=date("n");
		$diasDelMes=date("t");
		$dayBeg=date("w", strtotime(date("Y-n-01")));
	?>
	<br>
	<?php

		echo "<p id=\"yearVal\" style=\"display:none;\">$anioNumero</p>";
		echo "<p id=\"monthVal\" style=\"display:none;\">$mesNumero</p>";
	?>

	<div id="calendarCont"></div>
	

	
    
</div>

	<script type="text/javascript" src="js/jQuery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	

	<script>
		$('.carousel').carousel({interval: 2000});
	</script>	
	<script>
				function calendarioFunction() {
					$.ajax({
						url: "scripts/calendar.php",
					    type: "POST",
					    data: {"mes" : $('#monthVal').html() , "anio" : $('#yearVal').html()},
					    success: function(response) {
					        $('#calendarCont').html(response);
					    }            
					});
				}	
				function mesAtras() {
					var valueMes=$('#monthVal').html();
					var valueAnio=$('#yearVal').html();
					valueMes--;
					if(valueMes == 0){
						valueMes=12;
						valueAnio--;
					}

					$('#monthVal').html(valueMes);
					$('#yearVal').html(valueAnio);

					calendarioFunction();

				}
				function mesAdelante() {
					var valueMes=$('#monthVal').html();
					var valueAnio=$('#yearVal').html();

					valueMes++;
					if(valueMes == 13){
						valueMes=1;
						valueAnio++;
					}

					$('#monthVal').html(valueMes);
					$('#yearVal').html(valueAnio);

					calendarioFunction();					

				}
				function fechaClickeada(fecha){
					top.frames[0].location.reload();
					top.frames[1].location.href="./confirmDate/index.php?date="+fecha;
				}
	</script>
	
</body>
</html>