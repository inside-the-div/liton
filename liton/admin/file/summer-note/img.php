<?php 



	    $temp = $_FILES["files"]["tmp_name"];
	    $name = $_FILES["files"]["name"];
	      
	  
	      
	    move_uploaded_file($temp,"upload/".$name);

	    echo 'summer-note/upload/'.$name;


?>