<?php 
  if(isset($_POST['admin_login'])){
    $message = '';
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