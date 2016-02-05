<?php
include '../conn/conPDO.php';

$NonMatch = $conn -> prepare("SELECT 	
  sm.id AS match_id,
	sm.start_time AS match_start_time,
	sc.name AS competition_name,
	home_team.name AS home_team_name,
	visitor_team.name AS visitor_team_name,
	sm.src_competition_id AS src_competition_id,
	inc.name AS competition_mapping_id,
  src.name AS source_name
FROM
	src_match AS sm
LEFT JOIN	
  matches AS m
ON
	(m.src_match_id = sm.id)	
LEFT JOIN
	competition AS c
ON
	(c.src_competition_id = sm.src_competition_id)
LEFT JOIN
	init_competition AS inc
ON
	(inc.id = c.init_competition_id )
INNER JOIN
	src_competition AS sc
ON
	(sc.id = sm.src_competition_id)	
INNER JOIN
	src_team AS home_team
ON
	(home_team.id = sm.home_team_id)	
INNER JOIN
	src_team AS visitor_team
ON
	(visitor_team.id = sm.visitor_team_id)	
INNER JOIN
	src_source AS src
ON
	( src.id = sm.src_source_id )	
WHERE
	m.src_match_id IS NULL
ORDER BY
	source_name ASC, competition_name ASC, home_team_name");
$NonMatch -> execute();
$resultNM = $NonMatch -> fetchAll ( PDO::FETCH_ASSOC);


