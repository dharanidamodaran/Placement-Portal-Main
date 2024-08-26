<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$branch = mysqli_real_escape_string($conn, $_POST['branch']);
	$skills = mysqli_real_escape_string($conn, $_POST['skills']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);

	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
	$minsalary = mysqli_real_escape_string($conn, $_POST['minsalary']);
	$maxsalary = mysqli_real_escape_string($conn, $_POST['maxsalary']);

	$cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);


		$sql = "INSERT INTO job_post(jobtitle, branch, description, minimumsalary, maximumsalary, skills, qualification, cgpa, designation, website) VALUES ('$companyname', '$branch', '$description', '$minsalary', '$maxsalary', '$skills', '$qualification', '$cgpa', '$designation', '$website')";

		if($conn->query($sql)===TRUE) {

			//If data inserted successfully then Set some session variables for easy reference and redirect to company login
			$_SESSION['registerCompleted'] = true;
			header("Location: add-companies.php");
			exit();

		} else {
			//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	

	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: add-companies.php");
	exit();
}