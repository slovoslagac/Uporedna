<?php
$path = join(DIRECTORY_SEPARATOR, array('conn', 'conPDO.php'));
include $path;

$SelAggMatc = $conn -> prepare("select distinct
 io1.match_number as code,
 im.start_time as start_time,
 ic.name as competition,
 ic.id as competition_id,
 ic.level as level_order,
 ith.name as home_team,
 itv.name as visitor_team,
 io1.ki1 as odd_10,
 io1.kix as odd_20,
 io1.ki2 as odd_30,
 io1.ug3p as odd_40,
 'Mozzart' as klad_10,
 io2.ki1 as odd_11,
 io2.kix as odd_21,
 io2.ki2 as odd_31,
 io2.ug3p as odd_41,
 'Germanija' as klad_11,
 co1.ki1 as odd_12,
 co1.kix as odd_22,
 co1.ki2 as odd_32,
 co1.ug3p as odd_42,
 'Prosečna kvota' as klad_12,
 case when io1.ki1 < io1.ki2 then 1 else 3 end as fav,
io1.vt as vt_value,
io1.tip as tip
from
 init_match im
left outer join
 current_init_odds io1
on
 im.event_id=io1.event_id
left outer join
 current_init_odds io2
on
 im.event_id=io2.event_id
inner join 
 init_competition as ic
on
 im.competition_id=ic.id
inner join
 init_team as ith
on
 im.home_team_id=ith.id
inner join
 init_team as itv
on
 im.visitor_team_id=itv.id
left join
 current_src_odds as co1
on 
 co1.match_id=im.id and co1.type = 2
where io1.list_type=4
and io2.list_type=1
and im.start_time < now() + interval '3' day
order by 5 desc,3,2,1");
$SelAggMatc -> execute();
$ShowAggMatches = $SelAggMatc -> fetchAll ( PDO::FETCH_ASSOC);

//print_r($ShowAggMatches);

?>