<?php
session_start();
if(isset($_GET['id']) && !empty(trim($_GET['id'])))
{
  require_once 'includes/db_connection.php';
  $ClassID=trim($_GET['id']);
  $sql="DELETE FROM class WHERE id = " . $ClassID ."";
  $result=mysqli_query($conn, $sql);
  $sql="DELETE FROM student_class WHERE id_class = " . $ClassID ."";
  $result=mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("Location: ../PHP/classlist.php?success");
  exit();
}else
{
  echo "<h1>Something wrong bro...</h1>";
}
?>