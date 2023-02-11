<?php
session_start();
if(isset($_POST['changename-submit']))
{
  require 'db_connection.php';
  $NewName=$_POST['NewName'];
  if(empty($NewName))
  {
    $_SESSION['error']='Please fill in the field';
    header("Location: ../changename.php?error=emptyfield");
    exit();
  }
  $sql = "UPDATE Teacher SET name = ? WHERE id = ? ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      $_SESSION['error']='SQL error';
      header("Location: ../changename.php?error=sqlerror");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $NewName, $_SESSION["userid"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    $_SESSION['username']=$NewName;
    $_SESSION['success']='Name changed';
    header("location: ../changename.php?name-changed");
    exit();
}
?>