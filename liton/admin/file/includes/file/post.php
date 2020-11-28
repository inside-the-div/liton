<?php 

	// database 
	include('../../database/database.php');
	// session
	include('../../session/session.php');
	// handler
	include('../../handler/handler.php');


	// ====================================================store post

	if(isset($_POST['store_post'])){
		$title = $_POST['title'];
		$slug = $_POST['slug'];
		$body = $_POST['body'];
		$excerpt = $_POST['excerpt'];
		$video_link = $_POST['video_link'];
		$tag = $_POST['tag'];
		$privacy = $_POST['privacy'];
		$source_code = $_POST['source_code'];
		$category_list = $_POST['category_list'];

		// title remove space 
		$title=trim($title); 

		// make slug nd featured img  seo friendly
		$slug = strtolower($slug);
		$slug=trim($slug); 
		$slug = str_replace(" ","-",$slug);


		// check this post arealdy existes

		$this_post = $database->select_all()->from('post')->where('slug = "'.$slug.'"')->get();
		$found_this_post = mysqli_num_rows($this_post);

		if($found_this_post > 0){
			echo  $handler->error('This post already existes !','danger');
		}else{
			$value = [

				'title' => $title,
				'slug' => $slug,
				'body' => $body,
				'excerpt' => $excerpt,
				'privacy' => $privacy,
				'tag' => $tag,
				'category_list' => $category_list
				
			];

			$eroor = $handler->empty($value);
			if($eroor == ''){

				$value['description'] = $excerpt;

				if($video_link != ''){
					$value['video_link'] = $video_link;
					$value['source_code'] = $source_code;
				}


				$row = $database->insert('post')->values($value)->get();
				if(is_string($row)){
					echo $handler->error($row,'danger');
				}else{
					echo $handler->success('Post Upload Success !!');
				}

			}else{
				echo  $handler->error($eroor,'danger');
			}
		}

		
	}

	//====================================================== delete post

	// ==================================== delete menu


	if(isset($_POST['delete_post'])){

		$id = $_POST['id'];

		

		$delete = $database->delete('post')->where('id = '.$id)->get();

		if($delete == 1){
			echo $handler->success('Post Delete Success !!');
		}else{
			echo $handler->error($delete,'warning');
		}
	}





	// ====================================================update_post

	if(isset($_POST['update_post'])){
		$id = $_POST['post_id'];
		$title = $_POST['title'];
		$slug = $_POST['slug'];
		$body = $_POST['body'];
		$excerpt = $_POST['excerpt'];

		$video_link = $_POST['video_link'];
		$tag = $_POST['tag'];
		$privacy = $_POST['privacy'];
		$source_code = $_POST['source_code'];

		$category_list = $_POST['category_list'];
		// title remove space 
		$title=trim($title); 

		// make slug nd featured img  seo friendly
		$slug = strtolower($slug);
		$slug=trim($slug); 
		$slug = str_replace(" ","-",$slug);



		$this_post = $database->select_all()->from('post')->where('slug = "'.$slug.'" and id !='.$id)->get();
		$found_this_post = mysqli_num_rows($this_post);

		if($found_this_post > 0){
			echo  $handler->error('This post already existes !','danger');
		}else{

			$value = [

				'title' => $title,
				'slug' => $slug,
				'body' => $body,
				'excerpt' => $excerpt,
				'privacy' => $privacy,
				'tag' => $tag,
				'category_list' => $category_list,
				'video_link' =>$video_link,
				'source_code' =>$source_code
				
			];

			
			$row = $database->update('post')->set($value)->where('id ='.$id)->get();
			if(is_string($row)){
				echo $handler->error($row,'danger');
			}else{
				echo $handler->success('Post Update Success !!');
			}
		}





		

}

?>