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
    
    $doctor = [
      'id' => $id
    ];
    $error = $handler->empty($doctor);
    if($error == ''){
       $docotr = $database->select_all()->from('doctor')->where('id = '.$id)->get();
       $docotr = mysqli_fetch_array($docotr);
    }else{
      $message .= $handler->error($error,'danger');
    }
  }


  // update code

  if(isset($_POST['update'])){


    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $id = $_POST['id'];
    $file_name = $_FILES['image']['name'];
    if($file_name){
      $image = $file_name;
      $doctor_value = [
        'name' => $name,
        'phone' => $phone,
        'about' => $about,
        'image' => $image
      ];
    }else{
        $doctor_value = [
        'name' => $name,
        'phone' => $phone,
        'about' => $about
      ];
    }
    
    // echo $_FILES['image']['tmp_name']."asdasd";
    $error = $handler->empty($doctor_value);
    if($error == ''){
      // image upload start 
      if($file_name){
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];

        $temp = explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($temp));
        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
           $message .= $handler->error("extension not allowed, please choose a JPEG or PNG file.",'danger');
        }

        if($file_size > 2097152){
          $message .= $handler->error("File size must be excately 2 MB",'danger');
        }

        if($message == ''){
          $file_name ="assets/img/".$file_name;
          move_uploaded_file($file_tmp,$file_name);
        }
    }

    $update = $database->update('doctor')->set($doctor_value)->where('id ='.$id)->get();
    if($update){
      $message .= $handler->success('Doctor updated success !');
    }
  }else{
     $message .= $handler->error("Something worng !",'danger');
  }
     

}


?>

<?php 
  include('include/header.php')
?>

  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3">
        <div class="col-12">
          <h1 class="d-inline font-25 font-josefin mr-3">Update Doctor</h1>
          <a href="add-doctor.php" class="btn_1 d-inline">Add new doctor</a>

      
        </div>  
      </div>

      <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
          <div class="card p-3">
            <div class="row">
              <div class="col-lg-4 col-12">
                <img src="assets/img/<?php echo $docotr['image'];?>" alt="" class="img-fluid">
                <h1 class="font-25 font-josefin">Name: <?php echo $docotr['name'];?></h1>
                 <h2 class="font-20 font-josefin">Phone: <?php echo $docotr['phone'];?></h2>
                 <p>About: <?php echo $docotr['about'];?></p>
              </div>

              <div class="col-lg-8 col-12">
                <form action="edit-doctor.php?id=<?php echo $docotr['id'];?>" enctype="multipart/form-data" method="POST">
                  <label for="name">Name*</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $docotr['name'];?>">

                  <label for="name" class="mt-3">Phone*</label>
                  <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $docotr['phone'];?>">

                  <label for="image" class="mt-3">Image*</label>
                  <input type="file" class="form-control" name="image" placeholder="Image">
                  <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                  <label for="name" class="mt-3">About*</label>
                  <textarea name="about" class="form-control" id="" cols="30" rows="5"><?php echo $docotr['about'];?></textarea>
                  <input type="submit" class="btn btn-info mt-2 rounded-0 form-control border-0" value="update" name="update">
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

    </div>
    <!-- /.container-fluid-->
  </div>
<?php 
  include('include/footer.php');
?>