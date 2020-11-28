<?php
	// database 
	include('../../database/database.php');
	// session
	include('../../session/session.php');
	// handler
	include('../../handler/handler.php');



	// ==================================== add category 
	if(isset($_POST['add_category'])){

		// admin information fetch form session 

		$admin_name = $session->get('login_user_name');
		$admin_id = $session->get('login_user_id'); 

		$category = $_POST['category_name'];
		$val = [
			'name' => $category,
			'added_by_name' => $admin_name,
			'added_by_id' => $admin_id
		];

		// already existes

		$row = $database->select('id')->from('category')->where('name = "'.$category.'"')->get();

		if(mysqli_num_rows($row) > 0){
			echo $handler->error('This category already existes !!','danger');
		}else{
			$row = $database->insert('category')->values($val)->get();
			if(is_string($row)){
				echo $handler->error($row,'danger');
			}else{
				echo $handler->success('Category added successfully :)');
			}
		}
	}



	// ==================================== delete category


	if(isset($_POST['delete_category'])){

		$id = $_POST['id'];

		

		$delete = $database->delete('category')->where('id = '.$id)->get();

		if($delete == 1){
			echo $handler->success('Project Delete Success !!');
		}else{
			echo $handler->error($delete,'warning');
		}
	}


	// ==================================== update category


	if(isset($_POST['update_category'])){

		$category = $_POST['category_name'];
		$id = $_POST['id'];
		$val = [
			'name' => $category
		];

		// already existes

		$row = $database->update('category')->set($val)->where('id = '.$id)->get();

		if(is_string($row)){
			echo $handler->error($row,'danger');
		}else{
			echo $handler->success('Category update successfully :)');
		}
	}













?>