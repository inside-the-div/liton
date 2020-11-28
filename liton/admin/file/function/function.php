<?php 

	include('../handler/handler.php');



	// take file and check for imae or not 
	if(isset($_POST['image_upload'])){

		$image =  $_FILES['image'];
		$image_name = $image['name'];
		$file_extension = explode('.',$image_name);
		$file_extension = strtolower(end($file_extension));
		$accepted_formate = array('jpeg','jpg','png');

		if(in_array($file_extension,$accepted_formate)){

			$image_temp = $image['tmp_name'];
			$image_name = substr(md5(time()), 0, 10).'.'.$file_extension;
			

			$folder_name = 'upload';
			$image_src = $folder_name.'/'.$image_name;

			move_uploaded_file($image_temp,'../../'.$image_src);

			
			echo '../'.$image_src;
			

		}else{
			echo $handler->error('This is not an image !!','danger');
		}
		
	}





?>

