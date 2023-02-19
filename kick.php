<?php
session_start();
if(isset($_GET['id']) && !empty(trim($_GET['id'])))
{
  require_once 'includes/db_connection.php';
  $StuID=trim($_GET['id']);
  $sql="DELETE FROM student_class WHERE id_student = " . $StuID ."
  AND id_class=".$_SESSION['classid']."";
  $result=mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("Location: ../PHP/viewclass.php?id=".$_SESSION['classid']."");
  exit();
}else
{
  echo "<h1>Something wrong bro...</h1>";
}
?>