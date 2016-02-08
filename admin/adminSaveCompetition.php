<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Administracija takmičenja</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/admin_spajanje.css">
</head>

<?php
$i=1;
$data = array();
$indexes = array();
$bookie = $_POST['source'];

// echo $_POST['source'];

// echo $bookie;
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

	$bookie_cmp_base = explode("__",$_post['src_comp'][$index]);

	$tmp['src_comp'] = $bookie_cmp_base[0];
	$tmp['src_name'] = $bookie_cmp_base[1];



	$mozz_cmp_base = explode("__",$_post['mozz_comp'][$index]);
	$tmp['mozz_comp'] = $mozz_cmp_base[0];
	$tmp['mozz_name'] = $mozz_cmp_base[1];

	$data[] = $tmp;
}


// print_r($data);

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


<body>
	<table>
	<thead>
		<tr class="naslov">
			<td colspan="2">Spojili ste takmičenja kladionice <?php echo $bookie?></td>
		</tr>
		<tr class="naslov">
			<td><?php echo $bookie?></td>
			<td>Mozzart</td>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach ($data as $d1) { ?>
		<tr class="row<?php echo($i++ & 1 )?>">
			<td><?php echo $d1['src_name']?></td>
			<td><?php echo $d1['mozz_name']?></td>
		</tr>
		<?php  }?>
	</tbody>	
	</table>


</body>
</html>