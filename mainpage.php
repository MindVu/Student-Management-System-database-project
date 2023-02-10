<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Trang chủ</title>
</head>
<body>
<?php
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === TRUE) {
  echo "Hello " . $_SESSION['username'].", Wanna buy some weed?<br>";
} else {
  // User is not authorized!
  header('Location: login.php');
  exit();
}
?>
<a href="changepwd.php">Change Password</a>
<a href="includes/logout.php">Log Out</a>
</body>
</html>