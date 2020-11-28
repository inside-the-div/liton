<?php 
	
	include('database/database.php');
	include('session/session.php');
	if(!$session->get('login')){
		header('Location: index.php');
	}

	$appointments = $database->select_all()->from('appointment')->get();
	$appointments_painding = $database->select_all()->from('appointment')->where('done = 0')->get();
	$doctors = $database->select_all()->from('doctor')->order_by('id desc')->get();



?>

<?php 
	include('include/header.php')
?>

	<div class="content-wrapper mt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-12">
					<div class="card p-3 bg-info text-center">
						<h5 class="text-left">Total Doctors</h5>
						<h1 class="display-3 text-light"><?php echo mysqli_num_rows($doctors);?></h1>
					</div>
				</div>

				<div class="col-lg-4 col-12">
					<div class="card p-3 bg-primary text-center">
						<h5 class="text-left">Total Appointment</h5>
						<h1 class="display-3 text-light"><?php echo mysqli_num_rows($appointments);?></h1>
					</div>
				</div>

				<div class="col-lg-4 col-12">
					<div class="card p-3 bg-success text-center">
						<h5 class="text-left">Total Pending Appointment</h5>
						<h1 class="display-3 text-light"><?php echo mysqli_num_rows($appointments_painding);?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php 
	include('include/footer.php')
?>