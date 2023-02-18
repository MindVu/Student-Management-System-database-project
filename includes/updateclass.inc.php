<?php
session_start();
if(isset($_POST['update_class']))
{
  require_once 'db_connection.php';
  $ClassID = $_POST['id'];
  $ClassName = $_POST['name'];
	$ClassDay = $_POST['day'];
	$ClassCredit = $_POST['credit'];
	$ClassStart = $_POST['start_time'];
	$ClassEnd = $_POST['end_time'];
  if (empty($ClassName) || empty($ClassCredit) || empty($ClassDay) || empty($ClassStart) || empty($ClassEnd)) {
		$_SESSION['error']="Please fill in all fields";
		header("Location: ../updateclass.php?error=emptyfield");
		exit();
	}
  if ($ClassStart >= $ClassEnd) {
		$_SESSION['error']="Start time must be smaller than end time";
		header("Location: ../updateclass.php?error=wrongtime");
		exit();
	}
  $sql="UPDATE class SET name=?, day=?, credit=?, start_time=?, end_time=? WHERE id=". $ClassID;
  $stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location: ../addclass.php?error=sqlerror");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ssiii", $ClassName, $ClassDay, $ClassCredit, $ClassStart, $ClassEnd);
      mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	$_SESSION['success']="Class updated";
	header("location: ../classlist.php?success");
	exit();
} 

?>