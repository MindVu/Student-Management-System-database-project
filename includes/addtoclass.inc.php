<?php
session_start();
if(isset($_POST['addtoclass-submit']))
{
  require_once 'db_connection.php';
  $ClassID=$_POST['ClassID'];
  $StuID=$_POST['StuID'];
  $sql="SET FOREIGN_KEY_CHECKS=0;";
  $result=mysqli_query($conn, $sql);
  if (empty($StuID)) {
		$_SESSION['error']="Bạn chưa điền mã sinh viên";
		header("Location: ../addtoclass.php?error=emptyfield");
		exit();
	}
  $sql="SELECT * FROM student WHERE id=".$StuID;
  $result=mysqli_query($conn, $sql);
  if($row=mysqli_fetch_assoc($result)) {
    $query="INSERT INTO student_class (id_student, id_class) values (?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
      $_SESSION['error']='SQL error';
      header("Location: ../addtoclass.php?error=sqlerror");
      exit();
    }
      mysqli_stmt_bind_param($stmt, "ii",$StuID,$ClassID);
      mysqli_stmt_execute($stmt);
      $_SESSION['success']='Sign up successfully';
      header("location: ../addtoclass.php?success");
      exit();
  }
  else
  {
    $_SESSION['error']="Mã sinh viên không tồn tại";
    header("Location: ../addtoclass.php?error=NoID");
		exit();
  }
  $sql="SET FOREIGN_KEY_CHECKS=1;";
  $result=mysqli_query($conn, $sql);
  mysqli_close($conn);
}