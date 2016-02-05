<?php
$path = join(DIRECTORY_SEPARATOR, array('conn', 'conPDO.php'));
include $path;

$SelMatc = $conn -> prepare("select code,start_time, competition, a1.competition_id, a1.level_order, a1.home_team, a1.visitor_team, a1.odd_10, a1.odd_20, a1.odd_30, a1.odd_40,
  co2.ki1 as odd_11, co2.kix as odd_21, co2.ki2 as odd_31, co2.ug3p as odd_41, a2.odd_12, a2.odd_22, a2.odd_32, a2.odd_42, a2.odd_13, a2.odd_23, a2.odd_33, a2.odd_43,
  a2.odd_14, a2.odd_24, a2.odd_34, a2.odd_44, a2.odd_15, a2.odd_25, a2.odd_35, a2.odd_45, a1.vt_value, a1.tip, 
  ksc.kip as ki1, ksc.ki6 as ki2, ksc.kic as ki3, ksc.ugp as ug1, ksc.ug6 as ug2, ksc.ugc as ug3, a1.fav, 
  a1.klad_10, 'Germanija' as klad_11, 'Bet365' as klad_12, 'Pinnacle' as klad_13, 'SBObet' as klad_14, 'Bwin' as klad_15
from
(
select 
 io1.match_number as code,
 im.start_time as start_time,
 ic.name as competition,
 ic.id as competition_id,
 ic.level as level_order,
 ith.name as home_team,
 itv.name as visitor_team,
 im.event_id as sifra,
 im.id as sifra1,
 io1.ki1 as odd_10,
 io1.kix as odd_20,
 io1.ki2 as odd_30,
 io1.ug3p as odd_40,
 'Mozzart' as klad_10,
 case when io1.ki1 < io1.ki2 then 1 else 3 end as fav,
 io1.vt as vt_value,
 io1.tip as tip
from init_match as im, 
init_competition as ic,
init_team as ith,
init_team as itv,
current_init_odds as io1
where im.competition_id=ic.id
and im.home_team_id=ith.id
and im.visitor_team_id=itv.id
and im.event_id=io1.event_id
and im.start_time > now()
and io1.list_type=4) a1
left join current_init_odds as co2 on a1.sifra=co2.event_id and co2.list_type=1 
left join ks_competition as ksc on ksc.competition_id=a1.competition_id
left join 
(select 
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
 c.match_id as matchid
from
(
select distinct match_id 
from current_src_odds c) c
left join current_src_odds co1 on c.match_id = co1.match_id and co1.bkm=200 and co1.type =1
left join current_src_odds co2 on c.match_id = co2.match_id and co2.bkm=228 and co2.type =1
left join current_src_odds co3 on c.match_id = co3.match_id and co3.bkm=230 and co3.type =1
left join current_src_odds co4 on c.match_id = co4.match_id and co4.bkm=240 and co4.type =1) a2 on a1.sifra1=a2.matchid
order by 5 desc,3,2,1");
$SelMatc -> execute();
$ShowMatches = $SelMatc -> fetchAll ( PDO::FETCH_ASSOC);

//print_r($ShowMatches);

?>