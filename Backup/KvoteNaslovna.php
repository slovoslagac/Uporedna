<?php
include ('../conn/mysql.php');

$result = mysql_query ( 
		"SELECT 
			upper(u.liga) AS liga, 
			u.dom, 
			u.gost,
			u.utk_id, 
			'Bet365' AS u1_name,
			u1.ki1 AS u1_ki1, 
			u1.kix AS u1_kix, 
			u1.ki2 AS u1_ki2,
			'SBObet' AS u2_name, 
			u2.ki1 AS u2_ki1, 
			u2.kix AS u2_kix, 
			u2.ki2 AS u2_ki2, 
			'Bwin' AS u3_name, 
			u3.ki1 AS u3_ki1, 
			u3.kix AS u3_kix, 
			u3.ki2 AS u3_ki2, 
			'Marathon' AS u4_name, 
			u4.ki1 AS u4_ki1, 
			u4.kix AS u4_kix, 
			u4.ki2 AS u4_ki2,
			case when u1.ki1>u1.ki2 then 2 else 1 end fav
from
(
select distinct u.liga, u.dom, u.gost, u.utk_id
from ulaz u ) u
left join ulaz u1 on u.utk_id = u1.utk_id and u1.klad_id = 33
left join ulaz u2 on u.utk_id = u2.utk_id and u2.klad_id = 149
left join ulaz u3 on u.utk_id = u3.utk_id and u3.klad_id = 42
left join ulaz u4 on u.utk_id = u4.utk_id and u4.klad_id = 138
order by 1,2" ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
;
