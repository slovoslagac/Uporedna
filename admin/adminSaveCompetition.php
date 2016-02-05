<?php

$data = array();
$indexes = array();

// fetch data
$_post = $_POST;
if(!empty($_post['src_comp'])) {
	foreach($_post['src_comp'] as $index => $inv) {
		if($_post['mozz_comp'][$index] == 0 ) {
			continue;
		}

		$indexes[] = $index;
	}
}

//print_r($indexes);

// collect data for DB inserts
foreach($indexes as $index) {
	// temporary data
	$tmp = array();
	$tmp['src_comp'] = $_post['src_comp'][$index];
	$tmp['mozz_comp'] = $_post['mozz_comp'][$index];


	$data[] = $tmp;
}


print_r($data);

include '../conn/conPDO124.php';

foreach ($data as $d) {

	$competitionId =$d['mozz_comp'];
	$srcCompetitionId = $d['src_comp'];



	$query = '
INSERT INTO
conn_competition (init_competition_id, src_competition_id)
VALUES
(:init_competition_id, :src_competition_id)
';

	$params = array(
			'init_competition_id' => $competitionId,
			'src_competition_id' => $srcCompetitionId
	);

	$prepare = $conn->prepare($query);
	$prepare->execute($params);


}
$conn = null;

?>