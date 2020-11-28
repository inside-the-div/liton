<?php 

	

  include('database/database.php');
  include('session/session.php');
  include('handler/handler.php');
 if(!$session->get('login')){
 	header('Location: index.php');
 }
  $message = "";
  if(isset($_GET['id'])){
    $id = $_GET['id'];

 	if($id != ''){
 		$appiontments = $database->select_all()->from('appointment')->where('id = '.$id)->get();
 		if($appiontments){
 			$appointment = mysqli_fetch_array($appiontments);
 		}else{
 			$message .= $handler->error('Appiontments not found!','danger'); 
 		}
 	}else{
 		$message .= $handler->error('Id not found','danger'); 
 	}


  }else{
  	$message .= $handler->error('Page not found','danger'); 
  }




?>


<?php include('include/header.php'); ?>

  <div class="content-wrapper">
    <div class="container-fluid">

    	<div class="row mb-3">
        <div class="col-12">
          <h1 class="d-inline font-25 font-josefin mr-3 d-inline">Appiontments Details</h1>
          <?php 

              if($message != ''){
                echo $message;
              }

          ?>
        </div>  
      </div>



	    <div class="row">
	      	<div class="col-12 col-lg-6 offset-lg-3">
	            <div class="card p-3">

	            	<?php 

	            	if($message == ''){
	            	?>

	            	<h3 class="font-josefin font-25"><b>Name:</b> <?php echo $appointment['name'];?></h3>
	            	<h3 class="font-josefin font-20 mt-3"><b>Phone:</b> <?php echo $appointment['phone'];?></h3>
	            	<h3 class="font-josefin font-20 mt-3"><b>Address:</b> <?php echo $appointment['address'];?></h3>
	            	<h3 class="font-josefin font-20 mt-3"><b>Details:</b> <?php echo $appointment['about'];?></h3>
	            	<h3 class="font-josefin font-25 mt-3 text-info">Doctor: <?php echo $appointment['doctor'];?></h3>

	            	<h3 class="font-josefin font-25 mt-3 text-info">Date: <?php echo $appointment['date'];?></h3>
	            	<h3 class="font-josefin font-25 mt-3 text-info">Time: <?php echo $appointment['time'];?></h3>


	            	<?php 
	            	}else{
	            		echo $handler->error('Appointment not found','danger'); 
	            	}

	            	?>
	         
	            </div>
	            
	    	</div>  
	    </div>
	</div>
	  <!-- /.container-fluid-->
  </div>
    <!-- /.container-wrapper-->
<?php include('include/footer.php') ?>
