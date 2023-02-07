<?php
if (isset($_POST['signup-submit'])) {
  require 'db_connection.php';

  $name = $_POST['name'];
  $id = $_POST['id'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwdrp'];

  if (empty($name) || empty($id) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfield&uid=" . $name . "&id=" . $id);
    exit();
  } elseif (!preg_match("/^[a-zA-Z]*$/", $name)) {
    header("Location: ../signup.php?error=invalidname&id=" . $id);
    exit();
  } elseif ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&name=" . $name . "&id=" . $id);
    exit();
  } else {
    $sql = "SELECT id FROM Teacher
    WHERE id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=thisidhasalreadybeenused&name=" . $name);
        exit();
      } else {
        $sql = "INSERT INTO Teacher (id, name, pwd) VALUES(?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sss", $id, $name, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?singup=success");
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