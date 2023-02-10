<?php
require 'db_connection.php';
$stmt = mysqli_stmt_init($conn);
function select_query($table, $column, $value)
{
  $res = "";
  $sql = "SELECT * FROM ? WHERE ? = ?";
  if (mysqli_stmt_prepare($stmt, $sql))
}
?>