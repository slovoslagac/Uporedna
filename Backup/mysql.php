<?php 
$con = mysql_connect("192.168.0.122:3306","mozzart","mozzart2011");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("kvote", $con);
?>