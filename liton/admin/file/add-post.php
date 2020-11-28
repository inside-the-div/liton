<?php
	// add all object file 
	include("includes/file/ob-start.php");
	// check login and go to the index page
    $session->login('index.php');
?>

<?php include('includes/pages/header-top.php') ?>

  <title>Add new post</title>
<?php include('includes/pages/header-bottom.php') ?>


<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>




<!-- content area start -->
<?php include('includes/pages/container-start.php') ?>

<div class="row">
	<div class="col-12">
		<div class="page-header">
			<h1 class="d-inline-block mr-0 mr-lg-3 ">Add new post</h1>
            
			<hr>
		</div>
	</div>
	<div class="col-12">
		<div class="row">
			<div class="col-12 col-lg-9">
				<label for="title"><b>Title</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="title">

				<label for="slug"><b>Slug</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="slug">

				
				<label for="content"><b>Content</b></label>
				<div id="editor"></div>

				<label for="excerpt" class="mt-2"><b>Excerpt (50 words)</b></label>
				
				<textarea rows="7"  id="excerpt" class="form-control rounded-0 mb-2" id="excerpt"></textarea>

				
				
			</div>
			<div class="col-12 col-lg-3">
				
				<label for="video_link"><b>Video link</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="video_link">
				<div id="show_video"></div>
				<label for="tag"><b>Tag</b></label>
				<textarea id="tag" cols="30" rows="4" class="form-control rounded-0 mb-2"></textarea>
				<label for="privacy"><b>Privacy</b></label>
				<select id="privacy" class="form-control rounded-0 mb-2">
					<option value="public">Public</option>
					<option value="private">Private</option>
				</select>

				<label for="category"><b>Category</b></label>
				<select id="category" class="form-control rounded-0 mb-2" multiple="multiple">

					<?php

						// fetch all category 

						$categories = $database->select_all()->from('category')->get();
						if(mysqli_num_rows($categories) > 0){
							while($category = mysqli_fetch_array($categories)){
								echo '<option value="'.$category['name'].'">'.$category['name'].'</option>';
							}
						}else{
							echo '<option>No Category Found !</option>';
						}
					?>


				
				</select>

				<label class="mt-2" for="source_code"><b>Source Code link</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="source_code">

			</div>
			<div class="col-12 my-3">
                <div id="post_message"></div>
				<button class="btn_1" id="upload_post">Upload Post</button>
			</div>
		</div>
	</div>
</div>



<?php include('includes/pages/container-end.php') ?>
<!-- content area end -->




<?php include('includes/pages/footer.php') ?>

<?php include('includes/pages/all-script.php') ?>





	<!-- WYSIWYG Editor -->
	<script src="assets\summer-note\summernote-bs4.min.js"></script>
	
    <!-- post js -->

    <?php include('includes/ajax-js/post-ajax.php');?>




<?php include('includes/pages/end-body-html.php') ?>
<?php include("includes/file/ob-end.php");?>