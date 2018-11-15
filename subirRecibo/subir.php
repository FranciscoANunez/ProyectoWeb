<?php
	session_start();
	include_once "../scripts/BDConnect.php";
   if(isset($_FILES['image'])){
   		$idRenta=$_POST['txtRentaId'];
   		$nombreArchivo=$_POST['txtRentaName'];


   		$nombreUsuario=$_SESSION['user'];
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../imgRecibos/$nombreUsuario/".$nombreArchivo);//$file_name);
         echo "<h1>Success</h1>";
         $strQuery="UPDATE rentas SET recibo= '../imgRecibos/$nombreUsuario/$nombreArchivo' WHERE idRenta=$idRenta";
         $conn->query($strQuery);



         	?>
		   	<script type="text/javascript">
   				top.frames[1].location.href="./";
   			</script>
   			<?php

      }else{
         print_r($errors);
      }
      echo "$nombreUsuario";
   }
   
?>
