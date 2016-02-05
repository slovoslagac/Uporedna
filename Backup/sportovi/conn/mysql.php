<?php 
$con = mysql_connect("192.168.186.21:3306","sport","sport!");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sportovi", $con);
?>