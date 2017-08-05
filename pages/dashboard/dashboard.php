<?php

include_once('../../globals/database.php');

if(isset($_POST['action'])) {
    
	if($_POST['action'] == "doLogin"){
		$loginClass = new loginphp();
		$loginClass->doLogin($_POST['data']);
	}
	
	
	
	
}



class loginphp{

	

	public function doLogin($data){

		session_start();

		$params = array();
		$return = array();
    	parse_str($data, $params);

		$username = $params['username'];
		$password = $params['password'];

		$sql  = sprintf("SELECT username,password FROM login WHERE username ='%s' AND password='%s' LIMIT 1", $username, $password);
		global $db;
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