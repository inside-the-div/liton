<script>
	$(document).ready(function(){
		// add menu 
		$("#menu_add_btn").click(function(){
			var menu_name = $("#menu_add_field").val();

			if(menu_name != ''){
				// add menu

				var add_menu = 1;
				$.ajax({
					url: 'includes/file/menu.php',
					type: 'POST',
					data: {menu_name:menu_name,add_menu:add_menu},
					success:function(data){
						$("#menu_add_message").html(data);
						// location.reload();
						// $( "#dataTable" ).load(window.location.href + " #dataTable" );
					}
				});
			}else{
				
				$("#menu_add_message").html(handler.error("Please Enter menu name !",'danger'));
			}

			
		})

		// delete menu 

		$(".menu_delete_btn").click(function(){
			var this_id = $(this).data('id');
			console.log("ok");
			if(this_id != undefined || $this_id !=''){
				
				var confirm_variable = confirm('Are you sure want to delete ?');
				if(confirm_variable){
					
					var delete_menu = 1;
					// ajax call
					$.ajax({  
					  url:"includes/file/menu.php",  
					  method:"POST",  
					  data:{id:this_id,delete_menu:delete_menu},  
					  success:function(data){
					    $("#menu_message").html(data);
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

		// menu edit 


		$(".menu_edit_btn").click(function(){

			var this_id = $(this).data('id');
			var menu_name = $(this).data('menu');

			console.log(menu_name)
			// set to modal

			$("#update_menu_add_field").val(menu_name);
			$("#update_menu_id").val(this_id);

		})

		// menu update 


		$("#menu_update_btn").click(function(){

			// take data form modal
			var menu_name = $("#update_menu_add_field").val();
			var  this_id = $("#update_menu_id").val();
				
			var update_menu = 1;
			// ajax call
			$.ajax({  
			  url:"includes/file/menu.php",  
			  method:"POST",  
			  data:{id:this_id,menu_name:menu_name,update_menu:update_menu},  
			  success:function(data){
			    $("#menu_update_message").html(data);
			  }  
			}) 


		})






	})
</script>