<?php

 		include('database.php');
		
		$db = new database();
		$conn = $db->get_database_connection();
		
		
		//$username = mysql_real_escape_string ($_POST['username']);
		//$password = mysql_real_escape_string (md5($_POST['password']));
		
		$sql = "SELECT  user_name, password  FROM login WHERE user_name='admin2' AND password = 'admin'";
	

	$result = mysqli_query($conn,$sql);

	$rows = mysqli_fetch_array($result);
		
		if(mysqli_num_rows($result)>0 ){
			
			print_r($rows);
				
		}
		//if(strcmp($row['password'],$password)==0)
		
 //echo "login successful";
 //else
 //echo "login failed";
 ?>