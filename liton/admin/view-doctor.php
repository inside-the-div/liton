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



?>

<?php 
  include('include/header.php')
?>

  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mb-3">
        <div class="col-12">
          <h1 class="d-inline font-25 font-josefin mr-3">View Doctor</h1>
          <a href="add-doctor.php" class="btn_1 d-inline">Add new doctor</a>

          <?php 
              if($message != ''){
                echo $message;
              }
          ?>
        </div>  
      </div>

      <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
          <div class="card p-3">
            <div class="row">
              <div class="col-lg-6 col-12">
                <img src="assets/img/<?php echo $docotr['image'];?>" alt="" class="img-fluid">
              </div>

              <div class="col-lg-6 col-12">
                <h1 class="font-25 font-josefin">Name: <?php echo $docotr['name'];?></h1>
                 <h2 class="font-20 font-josefin">Phone: <?php echo $docotr['phone'];?></h2>
                 <p>About: <?php echo $docotr['about'];?></p>
              </div>
            </div>
           
          </div>
          
        </div>
      </div>

    </div>
    <!-- /.container-fluid-->
  </div>
<?php 
  include('include/footer.php')
?>