<?php

  // include all object file like database, handler, session  
  include('includes/file/ob-start.php');
  // include login code 
  include('includes/code/login-code.php');

?>



<?php include('includes/pages/header-top.php') ?>
  <title>Login as Admin</title>
<?php include('includes/pages/header-bottom.php') ?>



<!-- start content area -->


	  <div class="container">
     <div class="row mt-0 mt-lg-5">
       <div class="col-12 col-lg-6 offset-lg-3">
         <div class="card rounded-0 p-2">
           <h1 class="text-center" style="font-size: 30px;">Login as admin !</h1>
            <form action="" method="POST">
              <label for="email"><strong>Email*</strong></label>
              <input type="email" name="email" placeholder="Your Email" class="form-control rounded-0 mb-2">

              <label for="email"><strong>Password*</strong></label>
              <input type="password" name="password" class="form-control rounded-0 mb-2">

              <input type="submit" value="Login" name="admin_login" class="form-control rounded-0 mb-2">
            </form>
            
            <?php 

                // echo login error or message 

                if(isset($_POST['admin_login']) && $message !=''){
                    echo $message;
                }

            ?>
            <div class="text-center">
              <p class="m-0">copyright &copy; 2019 <a href="http://nasirkhan.me">Nasir Khan</a></p>
            </div>
         </div>
       </div>
     </div> 
   </div>
		

<!-- end content area -->







<?php include('includes/pages/all-script.php') ?>

<?php include('includes/pages/end-body-html.php') ?>
<?php  include('includes/file/ob-end.php') ?>