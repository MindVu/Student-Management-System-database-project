<?php
session_start();
if(isset($_POST['transfer']))
{
  require_once 'db_connection.php';
  $ClassID=$_POST['ClassID'];
  $IDold=$_POST['IDold'];
  $IDnew=$_POST['IDnew'];
  $sql="SELECT * FROM request WHERE id_class=".$ClassID;
  $result=mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)==0)
  {
    $query="INSERT INTO request (id_old, id_class, id_new) VALUES (".$IDold.", ".$ClassID.", ".$IDnew.")";
    $res=mysqli_query($conn, $query);
    mysqli_close($conn);
    header("Location: ../classlist.php?success");
    exit();
  }
  else
  {
    $_SESSION['error']="Lớp đang chờ duyệt";
    header("Location: ../transfer.php?id=".$ClassID."");
    exit();
  }
}
?>