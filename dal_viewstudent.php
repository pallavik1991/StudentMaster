<?php 

	 
	 	include_once 'database.php';
		include_once 'studentmaster.php';
		
		$database = new Database();
		$db = $database->getConnection();

		$student = new Student($db);
		$result=$student->readAll();

		echo json_encode($result);

	?>
	 