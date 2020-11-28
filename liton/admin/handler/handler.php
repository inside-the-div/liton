<?php 

	
	class handler{

		// empty check from a associative array 
		public static function empty($values){
			$i = 0;
			$error = '';
			foreach ($values as $key => $value) {
			  if(empty($value)){
			    if($i>0){
			      $error .=", ".$key;
			    }else{
			      $error .=" ".$key;
			    }
			    $i++;
			  }

			}

			if(empty($error)){
			  return '';
			}else{
			  return $error." is empty!!!";
			}
		}


// timestamp to date 

		public static function date($str){
			$date_time = strtotime($str);
			return date('d-m-Y',$date_time);
		}



// echo error message using boostrap alert 
		public static function error($str,$class){
			$message = '<div class="alert alert-'.$class.' alert-dismissible my-2 rounded-0" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         '.$str.'
                       </div>';

			return $message;
		}
// echo success message using bootstrap  alert
		public static function success($str){
			$message = '<div class="alert alert-success alert-dismissible my-2 rounded-0" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         '.$str.'
                       </div>';

			return $message;
		}


	}



	$handler = new handler;




?>