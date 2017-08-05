<?php

include_once('../../globals/database.php');

if(isset($_POST['action'])) {
    
	$loginClass = new loginphp();

	if($_POST['action'] == "doLogin"){
		$loginClass->doLogin($_POST['data']);
	}

	if($_POST['action'] == "isLogin"){
		$loginClass->isLogin($_POST['data']);
	}


	
	
	
	
}



class loginphp{

	public function isLogin($data){

		global $db;
		session_start();		
		$return = array();
    	
		$username = $_SESSION['login_user'];
		$sql  = sprintf("SELECT username FROM login WHERE username ='%s' LIMIT 1", $username);
		
		$result = $db->query($sql);
		$arr = $db->fetch_array($result);
		
		$count = $db->num_rows($result);

		if($count == 1) {
			
			$_SESSION['login_user'] = $username;
			
			$return = array(
				'success' => true,
				'message' => $username . " Already Logged In"	
			);
		}else {

			$return = array(
				'success' => false,
				'message' => "Your Login Session is invalid"	
			);
			
		}


		
			
		echo json_encode($return);
	}
	

	public function doLogin($data){

		global $db;
		session_start();
		$params = array();
		$return = array();
    	parse_str($data, $params);

		$username = $params['username'];
		$password = $params['password'];

		$sql  = sprintf("SELECT username,password FROM login WHERE username ='%s' AND password='%s' LIMIT 1", $username, $password);
		
		$result = $db->query($sql);
		$arr = $db->fetch_array($result);
		
		$count = $db->num_rows($result);

		if($count == 1) {
			
			$_SESSION['login_user'] = $username;

			$return = array(
				'success' => true,
				'message' => "Login Successful"	
			);
		}else {

			$return = array(
				'success' => false,
				'message' => "Your Login Name or Password is invalid"	
			);
			
		}


		
			
		echo json_encode($return);
	}
		


	// 
	

	// $result = mysqli_query($conn,$sql);

	// $rows = mysqli_fetch_array($result);
		
	// 	if(mysqli_num_rows($result)>0 ){
			
	// 		print_r($rows);
				
	// 	}
		//if(strcmp($row['password'],$password)==0)
		
 //echo "login successful";
 //else
 //echo "login failed";

}


		
 ?>