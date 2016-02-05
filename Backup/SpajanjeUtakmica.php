<?php
include ('conn/mysql.php');

$result = mysql_query ( "select * from test" ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
;
