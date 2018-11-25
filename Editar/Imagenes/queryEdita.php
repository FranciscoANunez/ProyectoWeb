<?php

	include_once "../../scripts/BDConnect.php";
	session_cache_limiter('private');
   	session_cache_expire(0);
	session_start();
	

	

	//$checkConserva=$_POST['checkConserva'];
	
	 
	$img = $_FILES['image'];
	$checkConserva=$_POST['checkConserva'];

	$valor=1;

	if ($checkConserva) {
		$strQuery="SELECT MAX(valor) FROM imagenesCarrousel";
		$result=$conn->query($strQuery);
		
		if($result->num_rows>0){
			$row=$result->fetch_array(MYSQLI_NUM);
			$valor+=$row[0];
		}

	}else{
		$strQuery="DELETE FROM imagenesCarrousel";
		$conn->query($strQuery);
	}

	if(!empty($img))
		{	
		    $img_desc = reArrayFiles($img);
		    foreach($img_desc as $val)
	    	{
	    		$file_ext=strtolower(end(explode('.',$val['name'])));
	    		$newname = "auditorio".$valor.".".$file_ext;
	    		
	    		

	        	move_uploaded_file($val['tmp_name'],'../../img/'.$newname);
	        	$agrgar="INSERT INTO imagenesCarrousel VALUES('./img/$newname',$valor)";
	        	$conn->query($agrgar);
	    		$valor++;
	    }
	}

	?>
		<script type="text/javascript">
			top.location.href="../../";
		</script>
	<?php
		 	
	

	function reArrayFiles($file)
	{
	    $file_ary = array();
	    $file_count = count($file['name']);
	    $file_key = array_keys($file);
	   
	    for($i=0;$i<$file_count;$i++)
	    {
	        foreach($file_key as $val)
	        {
	            $file_ary[$i][$val] = $file[$val][$i];
	        }
	    }
	    return $file_ary;
	}
?>