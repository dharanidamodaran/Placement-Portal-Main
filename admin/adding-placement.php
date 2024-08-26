<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$studentname = mysqli_real_escape_string($conn, $_POST['studentname']);
    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
	$salarypackage = mysqli_real_escape_string($conn, $_POST['salarypackage']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);

		$sql = "INSERT INTO alumni(name, rollno, company, salary, designation) VALUES ('$studentname', '$rollno', '$companyname', '$salarypackage', '$designation')";

		if($conn->query($sql)===TRUE) {

			//If data inserted successfully then Set some session variables for easy reference and redirect to company login
			$_SESSION['registerCompleted'] = true;
			header("Location: add-placement.php");
			exit();

		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: add-placement.php");
	exit();
}