<?php

 		include('database.php');
		
		//$db = new database();
	//	$conn = $db->get_database_connection();
		
			$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "inventory";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		switch($_REQUEST['decision']) {

    case 'submit': 
               
			   $sql = "INSERT INTO recieved (part_no, item_name, a_u, quantity, rate, po, crv,date_time,unit ) values ('$_POST[part_no]','$_POST[item_name]','$_POST[a_u]','$_POST[quantity]','$_POST[rate]','$_POST[po]','$_POST[crv]','$_POST[date_time]','$_POST[unit]')";

if (!mysqli_query($conn,$sql))
{die('Error: ' . mysql_error());

}
else
echo "1 record added";
			    break;

    case 'view': 
			$sql = " select * from recieved where date_time = (select max(date_time) from recieved)";
		
				if (!mysqli_query($conn,$sql)){
					die('Error: ' . mysqli_error());
					}
					else{
						$result = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		
						  print_r($row);
								}
					
								}
						break;

    case 'delete': 
	
	$sql = " select * from recieved where date_time = (select max(date_time) from recieved)";
	$sql1 = " select * from recieved";
	if (! mysqli_query($conn,$sql)){
	die('Error: ' . mysql_error());
	//echo "error";
	}
		else{
				$result = mysqli_query($conn,$sql);
				echo "row deleted";
				$result1 = mysqli_query($conn,$sql1);
				while($row = mysqli_fetch_array($result1, MYSQL_ASSOC)) {

     print_r($row);
}
}
                        break;

    case 'update':
                    break;
}


		

?>