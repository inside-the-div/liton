<?php include('admin/database/database.php'); ?>
<?php include('admin/handler/handler.php'); ?>


<?php 
  
  $message = "";
  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $about = $_POST['about'];
    $doctor = $_POST['doctor'];

    $date = $_POST['date'];
    $time = $_POST['time'];

    $appointment = [

      'name'    => $name,
      'phone'   => $phone,
      'about'   => $about,
      'address' => $address,
      'doctor'  => $doctor,
      'date'    => $date,
      'time'    => $time

    ];

    

    $error = $handler->empty($appointment);

    if($error == ''){
      $insert = $database->insert('appointment')->values($appointment)->get();
      if($insert){
        $message .= $handler->success('Appointment submit success !!');
      }else{
        $message .= $handler->error('something worng!','danger');
      }
    }else{
      $message = $handler->error('pleas fill all the fields!!','danger');
    }


  }

?>



<?php 
  $book_doc = 0;
  if(isset($_GET['id'])){

     $book_doc = $_GET['id'];

     $docotr = $database->select_all()->from('doctor')->where('id = '.$book_doc)->get();
     $docotr = mysqli_fetch_array($docotr);

  }

  $doctors = $database->select_all()->from('doctor')->order_by('id')->sort('desc')->get();

?>

  <?php include('include/header.php')?>
  <?php include('include/header-top.php')?>
  <?php include('include/nav.php')?>
	  
	  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		  <div class="overlay"></div>
		  <div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-start">
			  <div class="col-md-9 ftco-animate pb-4">
				<h1 class="mb-3 bread">Appointment</h1>
				 <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Appointment <i class="ion-ios-arrow-forward"></i></span></p>
			  </div>
			</div>
		  </div>
    </section>


    <section>
    	<div class="container">


    		<div class="row">
    			<div class="col-12 text-center">
    				<h1>Appointment form</h1>
    			</div>
    		</div>

    		<div class="row">
          <?php 

            if(isset($_GET['id'])){
              ?>


       
          <div class="col-12 col-lg-6">

            <img src="admin/assets/img/<?php echo $docotr['image'];?>" alt="" class="img-fluid">

            <h2 class="font-25 font-josefin">Name: <?php echo $docotr['name'];?></h2>
           <h4 class="font-20 font-josefin">Phone: <?php echo $docotr['phone'];?></h4>
           <p>About: <?php echo $docotr['about'];?></p>
          </div>

              <?php
            }

          ?>


    			<div class="col-12 col-lg-6">
              <?php 
               if($message != ''){
                 echo $message;
               }
              ?>
    			   <form action="appointment.php" method="POST">
               
                 
                   <label for="" style="color: #000;"><b>Name*</b></label>
                   <input type="text" class="form-control rounded-0 mb-2" placeholder="Enter Your Name" name="name">


                   <label for="" style="color: #000;"><b>Phone Number*</b></label>
                   <input type="text" class="form-control rounded-0 mb-2" placeholder="Enter Your Name" name="phone">

                   <label for="" style="color: #000;"><b>Date*</b></label>
                   <input type="date" class="form-control rounded-0 mb-2" placeholder="date" name="date">

                   <label for="" style="color: #000;"><b>Time*</b></label>
                   <input type="time" class="form-control rounded-0 mb-2" placeholder="time" name="time">


                   <label for="" style="color: #000;"><b>Address*</b></label>
                   <textarea name="address" id="" cols="30" rows="3" class="form-control rounded-0 mb-2"></textarea>

                    <label for="" style="color: #000;"><b>Select Doctor*</b></label>
                    <select name="doctor" id="" class="form-control rounded-0 mb-2">
                     <?php 
                       while($row = mysqli_fetch_array($doctors))  {

                         if($book_doc == $row['id']){
                           echo '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';
                         }else{
                           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                         }
                       }
                     ?>
                    </select>
                    <label for="" style="color: #000;"><b>About your disease*</b></label>
                    <textarea name="about" id="" cols="30" rows="3" class="form-control rounded-0 mb-2"></textarea>
                    <button class="btn btn-info rounded-0 my-4 " type="submit" name="submit">Submit</button>
             </form>

    		  </div>
        </div>
    	</div>
    </section>





  <?php include('include/footer.php');?>
  <?php include('include/end-html.php');?>