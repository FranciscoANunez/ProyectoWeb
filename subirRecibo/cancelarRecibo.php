<?php
	include_once "../scripts/BDConnect.php";
	$id=$_GET['id'];
	$strQuery="DELETE FROM rentas WHERE idRenta=$id";
	$conn->query($strQuery);
	?>
		<script type="text/javascript">
   				top.frames[1].location.href="./";
   		</script>
	<?php

?>