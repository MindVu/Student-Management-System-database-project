<?php
if (isset($_POST['signup-submit'])) {
  require 'db_connection.php';
  session_start();
  $name = $_POST['name'];
  $id = $_POST['id'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwdrp'];

  if (empty($name) || empty($id) || empty($password) || empty($passwordRepeat)) {
    $_SESSION['error']='Please fill in all fields';
    header("Location: ../signup.php?error=emptyfield&uid=" . $name . "&id=" . $id);
    exit();
  }  elseif ($password !== $passwordRepeat) {
    $_SESSION['error']='Password confirm unmatched';
    header("Location: ../signup.php?error=passwordcheck&name=" . $name . "&id=" . $id);
    exit();
  } else {
    $sql = "SELECT id FROM Teacher
    WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      $_SESSION['error']='SQL error';
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        $_SESSION['error']='This ID has been used';
        header("Location: ../signup.php?error=thisidhasalreadybeenused&name=" . $name);
        exit();
      } else {
        $sql = "INSERT INTO Teacher (id, name, pwd) VALUES(?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          $_SESSION['error']='SQL error';
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
          mysqli_stmt_bind_param($stmt, "iss", $id, $name, $hashedPwd);
          mysqli_stmt_execute($stmt);
          $_SESSION['success']='Sign up successfully';
          header("Location: ../index.php?singup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../signup.php?");
  exit();
}
?>