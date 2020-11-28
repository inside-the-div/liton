<?php
	// add all object file 
	include("includes/file/ob-start.php");
	// check login and go to the index page
    $session->login('index.php');


	if(isset($_GET['id'])){

		$id = $_GET['id'];
		$rows = $database->select_all()->from('post')->where('id = '.$id)->get();

		if(mysqli_num_rows($rows)>0){


			$post = mysqli_fetch_array($rows);

			$title = $post['title'];
			$slug = $post['slug'];
			$body = $post['body'];
			$excerpt = $post['excerpt'];
			$video_link = $post['video_link'];
			$tag = $post['tag'];
			$privacy = $post['privacy'];
			$source_code = $post['source_code'];
			$category_list = $post['category_list'];

		}else{
			echo '404 not found !!';
			exit();
		}


	}else{
		echo '404 not found !!';
		exit();
	}


?>

<?php include('includes/pages/header-top.php') ?>

  <title><?php echo $slug;?></title>
<?php include('includes/pages/header-bottom.php') ?>


<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>




<!-- content area start -->
<?php include('includes/pages/container-start.php') ?>

<div class="row">
	<div class="col-12">
		<div class="page-header">
			<h1 data-id="<?php echo $id;?>"  id="title_of_this_post" class="d-inline-block mr-0 mr-lg-3 "><?php echo $title;?></h1>
            <div id="this_post_body" style="display: none;">
				<?php echo $body;?>
			</div>
			<hr>
		</div>
	</div>
	<div class="col-12">
		<div class="row">
			<div class="col-12 col-lg-9">
				<label for="title"><b>Title</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="title" value="<?php echo $title ?>">

				<label for="slug"><b>Slug</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="slug" value="<?php echo $slug ?>">

				
				<label for="content"><b>Content</b></label>
				<div id="editor"></div>

				<label for="excerpt" class="mt-2"><b>Excerpt</b></label>
				
				<textarea rows="7"  id="excerpt" class="form-control rounded-0 mb-2" id="excerpt"><?php echo $excerpt;?></textarea>

				
				
			</div>
			<div class="col-12 col-lg-3">
				

				

				
				<label for="video_link"><b>Video link</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="video_link" value="<?php echo $video_link ?>">
				<div id="show_video"></div>
				<label for="tag"><b>Tag</b></label>
				<textarea id="tag" cols="30" rows="4" class="form-control rounded-0 mb-2"><?php echo $tag ?></textarea>
				<label for="privacy"><b>Privacy</b></label>
				<select id="privacy" class="form-control rounded-0 mb-2">
					<?php echo '<option value="'.$privacy.'">'.$privacy.'</option>' ?>
					<option value="public">Public</option>
					<option value="private">Private</option>
				</select>

				<label for="category"><b>Category</b></label>
				<select id="category" class="form-control rounded-0 mb-2" multiple="multiple">

					<?php 
						$this_post_cat_array = explode(",",$category_list);

						
						// all categories
						 $categories = $database->select_all()->from('category')->get();
						
						 	while($category = mysqli_fetch_array($categories)){

						 		if(in_array($category['name'],$this_post_cat_array)){
						 			echo '<option selected="selected" value="'.$category['name'].'">'.$category['name'].'</option>';
						 		}else{
						 			echo '<option value="'.$category['name'].'">'.$category['name'].'</option>';
						 		}
						 	}
						 

					?>




				</select>

				<label class="mt-2" for="source_code"><b>Source Code link</b></label>
				<input type="text" class="form-control rounded-0 mb-2" id="source_code" value="<?php echo $source_code ?>">

			</div>
			<div class="col-12 my-3">
                <div id="post_message"></div>
				<button class="btn_1" id="update_post">Update Post</button>
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

   	

   	<?php include('includes/ajax-js/post-edit-ajax.php')?>



<?php include('includes/pages/end-body-html.php') ?>
<?php include("includes/file/ob-end.php");?>