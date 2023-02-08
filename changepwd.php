<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
</head>
<body>
	<h1>Change your password</h1>
	<form action="includes/changepwd.inc.php" method="post">
		<input type="password" name="OldPwd" placeholder="Old Password">
		<input type="password" name="NewPwd" placeholder="New Password">
		<input type="password" name="RptNewPwd" placeholder="Repeat New Password">
		<button type="submit" name="changepwd-submit">Submit</button>
	</form>
</body>