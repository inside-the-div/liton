<?php
	// database 
	include('../../database/database.php');
	// session
	include('../../session/session.php');
	// handler
	include('../../handler/handler.php');



	// ==================================== add menu 
	if(isset($_POST['add_menu'])){

		// admin information fetch form session 

		$admin_name = $session->get('login_user_name');
		$admin_id = $session->get('login_user_id'); 

		$menu = $_POST['menu_name'];
		$val = [
			'name' => $menu
			
		];

		// already existes

		$row = $database->select('id')->from('menu')->where('name = "'.$menu.'"')->get();

		if(mysqli_num_rows($row) > 0){
			echo $handler->error('This menu already existes !!','danger');
		}else{
			$row = $database->insert('menu')->values($val)->get();
			if(is_string($row)){
				echo $handler->error($row,'danger');
			}else{
				echo $handler->success('menu added successfully :)');
			}
		}
	}



	// ==================================== delete menu


	if(isset($_POST['delete_menu'])){

		$id = $_POST['id'];

		

		$delete = $database->delete('menu')->where('id = '.$id)->get();

		if($delete == 1){
			echo $handler->success('Menu Delete Success !!');
		}else{
			echo $handler->error($delete,'warning');
		}
	}


	// ==================================== update menu


	if(isset($_POST['update_menu'])){

		$menu = $_POST['menu_name'];
		$id = $_POST['id'];
		$val = [
			'name' => $menu
		];

		// already existes

		$row = $database->update('menu')->set($val)->where('id = '.$id)->get();

		if(is_string($row)){
			echo $handler->error($row,'danger');
		}else{
			echo $handler->success('menu update successfully :)');
		}
	}













?>