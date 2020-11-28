    <script>
    	$(document).ready(function(){

		      $('#editor').summernote({

                toolbar: [
                  ['style', ['style']],
                  ['font', ['bold', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table']],
                  ['view', ['fullscreen', 'codeview', 'help']],
                ],

				colors: [
                        ['red', 'green', 'blue','#ffff75'], //first line of colors
                        ['#c4b540', '#1dd381', '#ba1cd2'] //second line of colors
                    ],
		        height: 500,

		      });


    		// video link to iframe 

    		$("#video_link").blur(function(){
    			var link = $(this).val();
    			$("#show_video").html('<iframe width="100%" src="https://www.youtube.com/embed/'+link+'"></iframe>');
    		})
    		// end video link to iframe 


    		$("#upload_post").click(function(){
    			// crteate form object data 
    			var post = new FormData();
                var store_post = 1;

    			var post_title = $("#title").val();
    			var post_slug = $("#slug").val();
    			var post_body = $('#editor').summernote('code');
    			var excerpt = $("#excerpt").val();
    			
    			var video_link = $("#video_link").val();
    			var tag = $("#tag").val();
    			var privacy = $("#privacy").val();
    			var source_code = $("#source_code").val();

    			var categorys = $("#category").val();
    			// make category list form multiple select 
    			var category_list = '';
    			for(var i = 0; i<categorys.length;i++){
    				if(i!= (categorys.length-1)){
    					category_list +=categorys[i]+',';
    				}else{
    					category_list +=categorys[i];
    				}
    			}
    			// adden all data 

    			post.append('store_post',store_post);
                post.append('title',post_title);
    			post.append('slug',post_slug);
    			post.append('body',post_body);
    			post.append('excerpt',excerpt);
    			post.append('video_link',video_link);
    			post.append('tag',tag);
    			post.append('privacy',privacy);
    			post.append('source_code',source_code);
    			post.append('category_list',category_list);
    			
    			// console.log(featured_image);
    			// $("#show_video").html(post_body);

                $.ajax({
                    data:post,
                    type:'POST',
                    url:'includes/file/post.php',
                    cache:false,
                    contentType:false,
                    processData:false,
                    success:function(data){
                        $("#post_message").html(data);
                        // console.log(url);
                    }
                })

    		})





            // excerpt

            $("#excerpt").keydown(function(){


                var val  = $(this).val().split(' ');
                if(val.length > 300){
                    alert("excerpt word limit over !");
                }


            })

    	})
    </script>