<?php
	// add all object file 
	include("includes/file/ob-start.php");
	// check login and go to the index page
    $session->login('index.php');
?>

<?php include('includes/pages/header-top.php') ?>

  <title>All Post</title>
<?php include('includes/pages/header-bottom.php') ?>

<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>




<!-- content area start -->
<?php include('includes/pages/container-start.php') ?>

<div class="row">
	<div class="col-12">
		<div class="page-header">
			<h1 class="d-inline-block mr-0 mr-lg-3 ">All Posts</h1> <a href="add-post.php" class="btn_1">Add post</a>
		</div>
	</div>
	<div class="col-12">
		<div class="d-block" id="post_message"></div>
	</div>
</div>

<!-- all post data table -->

<div class="row mt-3">
	<div class="col-12">
				<!-- Example DataTables Card-->
		      <div class="card mb-3">
		        <div class="card-header">
		          <i class="fa fa-table"></i> ALl post</div>
		        <div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>No</th>
		                  <th>title</th>
		                  <th>total view</th>
		                  <th>total comment</th>
		                  <th>time</th>
		                  <th>Delete</th>
		                  <th>Edit</th>
		                </tr>
		              </thead>
					
					<tbody>
					<?php 

						// fetch all post

						$row = $database->select_all()->from('post')->order_by('time')->sort('desc')->get();
						$no = 1;
						if(mysqli_num_rows($row) > 0){
							while ($post = mysqli_fetch_array($row)) {
								echo '<tr>
									  <td>'.$no.'</td>
					                  <td><a href="../'.$post['slug'].'">'.$post['title'].'</a></td>
					                  <td>61</td>
					                  <td>61</td>
					                  <td>'.$post['time'].'</td>
					                  <td><button data-id="'.$post['id'].'" class="post_delete_btn">Delete</button></td>
					                  <td><a class="btn btn_1" href="edit-post.php?id='.$post['id'].'">Edit</a></td>
					                </tr>';
					                $no++;
							}
						}

					?>

		              </tbody>
		            </table>
		          </div>
		        </div>
		        <div class="card-footer small text-muted">All post</div>
		      </div>
			  <!-- /tables-->
	</div>
</div>







<?php include('includes/pages/container-end.php') ?>
<!-- content area end -->
<?php include('includes/pages/footer.php') ?>

<?php include('includes/pages/all-script.php') ?>

<!-- post js -->
<script>
	// ===================== post delete =====================================

	$(document).ready(function(){
		$(".post_delete_btn").click(function(){
		    var this_id = $(this).data('id');

		    if(this_id != undefined || $this_id !=''){
		        
		        var confirm_variable = confirm('Are you sure want to delete ?');
		        if(confirm_variable){
		            
		            var delete_post = 1;
		            // ajax call
		            $.ajax({  
		              url:"includes/file/post.php",  
		              method:"POST",  
		              data:{id:this_id,delete_post:delete_post},  
		              success:function(data){
		                $("#post_message").html(data);
		              }  
		            }) 

		        }else{
		            alert("Your data is safe !");
		        }
		    }else{
		        alert("data id not found !");
		    }
		})
	})
</script>
<!-- end post js -->
<?php include('includes/pages/end-body-html.php') ?>
<?php include("includes/file/ob-end.php");?>