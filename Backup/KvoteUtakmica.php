<?php
include ('conn/mysql.php');

$result = mysql_query ( "select klad,ki1,kix,ki2
from ulaz
where utk_id = '{$sifra}'" ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
;
