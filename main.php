<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" ></script>
</head>
<body>
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
	<script type="text/javascript" src="js/jQuery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script>
		$('.carousel').carousel({interval: 2000});
	</script>	
</body>
</html>