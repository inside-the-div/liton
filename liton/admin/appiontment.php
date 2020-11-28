<?php 
 

  include('database/database.php');
  include('session/session.php');
  include('handler/handler.php');

  if(!$session->get('login')){
    header('Location: index.php');
  }
  
  $appiontments = $database->select_all()->from('appointment')->order_by('done asc')->get();
  $message = "";
  if(isset($_POST['make_done'])){
    $id = $_POST['id'];
    $value = [
      'done' => '1'
    ];
    $done = $database->update('appointment')->set($value)->where('id = '.$id)->get();
    if($done){
      $message .= $handler->success('Appointment Update success!');
    }else{
      $message .= $handler->error('something wrong!','danger');
    }

  }

  if(isset($_POST['make_not_done'])){
    $id = $_POST['id'];
    $value = [
      'done' => '0'
    ];
    $done = $database->update('appointment')->set($value)->where('id = '.$id)->get();
    if($done){
      $message .= $handler->success('Appointment Update success!');
    }else{
      $message .= $handler->error('something wrong!','danger');
    }
     
  }

  if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $delete = $database->delete('appointment')->where('id = '.$id)->get();
    if($delete){
      $message .= $handler->success('Appointment delete success!');
    }else{
      $message .= $handler->error('something wrong!','danger');
    }
  }

?>


<?php include('include/header.php'); ?>

  <div class="content-wrapper">
    <div class="container-fluid">

    	<div class="row mb-3">
        <div class="col-12">
          <h1 class="d-inline font-25 font-josefin mr-3 d-inline">All appiontments</h1>
          

          <?php 

              if($message != ''){
                echo $message;
              }

          ?>
        </div>  
      </div>



      <div class="row">
        <div class="col-12 ">
            
            
            <?php 

              if(mysqli_num_rows($appiontments)>0){
            ?>
            
              <table class="table table-dark table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    
                    <th scope="col">Phone</th>
                    
                    <th scope="col">Address</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                      $i = 0;
                      while ($appiontment = mysqli_fetch_array($appiontments)) {
                        $i++;
                  ?>
                      
                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $appiontment['name']?></td>
                        <td><?php echo $appiontment['phone']?></td>
                       
                        <td>
                          <?php echo substr($appiontment['address'],0,10) ?>
                        </td>

                        <td>
                          <?php echo $appiontment['doctor']?>
                        </td>
                    

                        <td>
                          <form action="appiontment.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $appiontment['id']; ?>">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger ">
                          </form>

                          <form action="appiontment.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $appiontment['id']; ?>">

                            <?php 
                              if($appiontment['done']){
                                echo '<input type="submit" name="make_not_done" value="Make Not Done" class="btn btn-success">';
                              }else{
                                echo '<input type="submit" name="make_done" value="Make Done" class="btn btn-info">';
                              }

                            ?>
                            
                          </form>
                          
                          <a href="view-appiontment.php?id=<?php echo $appiontment['id']; ?>" class="btn btn-success ">Details</a>
                          
                        </td>
                      </tr>


                  <?php
                      }

                  ?>



                </tbody>
              </table>



            <?php
              }else{
                echo $handler->error('not appiontment found!!','danger');
              }

            ?>



        </div>  
      </div>
	  </div>
	  <!-- /.container-fluid-->
  </div>
    <!-- /.container-wrapper-->
<?php include('include/footer.php') ?>
