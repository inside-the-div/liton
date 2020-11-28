<?php 
  
  include('database/database.php');
  include('session/session.php');
  include('handler/handler.php');
  if(!$session->get('login')){
   header('Location: index.php');
  }

  //$appointments = $database->select_all()->from('appointment')->order_by('id desc')->get();
  $message = "";
  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $file_name = $_FILES['image']['name'];
    $image = $file_name;

    // echo $_FILES['image']['tmp_name']."asdasd";
    $doctor = [
      'name' => $name,
      'phone' => $phone,
      'about' => $about,
      'image' => $image
    ];
    $error = $handler->empty($doctor);
    if($error == ''){
      // image upload start 
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];

      $temp = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($temp));

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false){
         $message .= $handler->error("extension not allowed, please choose a JPEG or PNG file.",'danger');
      }else{
        if($file_size > 2097152){
          $message .= $handler->error("File size must be excately 2 MB",'danger');
        }else{
      
          $file_name ="assets/img/".$file_name;
          if(move_uploaded_file($file_tmp,$file_name)){
            $insert = $database->insert('doctor')->values($doctor)->get();
            if($insert){
              $message .= $handler->success('Doctor added success !!');
            }else{
              $message .= $handler->error('something worng!','danger');
            }
          }else{
            $message .= $handler->error("image not upload",'danger');
          }
         
        }
      }
    }else{
      $message .= $handler->error($error,'danger');
    }
  }



?>

<?php 
  include('include/header.php')
?>

  <div class="content-wrapper mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
          <div class="card p-3">
            <h3 class="mb-3">Add a new doctor</h3>
            <form action="add-doctor.php" enctype="multipart/form-data" method="POST">
              <label for="name">Name*</label>
              <input type="text" class="form-control" name="name" placeholder="Name">

              <label for="name" class="mt-3">Phone*</label>
              <input type="text" class="form-control" name="phone" placeholder="Phone">

              <label for="image" class="mt-3">Image*</label>
              <input type="file" class="form-control" name="image" placeholder="Image">

              <label for="name" class="mt-3">About*</label>
              <textarea name="about" class="form-control" id="" cols="30" rows="5"></textarea>
              <input type="submit" class="btn btn-info mt-2 rounded-0 form-control border-0" value="Add" name="submit">
            </form>

            <?php 
              if($message != ''){
                echo $message;
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php 
  include('include/footer.php')
?>