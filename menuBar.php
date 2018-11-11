<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<!-- NavBar la de arrriba-->
	<nav class="navbar navbar-light" style="background-color: #2E64FE;">
		<div class="container">
			<a class="navbar-brand" onclick="loadIndex()" href="#">Home</a> 	
			<div class="float-right" >
				<?php
					if(isset($_SESSION['user'])){
					?>
						<a class="nav-link float-right" style="color: #000000;"> <?php echo "$_SESSION[user]" ;?></a>
						<a class="nav-link float-right" style="color: #ffffff;"href="#" onclick="closeSession()">Cerrar Sesion</a>
						<a class="nav-link float-right" style="color: #ffffff;"href="#">Mis Fechas</a>
						<a class="nav-link float-right" style="color: #ffffff;"href="#">Historial</a>
						
      				<?php
					}else{
					?>
						<a class="nav-link float-right" style="color: #ffffff;"href="#">Log In</a>
      					<a class="nav-link float-right" style="color: #ffffff;"href="#">Sign In</a>	
      				<?php
					}
				?>
				
			</div>
			
			
		</div>
	</nav>

	<!-- Carrusel-->

	<script type="text/javascript" src="js/jQuery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript">
		function loadIndex(){
			top.location.href="./";
		}
		function closeSession(){
			top.location.href="./Sesion/cerrarSesion.php";	
		}
		function misFechas(){
			top.location.href="":
		}
		function historial(){
			top.location.href="":
		}
	</script>
	
	
</body>
</html>