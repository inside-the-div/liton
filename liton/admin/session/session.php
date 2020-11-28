<?php 

	class session{

		// start session when create an object
		function __construct(){
			session_start();
		}

		// set session 
		public function set($key,$value){
			$_SESSION[$key] = $value;
		}

		// get session 
		public function get($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}else{
				return false;
			}
		}

		// check login 
		public function login($page){
			if(!isset($_SESSION['login']) || $_SESSION['login'] !== true){
				header('Location: '.$page);
			}
		}

		// logout 

		public function logout($page){
			session_destroy();
			header('Location: '.$page);
		}

		// check user type 

		public function not_user($type,$page){
			if($_SESSION['user_type'] !== $type){
				header('Location: '.$page);
			}
		}
	}

	$session = new session;



?>