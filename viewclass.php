<?php
if(isset($_GET['id']) && !empty(trim($_GET['id'])))
{
  require_once 'includes/db_connection.php';
  $sql="SELECT * FROM student s
  JOIN student_class sc ON sc.id_student=s.id
  WHERE sc.id_class=?";
  if($stmt=mysqli_prepare($conn, $sql))
  {
    mysqli_stmt_bind_param(stmt, "i", $param_id);
    $param_id = trim($_GET['id']);
    if(mysqli_stmt_execute($stmt))
    {
      $result = mysqli_stmt_get_result($stmt);
      if(mysqli_num_rows($result)==1)
      {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id=$row['id'];
        $name=$row['name'];
        $gender=$row['gender'];
        $dob=$row['dob'];
        $phone=$row['phone'];
      }else{
        header("location: ../classlist.php?error=invalidid");
        exit();
      }
    }else{
      echo "Oops! Something went wrong. Please try again later.";
    }
    
  }
}
?>