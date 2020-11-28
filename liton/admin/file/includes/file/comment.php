<?php
	// database 
	include('../../database/database.php');
	// session
	include('../../session/session.php');
	// handler
	include('../../handler/handler.php');









	// ====================================not accept 


	if(isset($_POST['not_accept'])){

		
		$id = $_POST['id'];
		$not_accept = '0';
		$val = [
			'accept' => $not_accept
		];

		// already existes

		$row = $database->update('comment')->set($val)->where('id = '.$id)->get();

		if(is_string($row)){
			echo $handler->error($row,'danger');
		}else{
			echo $handler->success('Comment not aceept success:)');
		}
	}


	if(isset($_POST['accept'])){

		
		$id = $_POST['id'];
		$not_accept = '1';
		$val = [
			'accept' => $not_accept
		];

		// already existes

		$row = $database->update('comment')->set($val)->where('id = '.$id)->get();

		if(is_string($row)){
			echo $handler->error($row,'danger');
		}else{
			echo $handler->success('Comment aceept success:)');
		}
	}













?>