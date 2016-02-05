<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Naslovna strana</title>
	<link rel="stylesheet" type="text/css" href="uporedna.css">
</head>

<?php

$data = array();
$indexes = array();

// fetch data
$_post = $_POST;
if(!empty($_post['src_match'])) {
	foreach($_post['src_match'] as $index => $inv) {
		if($_post['mozz_match'][$index] == 0 ) {
			continue;
		}

		$indexes[] = $index;
	}
}

print_r($indexes);

// collect data for DB inserts
foreach($indexes as $index) {
	// temporary data
	$tmp = array();
	$tmp['src_match'] = $_post['src_match'][$index];
	$tmp['mozz_match'] = $_post['mozz_match'][$index];
	$data[] = $tmp;
}



include '../conn/conPDO.php';

foreach ($data as $d) {

	$mozz_match_Id =$d['mozz_match'];
	$src_match_Id = $d['src_match'];



	$query = '
INSERT INTO
matches (init_match_id, src_match_id)
VALUES
(:init_match_id, :src_match_id)
';

	$params = array(
			'init_match_id' => $mozz_match_Id,
			'src_match_id' => $src_match_Id
	);

	$prepare = $conn->prepare($query);
	$prepare->execute($params);


}
$conn = null;

?>


<body>
	<table>
		<thead>
		</thead>
		<tbody>
			<tr>
				<td>Mec iz izvora</td>
				<td>Mozzart meč</td>
			</tr><?php foreach ($data as $dat) {?>
			<tr>
				<td><?php echo $dat->src_match?></td>
				<td><?php echo $dat->mozz_match?></td>
			</tr>
		<?php }?>
		</tbody>
	</table>
</body>
</html>