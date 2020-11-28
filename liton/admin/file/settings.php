<?php
	// add all object file 
	include("includes/file/ob-start.php");
    // check login and go to the index page
    $session->login('index.php');


	// fetch all info 
	$info = $database->select_all()->from('web_info')->where('id = 1')->get();
	$web = mysqli_fetch_array($info);

	$title = $web['title'];
	$description = $web['description'];
	$tag = $web['tag'];
	$author = $web['author'];
	$email = $web['email'];
	$email_2 = $web['email_2'];
	$address = $web['address'];
	$copy_right = $web['copy_right'];
	$terms_condition = $web['terms_condition'];
	$code_pen = $web['code_pen'];
	$github = $web['github'];
	$linkedin = $web['linkedin'];
	$youtube = $web['youtube'];
	$about = $web['about'];

	// update all info 

	if(isset($_POST['submit'])){


		$message = '';
		$title = $_POST['title'];
		$author_name = $_POST['author_name'];
		$description = $_POST['description'];
		$tag = $_POST['tag'];
		$about = $_POST['about'];
		$privacy = $_POST['privacy'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$email_2 = $_POST['email_2'];
		$code_pen = $_POST['code_pen'];
		$github = $_POST['github'];
		$linkedin = $_POST['linkedin'];
		$youtube = $_POST['youtube'];
		$copyright = $_POST['copyright'];
		
		$value = [
			'title' => $title,
			'description' => $description,
			'tag' => $tag,
			'title' => $title,
			'author' => $author_name,
			'email' => $email,
			'email_2' => $email_2,
			'address' => $address,
			'copy_right' => $copyright,
			'terms_condition' => $privacy,
			'code_pen' => $code_pen,
			'github' => $github,
			'linkedin' => $linkedin,
			'youtube' => $youtube
		];

		$error = $handler->empty($value);
		if($error == ''){

			$row = $database->update('web_info')->set($value)->where('id = 1')->get();
			if(is_string($row)){
				$message =  $handler->error($row,'danger');
			}else{
				$message =  $handler->success('Settings update success !');
			}


		}else{
			$message =  $handler->error($error,'danger');
		}





	}










?>


<?php include('includes/pages/header-top.php') ?>

  <title>Settings</title>
<?php include('includes/pages/header-bottom.php') ?>

<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>





<?php include('includes/pages/container-start.php') ?>


<!-- content area start -->
<div class="row">
	<div class="col-12">
		<div class="page-header">
			<h1>Settings</h1>
			<?php 

					if(isset($_POST['submit'])){
						echo $message;
					}

			?>
			<hr>
		</div>
	</div>
</div>

<!-- settings form area start -->

<div class="row">
	<div class="col-12">
		<form action="settings.php" method="POST">
			<div class="row">
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Website Title</label>
					<input value="<?php echo $title;?>" name="title" type="text" class="form-control rounded-0">
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Author Name</label>
					<input value="<?php echo $author;?>" name="author_name" type="text" class="form-control rounded-0">
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Short Description</label>
					<textarea name="description" id="" cols="30" rows="5" class="form-control rounded-0"><?php echo $description; ?></textarea>
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Website Tags</label>
					<textarea name="tag" id="" cols="30" rows="5" class="form-control rounded-0"><?php echo $tag; ?></textarea>
				</div>
			</div>


			<div class="row mt-3">
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">About Text</label>
					<textarea name="about" id="" cols="30" rows="5" class="form-control rounded-0"><?php echo $about; ?></textarea>
					
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Privacy Police</label>
					<textarea name="privacy" id="" cols="30" rows="5" class="form-control rounded-0"><?php echo $terms_condition; ?></textarea>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Email</label>
					<input value="<?php echo $email;?>" name="email" type="text" class="form-control rounded-0">
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Email 2</label>
					<input value="<?php echo $email_2;?>" name="email_2" type="text" class="form-control rounded-0">
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Location / Address</label>
					<input value="<?php echo $address;?>" name="address" type="text" class="form-control rounded-0">
				</div>

				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Code Pen</label>
					<input value="<?php echo $code_pen;?>" name="code_pen"type="text" class="form-control rounded-0">
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Github</label>
					<input value="<?php echo $github;?>" name="github" type="text" class="form-control rounded-0">
				</div>
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Youtube</label>
					<input value="<?php echo $youtube;?>" name="youtube" type="text" class="form-control rounded-0">
				</div>
			
			
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">Linkedin Link</label>
					<input value="<?php echo $linkedin;?>" name="linkedin" type="text" class="form-control rounded-0">
				</div>
			
				<div class="col-12 col-lg-6">
					<label for="" class="font-weight-bold">CopyRight Text</label>
					<input value="<?php echo $copy_right;?>" name="copyright" type="text" class="form-control rounded-0">
				</div>
			</div>


			<div class="row mt-3 mb-5">
				<div class="col-12">
					<input name="submit" type="submit" class="form-control rounded-0" value="Save">
				</div>
			</div>



		</form>
	</div>
</div>


<?php include('includes/pages/container-end.php') ?>






<?php include('includes/pages/footer.php') ?>

<?php include('includes/pages/all-script.php') ?>

<?php include('includes/pages/end-body-html.php') ?>
