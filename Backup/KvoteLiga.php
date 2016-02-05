<?php
include ('conn/mysql.php');

$result = mysql_query ( "select liga, utk_id, dom, gost, sum(ki1)/count(ki1) ki1, sum(kix)/count(kix) kix, sum(ki2)/count(ki2) ki2, sum(ug02)/count(ug02) nd,sum(ug3p)/count(ug3p) ki2, count(*), max(ki1), max(kix), max(ki2)
from ulaz
where upper(liga)  = '{$liga}'
group by liga, dom,gost" )
;
