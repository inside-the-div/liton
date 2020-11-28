<?php include('admin/database/database.php');?>



<?php include('include/header.php')?>
<?php include('include/header-top.php')?>
<?php include('include/nav.php')?>

	  

		<section class="ftco-section" id="doctor-section">
			<div class="container px-5">
        	    <div class="row mb-5 pb-2">
                  <div class=" text-center col-12">
                      <h2 class="mb-1">Our Qualified Doctors</h2>
                      <p>Always try to service our best .We Provide our best doctors</p>
                  </div>
                  
                </div>


        		<div class="row" id="all_post">

        		</div> 
                <!-- end row -->
			</div>
		</section>

<?php include('include/footer.php');?>

<script>
    $(document).ready(function(){


        showDoctor();

        function showDoctor(page){

        console.log("ok");
          $.ajax({  
            url:"include/doctor-pagination.php",  
            method:"POST",  
            data:{page:page},  
            success:function(data){  
              $('#all_post').html(data);
              //alert(data);
            }  
          })  
        }
        $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id"); 
           showDoctor(page);  
        });

        $(document).on('click', '.next-page', function(){  
             var page = $(this).attr("id");
             page++;
             showDoctor(page);  
        });
        $(document).on('click', '.previous-page', function(){  
             var page = $(this).attr("id");
             page--;
             showDoctor(page);  
        });


    })
</script>

<?php include('include/end-html.php');?>
            
          