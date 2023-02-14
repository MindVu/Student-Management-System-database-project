<?php
if(isset($_POST['class_search']))
{
  require 'db_connection.php';
  session_start();
  $id=$_POST['id_class'];
  if(empty($id))
  {
    $sql = "SELECT * FROM class WHERE id_teacher = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      $_SESSION['error']='SQL error';
      header("Location: ../classlist.php?error=sqlerror");
      exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['userid']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $_SESSION['classlistresult'] = $result;
    header("Location: ../classlist.php?");
    exit();
  }
  mysqli_stmt_close($stmt);
  mysqli_free_result($result);
  mysqli_close($conn);
}
?>