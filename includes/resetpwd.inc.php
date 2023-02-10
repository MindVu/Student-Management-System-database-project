<?php
if (isset($_POST['resetpwd-submit'])) {
	require 'db_connection.php';
	$id = $_POST['id'];

	if(empty($id))
	{
		header("Location: ../resetpwd.php?error=emptyfield");
		exit();
	}

	$sql = "UPDATE Teacher SET pwd = ? WHERE id = ? ";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../resetpwd.php?error=sqlerror");
    exit();
  }
	$hashedOne = password_hash("1111", PASSWORD_DEFAULT, ['cost' => 15]);
	mysqli_stmt_bind_param($stmt, "ss", $hashedOne, $id);
  mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
    mysqli_close($conn);
		header("location: ../index.php?password-reset-successfully");
    exit();
}
else {
  header("Location: ../resetpwd.php?");
  exit();
}
?>