<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript">
		function loadIndex(){
			top.location.href="./";
		}
		function closeSession(){
			top.location.href="./Sesion/cerrarSesion.php";	
		}
		function misFechas(){
			top.frames[1].location.href="./subirRecibo/";
		}
		function historial(){
			top.frames[1].location.href="./historial/";
		}
		function login(){
			top.frames[1].location.href="./Sesion/iniciosesion.php";
		}
		function signin(){
			top.frames[1].location.href="./Usuarios/addUsuario.php";
		}
		function validarRentas(){
			top.frames[1].location.href="./AdminValidation/";	
		}
	</script>
</head>
<body>
	<!-- NavBar la de arrriba-->
	<nav class="navbar navbar-light" style="background-color: #2E64FE;">
		<div class="container">
			<a class="navbar-brand" onclick="loadIndex()" href="#">Home</a> 	
			<div class="float-right" >
				<?php

					if(isset($_SESSION['user'])){
						$usuario=$_SESSION['user'];
					?>
						<a class="nav-link float-right" style="color: #000000;"> <?php echo "$usuario" ;?></a>
						<a class="nav-link float-right" style="color: #ffffff;" href="#" onclick="closeSession()">Cerrar Sesion</a>
						<a class="nav-link float-right" style="color: #ffffff;" href="#" onclick="misFechas()">Mis Fechas</a>
						<a class="nav-link float-right" style="color: #ffffff;" href="#" onclick="historial()">Historial</a>
      				<?php
      					if($_SESSION['type']=='A'){
      						?>
      							<a class="nav-link float-right" style="color: #ffffff;" href="#" onclick="validarRentas()">Validar Rentas</a>		
      						<?php
      					}
					}else{
					?>
						<a class="nav-link float-right" style="color: #ffffff;"href="#" onclick="login()">Ingresa</a>
      					<a class="nav-link float-right" style="color: #ffffff;"href="#" onclick="signin()">Registra</a>	
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
	
	
	
</body>
</html>