<?php
include ('conn/mysql.php');

$result = mysql_query ( "select distinct competition, match_code, home, visitor
from ini_match
order by 1,2,3" ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
;

?>