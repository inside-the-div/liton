<?php 

  // add all object file like php ob, session, database, handler 
  include('includes/file/ob-start.php');
  // check login and go to the index page
  $session->login('index.php');



  // total view 

  $t_view = mysqli_fetch_array($database->select('sum(total_view)')->from('post')->get());
  $total_view = $t_view['sum(total_view)'];



  // total post 

   $total_post = mysqli_num_rows($database->select('id')->from('post')->get());


 




?>

<?php include('includes/pages/header-top.php') ?>

  <title>Dashboard || Inside The Div</title>
<?php include('includes/pages/header-bottom.php') ?>

<?php include('includes/pages/left-nav.php') ?>

<?php include('includes/pages/top-nav.php') ?>





<?php include('includes/pages/container-start.php') ?>

	  <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-table"></i>
              </div>
              <div class="mr-5"><h5><?php echo $total_view; ?></h5></div>
            </div>
            <div class="card-footer text-white clearfix small z-1">
              <span class="float-left">Total View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>
              </div>
				<div class="mr-5"><h5>32</h5></div>
            </div>
            <div class="card-footer text-white clearfix small z-1" >
              <span class="float-left">Total Comment</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-check-o"></i>
              </div>
              <div class="mr-5"><h5><?php echo $total_post;?></h5></div>
            </div>
            <div class="card-footer text-white clearfix small z-1" href="index.php">
              <span class="float-left">Total Post</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card dashboard text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-heart"></i>
              </div>
              <div class="mr-5"><h5>10 New Bookmarks!</h5></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
		</div>
		<!-- /cards -->
<?php include('includes/pages/container-end.php') ?>






<?php include('includes/pages/footer.php') ?>

<?php include('includes/pages/all-script.php') ?>

<?php include('includes/pages/end-body-html.php') ?>

<?php include('includes/file/ob-end.php')?>
