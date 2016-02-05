<?php
$path = join(DIRECTORY_SEPARATOR, array('conn', 'conPDO.php'));
include $path;

$SelMatc = $conn -> prepare("select distinct
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
 'Bet365' as klad_12,
 co2.ki1 as odd_13,
 co2.kix as odd_23,
 co2.ki2 as odd_33,
 co2.ug3p as odd_43,
 'Pinnacle' as klad_13,
 co3.ki1 as odd_14,
 co3.kix as odd_24,
 co3.ki2 as odd_34,
 co3.ug3p as odd_44,
 'SBObet' as klad_14,
 co4.ki1 as odd_15,
 co4.kix as odd_25,
 co4.ki2 as odd_35,
 co4.ug3p as odd_45,
 'Bwin' as klad_15,
 case when io1.ki1 < io1.ki2 then 1 else 3 end as fav,
io1.vt as vt_value,
io1.tip as tip,
ksc.kip as ki1,
ksc.ki6 as ki2,
ksc.kic as ki3,
ksc.ugp as ug1,
ksc.ug6 as ug2,
ksc.ugc as ug3
from
 init_match im
left outer join
 current_init_odds io1
on
 im.event_id=io1.event_id
left outer join
 current_init_odds io2
on
 im.event_id=io2.event_id and io2.list_type=1
inner join 
 init_competition as ic
on
 im.competition_id=ic.id
left outer join
 ks_competition as ksc
on
 ksc.competition_id=ic.id		
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
 co1.match_id=im.id and co1.bkm=200 and co1.type = 1
left join
 current_src_odds as co2
on 
 co2.match_id=im.id and co2.bkm=228 and co2.type = 1
left join
 current_src_odds as co3
on 
 co3.match_id=im.id and co3.bkm=230 and co3.type = 1
left join
 current_src_odds as co4
on 
 co4.match_id=im.id and co4.bkm=240 and co4.type = 1
where im.start_time > now()
and io1.list_type=4
order by 5 desc,3,2,1");
$SelMatc -> execute();
$ShowMatches = $SelMatc -> fetchAll ( PDO::FETCH_ASSOC);

//print_r($ShowMatches);

?>