<?php 
 
  include('database/database.php');
  include('session/session.php');
  include('handler/handler.php');
  if(!$session->get('login')){
    header('Location: index.php');
  }
  $docotrs = $database->select_all()->from('doctor')->order_by('id desc')->get();

  $message = "";
  if(isset($_POST['delete'])){

    $id = $_POST['id'];
    
    $doctor = [
      'id' => $id
    ];
    $error = $handler->empty($doctor);
    if($error == ''){

      $delete = $database->delete('doctor')->where('id = '.$id)->get();

      if($delete){
        $message .= $handler->success('Delete success !');

      }else{
        $message .= $handler->error('somthing wrong','danger');
      }
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
          <h1 class="d-inline font-25 font-josefin mr-3">All doctors</h1>
          <a href="add-doctor.php" class="btn_1">Add new doctor</a>

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

              if(mysqli_num_rows($docotrs)>0){
            ?>
            
              <table class="table table-dark table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    
                    <th scope="col">Phone</th>
                    
                    <th scope="col">view</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                      $i = 0;
                      while ($doctor = mysqli_fetch_array($docotrs)) {
                        $i++;
                  ?>
                      
                      <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $doctor['name']?></td>
                        <td><?php echo $doctor['phone']?></td>
                       
                        <td>
                          <a href="view-doctor.php?id=<?php echo $doctor['id'];?>" class="btn btn-info">view</a>
                        </td>
                        <td>
                          <a href="edit-doctor.php?id=<?php echo $doctor['id'];?>" class="btn btn-primary">Edit</a>
                        </td>

                        <td>
                          <form action="all-doctor.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                          </form>
                          
                        </td>
                      </tr>


                  <?php
                      }

                  ?>



                </tbody>
              </table>



            <?php
              }else{
                echo $handler->error('not doctor found!!','danger');
              }

            ?>



        </div>  
      </div>

    </div>
    <!-- /.container-fluid-->
  </div>
<?php 
  include('include/footer.php')
?>