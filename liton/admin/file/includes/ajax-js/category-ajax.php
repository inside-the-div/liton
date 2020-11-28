<script>
	$(document).ready(function(){
		// add category 
		$("#category_add_btn").click(function(){
			var category_name = $("#category_add_field").val();

			if(category_name != ''){
				// add category

				var add_category = 1;
				$.ajax({
					url: 'includes/file/category.php',
					type: 'POST',
					data: {category_name:category_name,add_category:add_category},
					success:function(data){
						$("#category_add_message").html(data);
						// location.reload();
						// $( "#dataTable" ).load(window.location.href + " #dataTable" );
					}
				});
			}else{
				
				$("#category_add_message").html(handler.error("Please Enter Category name !",'danger'));
			}

			
		})

		// delete category 

		$(".category_delete_btn").click(function(){
			var this_id = $(this).data('id');
			console.log("ok");
			if(this_id != undefined || $this_id !=''){
				
				var confirm_variable = confirm('Are you sure want to delete ?');
				if(confirm_variable){
					
					var delete_category = 1;
					// ajax call
					$.ajax({  
					  url:"includes/file/category.php",  
					  method:"POST",  
					  data:{id:this_id,delete_category:delete_category},  
					  success:function(data){
					    $("#category_message").html(data);
					    // $( "#dataTable" ).load(window.location.href + " #dataTable" );
					  }  
					}) 

				}else{
					alert("Your data is safe !");
				}
			}else{
				alert("data id not found !");
			}
		})

		// category edit 


		$(".category_edit_btn").click(function(){

			var this_id = $(this).data('id');
			var category_name = $(this).data('category');

			console.log(category_name)
			// set to modal

			$("#update_category_add_field").val(category_name);
			$("#update_category_id").val(this_id);

		})

		// category update 


		$("#category_update_btn").click(function(){

			// take data form modal
			var category_name = $("#update_category_add_field").val();
			var  this_id = $("#update_category_id").val();
				
			var update_category = 1;
			// ajax call
			$.ajax({  
			  url:"includes/file/category.php",  
			  method:"POST",  
			  data:{id:this_id,category_name:category_name,update_category:update_category},  
			  success:function(data){
			    $("#category_update_message").html(data);
			  }  
			}) 


		})






	})
</script>