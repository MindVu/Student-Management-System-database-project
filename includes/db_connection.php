<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "dtb_project";


  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if(!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

 
   
?>