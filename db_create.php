<?php
$sql = "CREATE DATABASE dtb_project";
if($conn->query($sql)===TRUE)
{
  echo "Database created successfully";
}else
{
  echo "Error creating database: " . $conn->error;
}
$conn->close();
?>