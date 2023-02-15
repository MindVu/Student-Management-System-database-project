<?php
//bắt đầu session & lấy dữ liệu
session_start();
if (isset($_POST['addclass-submit'])) {
	require 'db_connection.php';
	$ClassName = $_POST['ClassName'];
	$ClassDay = $_POST['ClassDay'];
	$ClassCredit = $_POST['ClassCredit'];
	$ClassStart = $_POST['ClassStart'];
	$ClassEnd = $_POST['ClassEnd'];

	//check trường bỏ trống
	if (empty($ClassName) || empty($ClassCredit) || empty($ClassDay) || empty($ClassStart) || empty($ClassEnd)) {
		$_SESSION['error']="Please fill in all fields";
		header("Location: ../addclass.php?error=emptyfield");
		exit();
	}
	
	//check giờ bắt đầu ở trước giờ kết thúc
	if ($ClassStart >= $ClassEnd) {
		$_SESSION['error']="Start time must be smaller than end time";
		header("Location: ../addclass.php?error=wrongtime");
		exit();
	}

	//bắt đầu thêm lớp 
	$sql = "Insert into Class (name,day,id_teacher,credit,start_time,end_time) values (?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location: ../addclass.php?error=sqlerror");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sssiii", $ClassName, $ClassDay, $_SESSION["userid"], $ClassCredit, $ClassStart, $ClassEnd);
      mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	$_SESSION['success']="New class created";
	header("location: ../addclass.php?success");
	exit();
} else {
	header("Location: ../addclass.php?");
	exit();
}
		
	
      



	