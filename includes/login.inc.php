<?php
if (isset($_POST['login-submit'])) {
  require 'db_connection.php';
  $id = $_POST['id'];
  $password = $_POST['pwd'];

  if (empty($id) || empty($password)) {
    header("Location: ../login.php?error=emptyfield");
    exit();
  }

  $sql = "SELECT id, name, pwd FROM Teacher WHERE id=?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?error=sqlerror");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $CheckPwd = password_verify($password, $row["pwd"]);
    if ($CheckPwd == false) {
      header("location:../index.php?error=wrongpwd");
      exit();
    } else if ($CheckPwd == true) {
      session_start();
      $_SESSION["userid"] = $row["id"];
      $_SESSION["username"] = $row["name"];
      $_SESSION['authorized'] = TRUE;
      header("location: ../mainpage.php?loginsuccess");
      exit();
    }
  } else {
    header("location: ../login.php?error=nouser");
    exit();
  }
  mysqli_stmt_close($stmt);
  mysqli_free_result($result);
  //mysqli_close($conn);
}
?>
		
	
      



	