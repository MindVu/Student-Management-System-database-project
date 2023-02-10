<?php

 $dbhost = "127.0.0.1";
 $dbuser = "root";
 $dbpass = "";
 $db = "dtb_project";


  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if(!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

 
   
?>