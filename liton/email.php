<?php include('include/header.php')?>
<?php include('include/header-top.php')?>
<?php include('include/nav.php')?>


<?php 

	if(!isset($_POST['email_send'])){
		header('Location: index.php');
	}

	$name 		= $_POST['name'];
	$email 		= $_POST['email'];
	$subject 	= $_POST['subject'];
	$message 	= $_POST['message'];

?>


		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
			<section>
	    	<div class="container">
	    		<div class="row d-flex">
	    		<div class="alert alert-success">
	    			<h1>Thank you <?php echo $name;  ?>, We will contact with you soon.</h1>
	    			<p>Lorem ipsum dolor sit amet consectetur, adipisicing, elit. Consequuntur quisquam reiciendis veritatis error sapiente animi consequatur, aliquam nostrum, delectus facere eius a temporibus molestias obcaecati quas magni explicabo excepturi fuga? Ducimus, quidem asperiores dignissimos tempora obcaecati sequi dolores necessitatibus, repudiandae vitae suscipit tempore nesciunt eum reprehenderit accusantium, tenetur deleniti doloribus placeat delectus autem, esse possimus maxime! Culpa, necessitatibus iure, minima ex voluptatum perspiciatis placeat est eum! Modi corrupti quisquam eaque repellat maxime placeat repudiandae, exercitationem debitis reprehenderit doloribus sequi! Sed minus commodi corporis earum dolore provident iusto magni, natus, architecto libero, beatae. Eius minus voluptatum, omnis illo recusandae necessitatibus reiciendis.</p>
	    		</div>
	    			
	        	</div>
	    	</div>
	    </section>

	    <br>
	    <br>
	    <br>
	    <br>

<?php include('include/footer.php');?>
<?php include('include/end-html.php');?>
    
