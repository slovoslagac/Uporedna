<?php
include '../conn/conPDO.php';

$MozMatch = $conn -> prepare("select distinct
  im.id as mozz_match_id,
  im.competition_id as mozz_cmp_id,
  ith.name as mozz_home_team_name,
  ith.id as mozz_home_team_id,
  itv.name as mozz_visitor_team_name,
  itv.id as mozz_visitor_team_id
from
  init_match as im
inner join 
  init_team as ith
on
  (im.home_team_id = ith.id)
inner join 
  init_team as itv
on
  (im.visitor_team_id = itv.id)
where im.start_time > now() - interval \"5\" day
and im.start_time < now() + interval \"10\" day
and im.competition_id in (select init_competition_id from competition c)
order by 2,3");
$MozMatch -> execute();
$resultMZMCH = $MozMatch -> fetchAll ( PDO::FETCH_ASSOC);



