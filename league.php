<!DOCTYPE html>
<html>
<head>
<title>Lige</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/osnova.css">
</head>
<?php
if (isset($_GET['id'])){
$value=$_GET['id'];
$league=$_GET['league'];
} else {
$value=38;	
$league="LIGA ŠAMPIONA";
}


$tab_value = Array('overal','host','guest','last','last_host','last_guest');
$tab_header = Array('Ukupno','Domaćin','Gost','Poslednjih šest','Poslednjih 6 domaćin','Poslednjih 6 gost');

$type_of_data=0;
$j=1;
$num_row=42;
$url = 'http://mstats.mozzartsport.com/api/tournaments/placement?tournamentId='.$value.'&type=json';  
//print $url;
$json = file_get_contents($url);
$json_data = json_decode($json);
$tabela = array();
foreach ($json_data as $dat){
	$tabela[]=$dat;
}
//proveravam da li vraca jednu tabelu ili vise njih
if(is_object($tabela[0])) { 
		$type_of_data=1;
} else {
	$type_of_data=2;
} ?>
<body> 
 
 
 

<?php 
//U zavisnosti od tipa podatka ispisujem tabelu 0 - empty, 1 - one tabela, 2 - more than one table;
if ($type_of_data == 0){

} elseif ($type_of_data == 1) { ?>
	<table class="tableB">
		<colgroup>
			<col width="2%">
			<col width="15%">
			<?php for($i=0;$i<$num_row;$i++){ $x=83;?>
			<col width="<?php echo $x/$num_row?>%">
			<?php }?>
		</colgroup>
		<thead>
		</thead>
		<tbody>
			<tr class="naslov">
				<td rowspan="2" colspan="2"><?php echo $league?></td><?php foreach ($tab_header as $tah){?>
				<td colspan="7"><?php echo $tah?></td><?php }?>
			</tr>
			<tr class="podnaslov"><?php for($k=0;$k<6;$k++){?>
				<td>U</td>
				<td>P</td>
				<td>N</td>
				<td>I</td>
				<td>Gd</td>
				<td>Gp</td>
				<td>Po</td><?php } ?>
			</tr><?php $k=0; foreach ($tabela as $tab) {  $team=$tab -> name;  $k+=1; ?>
			<tr class="row<?php echo($j++ & 1 )?>">
				<td><?php echo $k?></td>
				<td><?php echo $team?></td><?php foreach($tab_value as $tbv) { $data=$tab -> $tbv;?>
				<td><?php echo $data -> played?></td>
				<td><?php echo $data -> wins?></td>
				<td><?php echo $data -> draws?></td>
				<td><?php echo $data -> loses?></td>
				<td><?php echo $data -> scored?></td>
				<td><?php echo $data -> received?></td>
				<td class="threeplus"><?php echo $data -> points?></td><?php }?>
			</tr>
			<?php }?>
		</tbody>
	</table>
<?php 
} elseif ($type_of_data == 2) {
foreach ($tabela as $tab1) {
?>
<body>
	<table class="tableB">
		<colgroup>
			<col width="2%">
			<col width="15%">
			<?php for($i=0;$i<$num_row;$i++){ $x=83;?>
			<col width="<?php echo $x/$num_row?>%">
			<?php }?>
		</colgroup>
		<thead>
		</thead>
		<tbody>
			<tr class="naslov">
				<td rowspan="2" colspan="2"><?php echo $league?></td><?php foreach ($tab_header as $tah){?>
				<td colspan="7"><?php echo $tah?></td><?php }?>
			</tr>
			<tr class="podnaslov"><?php for($k=0;$k<6;$k++){?>
				<td>U</td>
				<td>P</td>
				<td>N</td>
				<td>I</td>
				<td>Gd</td>
				<td>Gp</td>
				<td>Po</td><?php } ?>
			</tr><?php $k=0;  foreach ($tab1 as $tab) { $team=$tab -> name;  $k+=1; ?>
			<tr class="row<?php echo($j++ & 1 )?>">
				<td><?php echo $k?></td>
				<td><?php echo $team?></td><?php foreach($tab_value as $tbv) { $data=$tab -> $tbv;?>
				<td><?php echo $data -> played?></td>
				<td><?php echo $data -> wins?></td>
				<td><?php echo $data -> draws?></td>
				<td><?php echo $data -> loses?></td>
				<td><?php echo $data -> scored?></td>
				<td><?php echo $data -> received?></td>
				<td class="threeplus"><?php echo $data -> points?></td><?php }?>
			</tr>
			<?php }?>
		</tbody>
	</table>
<?php }}?>
</body>
</html>