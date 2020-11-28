<?php 
// ================include file start=============== 
include('../admin/database/database.php');
include('../admin/handler/handler.php');
include('../admin/session/session.php');

// ================include file end=============== 


$record_per_page = 12;

$page = '';  
$output = '';


 if(isset($_POST["page"])){  
    $page = $_POST["page"];
 }else{  
    $page = 1;  
 } 


 $page_query = $database->select_all()->from('doctor')->order_by('id')->sort('desc')->get();

 $total_records = mysqli_num_rows($page_query);  
 $total_pages = ceil($total_records/$record_per_page);

 if($page>$total_pages){
  $page = 1;
 }
 if($page<1){
  $page = $total_pages;
 }
 if($total_pages == 0){
  $page = 1;
 }

 $start_from = ($page - 1)*$record_per_page;  

 $query = $database->select_all()->from('doctor')->order_by('id')->sort('desc')->limit($start_from,$record_per_page)->get();

 while($row = mysqli_fetch_array($query))  
 {    

      $output .= '
        
			<div class="col-md-6 col-lg-3 mb-4">
			    
			    <div class="card p-3">
					<img src="admin/assets/img/'.$row['image'].'" alt="" class="img-fluid" style="height:200px;">
					<h1 class="font-josefin" style="font-size:25px;">'.$row['name'].'</h1>
					<p class="font-josefin" style="font-size:14px;">'.substr($row['about'],0,20).'</p>
					<a href="appointment.php?id='.$row['id'].'" class="btn btn-info">Book Now</a>
			    </div>
			            
			</div>
      ';        
 } 


// echo $output;

 if($total_records > $record_per_page){

	$output .='<div class="col-sm-12 text-center my-4">';

	$output .= "<span class='previous-page ml-1 ' style='cursor:pointer; padding:5px 10px; border:1px solid #ccc;' id='".$page."'>Previous</span>";

	$page_loop = $total_pages;
	if($total_pages>5){
	  $page_loop = 5;
	}


	 for($i=1; $i<=$page_loop; $i++)  
	 {  
	      if($i==$page){
	      	$output .= "<span class='pagination_link ml-1 bg-info text-light' style='cursor:pointer; padding:5px 10px; border:1px solid #ccc;' id='".$i."'>".$i."</span>"; 
	      }else{
	      	$output .= "<span class='pagination_link ml-1 ' style='cursor:pointer; padding:5px 10px; border:1px solid #ccc;' id='".$i."'>".$i."</span>"; 
	      }
	 }

	 $output .= "<span class='next-page ml-1 ' style='cursor:pointer; padding:5px 10px; border:1px solid #ccc;' id='".$page."'>Next</span>";

	$output .="</div>";
}

if($total_records > 0){
	echo $output; 
}else{
	echo $handler->error('No post found !','danger');
}

?>