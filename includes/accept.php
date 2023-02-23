<?php
session_start();
if(isset($_GET['classid']) && !empty(trim($_GET['classid'])) && isset($_GET['idold']) && !empty(trim($_GET['idold'])) && isset($_GET['idnew']) && !empty(trim($_GET['idnew'])))
{
  require_once 'db_connection.php';
  $ClassID=trim($_GET['classid']);
  $IDold=trim($_GET['idold']);
  $IDnew=trim($_GET['idnew']);
  $sql="UPDATE class SET id_teacher=".$IDnew." WHERE id=".$ClassID;
  $result=mysqli_query($conn, $sql);
  $sql="DELETE FROM request WHERE id_class=".$ClassID;
  $result=mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("Location: ../request.php?success");
  exit();
}
?>