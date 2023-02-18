<?php
//bắt đầu session & lấy dữ liệu
session_start();
if (isset($_POST['addstudent-submit'])) {
	require 'db_connection.php';
	$StudentName = $_POST['StudentName'];
	$StudentGender = $_POST['StudentGender'];
	$StudentDob = $_POST['StudentDob'];
	$StudentPhone = $_POST['StudentPhone'];

	//check trường bỏ trống
	if (empty($StudentName) || empty($StudentGender) || empty($StudentDob) || empty($StudentPhone)) {
		$_SESSION['error']="Please fill in all fields";
		header("Location: ../addstudent.php?error=emptyfield");
		exit();
	}

	//bắt đầu thêm học sinh 
	$sql = "Insert into Student (name,gender,dob,phone) values (?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location: ../addstudent.php?error=sqlerror");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssss", $StudentName, $StudentGender, $StudentDob, $StudentPhone);
      mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	$_SESSION['success']="New Student created";
	header("location: ../addstudent.php?success");
	exit();
} else {
	header("Location: ../addStudent.php?");
	exit();
}
		
	
      



	