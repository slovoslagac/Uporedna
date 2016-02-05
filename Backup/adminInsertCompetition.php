<?php
$competitionId = $_POST['takmicenjeId'];
$srcCompetitionId = $_POST['srcCompetitionId'];

include '../conn/conPDO.php';

$query = '
INSERT INTO
competition (init_competition_id, src_competition_id)
VALUES
(:init_competition_id, :src_competition_id)
';

$params = array(
		'init_competition_id' => $competitionId,
		'src_competition_id' => $srcCompetitionId
);

$prepare = $conn->prepare($query);
$prepare->execute($params);


?>

