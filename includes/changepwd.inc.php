<?php
//bắt đầu session & lấy dữ liệu
session_start();
if (isset($_POST['changepwd-submit'])) {
  require 'db_connection.php';
  $OldPwd = $_POST['OldPwd'];
  $NewPwd = $_POST['NewPwd'];
  $RptNewPwd = $_POST['RptNewPwd'];

  //check trường bỏ trống
  if (empty($OldPwd) || empty($NewPwd) || empty($RptNewPwd)) {
    $_SESSION['error']='Please fill in all fields';
    header("Location: ../changepwd.php?error=emptyfield");
    exit();
  }
  //check pass lặp lại giống nhau
  if ($NewPwd !== $RptNewPwd) {
    $_SESSION['error']='Confirm password unmatched';
    header("Location: ../changepwd.php?error=wrongrepeat");
    exit();
  }

  //check pass cũ đúng ko	
  $sql = "SELECT id, name, pwd FROM Teacher WHERE id=?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    $_SESSION['error']='SQL error';
    header("Location: ../changepwd.php?error=sqlerror");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $_SESSION["userid"]);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($result)) {
    $checkPwd = password_verify($OldPwd, $row["pwd"]);
    if ($checkPwd == false) {
      $_SESSION['error']='Wrong password';
      header("location:../changepwd.php?error=wrongpwd");
      exit();
    }

    //bắt đầu thay đổi mật khẩu
    $sql = "UPDATE Teacher SET pwd = ? WHERE id = ? ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      $_SESSION['error']='SQL error';
      header("Location: ../changepwd.php?error=sqlerror");
      exit();
    }
    $hashedNewPwd = password_hash($NewPwd, PASSWORD_DEFAULT, ['cost' => 15]);
    mysqli_stmt_bind_param($stmt, "ss", $hashedNewPwd, $_SESSION["userid"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    $_SESSION['success']='Password changed';
    header("location: ../changepwd.php?password-changed");
    exit();
  }
} else {
  $_SESSION['error']='Unknown error';
  header("Location: ../changepwd.php?");
  exit();
}