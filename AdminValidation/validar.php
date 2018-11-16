<?php
	include_once "../scripts/BDConnect.php";
	$id=$_GET['id'];
	$strQuery="UPDATE rentas SET estatus='O' WHERE idRenta=$id";
	echo "$id";
	$conn->query($strQuery);
	?>
		<script type="text/javascript">
			top.frames[1].location.href="./";
		</script>
	<?php
?>