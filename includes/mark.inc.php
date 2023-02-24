<?php
session_start();
if(isset($_POST['marking']))
{
  require_once 'db_connection.php';
  $ClassID=$_POST['ClassID'];
  $StuID=$_POST['StuID'];
  $mark=$_POST['mark'];
  if(empty($mark))
  {
    $_SESSION['error']="Hãy nhập điểm";
    header("Location: ../mark.php?Stuid=".$StuID."&Classid=".$ClassID);
    exit();
  }
  if($mark>10.00 || $mark<0.00)
  {
    $_SESSION['error']="Invalid score";
    header("Location: ../mark.php?Stuid=".$StuID."&Classid=".$ClassID);
    exit();
  }
  $sql="UPDATE student_class SET mark = ".$mark." WHERE id_student=".$StuID." AND id_class=".$ClassID;
  $result=mysqli_query($conn, $sql);
  mysqli_close($conn);
  $_SESSION['success']="Cập nhật điểm thành công";
    header("Location: ../view.php?Stuid=".$StuID."&Classid=".$ClassID."&success");
    exit();
}
?>