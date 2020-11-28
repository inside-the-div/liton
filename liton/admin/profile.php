<?php 
	
	include('database/database.php');
	include('session/session.php');
	include('handler/handler.php');
	if(!$session->get('login')){
		header('Location: index.php');
	}
	$id = $session->get('login_user_id');
	$messsage_pass = "";
	$messsage_name = "";
	if(isset($_POST['pass_update'])){
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];

		if($old_pass != '' && $new_pass){
			$user = $database->select_all()->from('user')->where('id = '.$id)->get();

		
		
			$user = mysqli_fetch_array($user);

			$this_pass = $user['password'];

			if($this_pass != $old_pass){
				$messsage_pass .= $handler->error('Wrong password!','danger');
			}else{
				$val = [
					'password' => $new_pass
				];
				$update = $database->update('user')->set($val)->get();
				if($update){
					$messsage_pass .= $handler->success('Password change success!');
				}
			}



		
		}else{
			$messsage_pass .= $handler->error('Please fill all the fields','danger');
		}

	
	}

	if(isset($_POST['name_update'])){

		$name = $_POST['name'];

		if($name != ''){
			$val = [
				'name' => $name
			];
			$update = $database->update('user')->where('id = '.$id)->get();
			if($update){
				$messsage_name .= $handler->success('Name Update Success!');
				$session->set('login_user_name',$name);
			}

		}else{
			$messsage_name .= $handler->error('Name Empty!!','danger');
		}
		
	}



?>

<?php 
	include('include/header.php')
?>

	<div class="content-wrapper mt-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card p-3">
								<h4 class="font-josefin font-30">Update Name</h4>
								<form action="profile.php" method="post">
									<label for="" class="font-20 font-josefin mt-3">Name: </label>
									<input type="text" name="name" class="form-control"  value="<?php echo $session->get('login_user_name') ?>">
									<input type="submit" name="name_update" class="btn btn-info mt-2 form-control"  value="Update">
								</form>
								<?php 

									if($messsage_name != ''){
										echo $messsage_name;
									}
								?>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card p-3">
								<h4 class="font-josefin font-30">Change Password</h4>
								<form action="profile.php" method="post">
									<label for="" class="font-20 font-josefin mt-3">Old Password: </label>
									<input type="Password" class="form-control" name="old_pass">

									<label for="" class="font-20 font-josefin mt-3">New Password: </label>
									<input type="Password" class="form-control" name="new_pass">

									<input type="submit" name="pass_update" class="btn btn-info mt-2 form-control"  value="Change">
								</form>

								<?php 

									if($messsage_pass != ''){
										echo $messsage_pass;
									}
								?>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>



<?php 
	include('include/footer.php')
?>