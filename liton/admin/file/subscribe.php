<?php
	// add all object file 
	include("includes/file/ob-start.php");
	// check login and go to the index page
    $session->login('index.php');
?>

<?php include('includes/pages/header-top.php') ?>

  <title>Subscribe</title>
<?php include('includes/pages/header-bottom.php') ?>

<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>




<!-- content area start -->
<?php include('includes/pages/container-start.php') ?>

<div class="row">
	<div class="col-12">
		<div class="page-header">
			<h1 class="d-inline-block mr-0 mr-lg-3 ">Subscribe</h1>
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
		          <i class="fa fa-table"></i> ALl Subscribe</div>
		        <div class="card-body">
		          <div class="table-responsive">
		            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		              <thead>
		                <tr>
		                  <th>No</th>
		                  <th>Email</th>
		                </tr>
		              </thead>
					
					<tbody>
					<?php 

						// fetch all category

						$row = $database->select_all()->from('subscribers')->get();
						$no = 1;
						if(mysqli_num_rows($row) > 0){
							while ($category = mysqli_fetch_array($row)) {
								echo '<tr>
									  <td>'.$no.'</td>
					                  <td>'.$category['email'].'</td>
					                 
					                  
					                </tr>';
					                $no++;
							}
						}

					?>

		              </tbody>
		            </table>
		          </div>
		        </div>
		        <div class="card-footer small text-muted">All Subscribe</div>
		      </div>
			  <!-- /tables-->
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