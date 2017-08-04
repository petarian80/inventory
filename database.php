<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['action'])) {
    
	if($_POST['action'] == "check_database"){
		$db = new database();
		$db->check_database();
	}
	
	
	
	
}

class database {
            // start of class database
	
	const DBNAME = "InventoryManagement";
	protected $connection;
	protected $con;
	
	public function check_database(){
		
		$conn = $this->create_connection();
		if($conn){
			$return1 = $this->create_database();
			echo json_encode($return1);
		}
		
			
	}
            
	public function create_connection(){
        

    	// start of function create_connection
       	

		$json = json_decode(file_get_contents("credentials/info.json"), true);

		$servername = $json[0]["localhost"];
		$username = $json[0]["username"];
		$password = $json[0]["password"];





		// Create connection		
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}else{
			$this->connection = $conn;
			return $conn;
				
		}                 
                // end of function create_connection
 	}
	
	public function get_database_connection(){
                
    	// start of function create_connection
       	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "inventory";

		$json = json_decode(file_get_contents("credentials/info.json"), true);

		$servername = $json[0]["localhost"];
		$username = $json[0]["username"];
		$password = $json[0]["password"];
		$dbname = $json[0]["database"];

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}else{
			$this->connection = $conn;
			return $conn;
				
		}                 
                // end of function create_connection
 	}
	
    public function create_database(){
  		
		$return_attendance = array();

		// Create database
		$sql = "create database inventory";
		$conn = $this->connection;
		
		if ($conn->query($sql) === TRUE) {
			$message = "Database created successfully";
			
			
			
			$return_tables = $this->create_tables();
	
				} else {
			
			$message = "Error creating database: " . $conn->error;
			$return_tables = array(
				'error' => true,
				'message' => $message	
			);
			
			
			
		}
                
		return $return_tables;

		
	}
            
	    public function create_tables(){
    	
		// start of function create_attendance_table
        // start of function create_connection
       	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "inventory";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		$this->connection = $conn;
		// sql to create table
		$sql = "CREATE TABLE attendance(
		id INT(6) PRIMARY KEY, 
		first_name VARCHAR(30) NOT NULL,
		last_name VARCHAR(30) NOT NULL,
		rank VARCHAR(30) NOT NULL,
		time_date TIMESTAMP,
		status VARCHAR(30) 
		)";
		
		$sql1= " CREATE TABLE recieved(
		part_no INT(6) PRIMARY KEY, 
		item_name VARCHAR(30) NOT NULL,
		a_u VARCHAR(30) NOT NULL,
		quantity VARCHAR(30) NOT NULL,
		rate INT(6) NOT NULL,
		po VARCHAR(30) NOT NULL,
		crv VARCHAR(30) NOT NULL,
		date_time TIMESTAMP,
		unit VARCHAR(30) 

				)";

	
		 $sql2 = "CREATE TABLE issued (
		part_no INT(6) PRIMARY KEY, 
		a_u VARCHAR(30) NOT NULL,
		item_demanded VARCHAR(30) NOT NULL,
		item_issued VARCHAR(30) NOT NULL,
		to_fol VARCHAR(30) NOT NULL,
		unit VARCHAR(30) NOT NULL,
		issued_by VARCHAR(30) NOT NULL,
		time_date TIMESTAMP
		)";	
		 $sql3 = "CREATE TABLE item (
				part_no INT(6) PRIMARY KEY, 
				item_name VARCHAR(30) NOT NULL,
				quantity VARCHAR(30) NOT NULL
					)";

		$sql4 = "CREATE TABLE login (
				user_name VARCHAR(30) PRIMARY KEY , 
				password VARCHAR(30) NOT NULL
					)";

		
		$conn = $this->connection;
		if ($conn->query($sql1) === TRUE) 
			if($conn->query($sql) === true)
			if($conn->query($sql2)=== true)
			if($conn->query($sql3)=== true)
			if($conn->query($sql4)===true){
			{{{{
		
		$message = "tables created: ";
			$return_attendance = array(
				'error' => false,
				'message' => $message	
			);
			
	}}}} }
		 else {
			
			$message = "tables not created: ";
			$return_attendance = array(
				'error' => false,
				'message' => $message	
			);
			
		
		
					}

        
        return $return_tables;
       
        // end of function create_attendance_table
	}


  		
            public function entre_data_attendance(){
                // start of function enter data into attendance table
                
             // Attempt insert query execution
$sql = "INSERT INTO attendance (id,first_name, last_name,rank,time_date,status)";

if ($conn->query($sql) === TRUE) {
    echo "data inserted successfully";
} else {
    echo "Error in entring data: " . $conn->error;
}    
                
                // end of function enter data into attendace table
            }
            public function enter_data_item_issued(){
             
                // start of enter data into item issued 
            
             // Attempt insert query execution
$sql = "INSERT INTO item_issued (part_no, a/u , item_demanded,item_issued, to_fol, unit, issued_by, time_date )";

if ($conn->query($sql) === TRUE) {
    echo "data inserted successfully";
} else {
    echo "Error in entring data: " . $conn->error;
}    
            // end of enter data into item issued
            }
            
            public function enter_data_item_recieved(){
                // start of enter data into item recieved
                
                // Attempt insert query execution
$sql = "INSERT INTO item_recieved(part_no, item_name, a/u, quantity, rate, po, crv, unit,date_time )";

if ($conn->query($sql) === TRUE) {
    echo "data inserted successfully";
} else {
    echo "Error in entring data: " . $conn->error;
}    
                
                // end enter data into item recieved
            }




            // end of class database
            
            }


 
 

     






?>
