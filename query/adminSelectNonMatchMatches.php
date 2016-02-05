<?php
include '../conn/conPDO.php';

$NonMatchMatch = $conn -> prepare("select 
  sm.id as src_match_id,
  c.init_competition_id as mozz_cmp_id,
  ic.name as mozz_cmp_name,
  sth.name as src_home_team_name,
  sth.id as src_home_team_id,
  stv.name as src_visitor_team_name,
  stv.id as src_visitor_team_id,
  ss.name as src_source_name
from 
  src_match as sm
inner join
  competition as c
on 
  (sm.src_competition_id=c.src_competition_id)
inner join 
  init_competition ic
on
  (c.init_competition_id=ic.id)
inner join 
  src_team as sth
on
  (sm.home_team_id = sth.id)
inner join 
  src_team as stv
on
  (sm.visitor_team_id = stv.id)
inner join 
  src_source ss
on
  (sm.src_source_id=ss.id)
inner join
  import i
on 
  (sm.import_id=i.id)
where
  i.date_time > now() - interval \"4\" day
and 
  sm.id not in (select src_match_id from matches)
order by 3 asc, 4 asc");
$NonMatchMatch -> execute();
$resultNMM = $NonMatchMatch -> fetchAll ( PDO::FETCH_ASSOC);


