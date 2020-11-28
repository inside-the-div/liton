 <?php 
    include('database/database.php');
    include('session/session.php');
    include('handler/handler.php');
 ?>


 <?php 

   $message = '';
   if(isset($_POST['submit'])){
    
     $email = $_POST['email'];
     $password = $_POST['password'];
     $value = [
         'email' => $email,
         'password' => $password
     ];
     $empty = $handler->empty($value);
     if($empty == ''){
         $row = $database->select_all()->from('user')->where('email = "'.$email.'" and password = "'.$password.'"')->get();
         if(mysqli_num_rows($row) >0){

           $user = mysqli_fetch_array($row);
           $user_name =  $user['name'];
           $user_email = $user['email'];
           $user_id = $user['id'];

           // set session 
           $session->set('login_user_name',$user_name);
           $session->set('login_user_email',$user_email);
           $session->set('login_user_id',$user_id);
           $session->set('login',true);
           header('Location: home.php');
         }else{
           $message = $handler->error("Accout Not Found !!",'danger');
         }

     }else{
       $message = $handler->error($empty,'warning');
     }
   }
 ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  	<style>
  		@import "bourbon";

  		body {
  			background: #eee !important;	
  		}

  		.wrapper {	
  			margin-top: 80px;
  		  margin-bottom: 80px;
  		}

  		.form-signin {
  		  max-width: 380px;
  		  padding: 15px 35px 45px;
  		  margin: 0 auto;
  		  background-color: #fff;
  		  border: 1px solid rgba(0,0,0,0.1);  

  		  .form-signin-heading,
  			.checkbox {
  			  margin-bottom: 30px;
  			}

  			.checkbox {
  			  font-weight: normal;
  			}

  			.form-control {
  			  position: relative;
  			  font-size: 16px;
  			  height: auto;
  			  padding: 10px;
  				@include box-sizing(border-box);

  				&:focus {
  				  z-index: 2;
  				}
  			}

  			input[type="text"] {
  			  margin-bottom: -1px;
  			  border-bottom-left-radius: 0;
  			  border-bottom-right-radius: 0;
  			}

  			input[type="password"] {
  			  margin-bottom: 20px;
  			  border-top-left-radius: 0;
  			  border-top-right-radius: 0;
  			}
  		}

  	</style>
  	<title>Document</title>
  </head>
  <body>
  	<div class="wrapper">
  	  <form class="form-signin" method="POST">       
  	    <h2 class="form-signin-heading mb-3">Login as admin</h2>
  	    <input type="email" class="form-control mb-3 rounded-0" name="email" placeholder="Email Address" required="" autofocus="" />
  	    <input type="password" class="form-control mb-3 rounded-0" name="password" placeholder="Password" required=""/>      
  	    
  	    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>  

          <?php 
        if($message !=''){
          echo $message;
        }
      ?> 
  	  </form>

    
  	</div>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
  </body>
  </html>


