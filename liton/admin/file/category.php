<?php
	// add all object file 
	include("includes/file/ob-start.php");
	// check login and go to the index page
    $session->login('index.php');
?>

<?php include('includes/pages/header-top.php') ?>

  <title>Category</title>
<?php include('includes/pages/header-bottom.php') ?>

<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>




<!-- content area start -->
<?php include('includes/pages/container-start.php') ?>

<div class="row">
	<div class="col-12">
		<div class="page-header">
			<h1 class="d-inline-block mr-0 mr-lg-3 ">Category</h1> <button class="btn_1 " data-toggle="modal" data-target="#category_add_modal" type="button">Add Category</button>
		</div>
	</div>
	<div class="col-12">
		<div class="d-block" id="category_message"></div>
	</div>
</div>

<!-- all category data table -->

<div class="row mt-3">
	<div class="col-12">
				<!-- Example DataTables Card-->
		      <div class="card mb-3">
		        <div class="card-header">
		          <i class="fa fa-table"></i> ALl Category</div>
		        <div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>No</th>
		                  <th>Name</th>
		                  <th>Added By</th>
		                  <th>Date</th>
		                  <th>Total Post</th>
		                  <th>Delete</th>
		                  <th>Edit</th>
		                </tr>
		              </thead>
					
					<tbody>
					<?php 

						// fetch all category

						$row = $database->select_all()->from('category')->order_by('time')->sort('desc')->get();
						$no = 1;
						if(mysqli_num_rows($row) > 0){
							while ($category = mysqli_fetch_array($row)) {
								echo '<tr>
									  <td>'.$no.'</td>
					                  <td>'.$category['name'].'</td>
					                  <td><a href="user.php?id='.$category['added_by_id'].'">'.$category['added_by_name'].'</a></td>
					                  <td>'.$category['time'].'</td>
					                  <td>61</td>
					                  <td><button data-id="'.$category['id'].'" class="category_delete_btn">Delete</button></td>
					                  <td><button data-category="'.$category['name'].'"  data-id="'.$category['id'].'" class="category_edit_btn"  data-toggle="modal" data-target="#category_update_modal" type="button">Edit</button></td>
					                </tr>';
					                $no++;
							}
						}

					?>

		              </tbody>
		            </table>
		          </div>
		        </div>
		        <div class="card-footer small text-muted">All Category</div>
		      </div>
			  <!-- /tables-->
	</div>
</div>




















<!-- modal for add category -->

<div class="modal fade" id="category_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<label for="category_add_field"></label>
       	<input type="text" class="form-control rounded-0 mb-2" id="category_add_field">
      </div>
      <div id="category_add_message" class="p-2"></div>
      <div class="modal-footer">
      	
        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary rounded-0" id="category_add_btn">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- category edit modal -->

<div class="modal fade" id="category_update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<label for="update_category_add_field" id="update_category_field"></label>
       	<input type="text" class="form-control rounded-0 mb-2" id="update_category_add_field">
       	<input type="hidden" class="form-control rounded-0 mb-2" id="update_category_id">
      </div>
      <div id="category_update_message" class="p-2"></div>
      <div class="modal-footer">
      	
        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary rounded-0" id="category_update_btn">Update</button>
      </div>
    </div>
  </div>
</div>

<?php include('includes/pages/container-end.php') ?>
<!-- content area end -->





<?php include('includes/pages/footer.php') ?>

<?php include('includes/pages/all-script.php') ?>








<!-- category js -->
<?php include('includes/ajax-js/category-ajax.php');?>
<!-- end category js -->
<?php include('includes/pages/end-body-html.php') ?>
<?php include("includes/file/ob-end.php");?>