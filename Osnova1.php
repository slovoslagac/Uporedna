<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Osnova</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/osnova.css">
</head>
<?php 
date_default_timezone_set('Europe/Belgrade');
$i=1;
$j=1;
$Data1= array();
$path = join(DIRECTORY_SEPARATOR, array('query', 'SelectLeaguesMatches.php'));
include $path;
$Data1 = $ShowMatches;
$numBookmakers=5;
$percent=70;
$liga="";

$maxOdds = array();
foreach ($Data1 as $row) {
	//featch favorite
	$fav = $row['fav'];
	$gameId = $row['code'];
	
	// get max odd
	$columnNames = array();
		for($p=0; $p<=$numBookmakers; $p++){
			$v1 = 'odd_' . $fav.$p;
			$columnNames[]=$v1;
	}	
		//print_r($columnNames);
	
	$maxOdd = 0;
	foreach ($columnNames as $columnName)	{

		$maxOdd = 	((double) $row[$columnName] > (double) $maxOdd) ? $row[$columnName]  : $maxOdd;
	}		
	$maxOdds[$gameId] = (double) $maxOdd;
}

$maxTG = array();
foreach ($Data1 as $row) {
	//featch favorite
	$gameId = $row['code'];

	// get max odd
	$columnNames = array();
	for($p=0; $p<=$numBookmakers; $p++){
		$v1 = 'odd_4'.$p;
		$columnNames[]=$v1;
	}
	//print_r($columnNames);

	$maxOdd = 0;
	foreach ($columnNames as $columnName)	{

		$maxOdd = 	((double) $row[$columnName] > (double) $maxOdd) ? $row[$columnName]  : $maxOdd;
	}
	$maxTG[$gameId] = (double) $maxOdd;
}

?>
<body>
	<table>
				<colgroup>
   				<col width="3%">
   				<col width="3%">
   				<col width="3%">
   				<col width="9%">
   				<col width="9%">
   				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
   				<col width="<?php echo $percent/(3+$numBookmakers*4)?>%">
   				<col width="<?php echo $percent/(3+$numBookmakers*4)?>%">
   				<col width="<?php echo $percent/(3+$numBookmakers*4)?>%">
   				<?php }?>
   				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
   				<col width="<?php echo $percent/(3+$numBookmakers*4)?>%">
   				<?php }?>
   				<col width="3%">
 			</colgroup>
		<thead>
			<tr><h1 class="header">Uporedna lista kladionice Mozzart</h1></tr>
		</thead>
		<tbody  class="tableB">
		<?php foreach ($Data1 as $mat) { 
				if($mat['competition'] != $liga){
					$liga=$mat['competition']; $liga_id=$mat['competition_id'];
					$kski = $mat['ki1'].", ".$mat['ki2'].", ".$mat['ki3'] ;$ksug = $mat['ug1'].", ".$mat['ug2'].", ".$mat['ug3'] ;?>

			<tr class="naslov">
				<td class="liga" colspan="5" value="<?php echo $liga_id?>"><a href="league.php?id=<?php echo $liga_id?>&amp;league=<?php echo $liga?>"><?php echo $liga?></a></td>
				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
				<td class="rightb" colspan="3"><?php echo $mat['klad_1'.$i]?></td>
				<?php }?>
				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
				<td colspan="1"><?php echo substr($mat['klad_1'.$i], 0,3)?></td>
				<?php }
					
				?>
				<td class="leftrightb">VT</td>
			</tr>
				
			<tr class="podnaslov">
			
				<td class="leftb">šifra</td>
				<td>dan</td>
				<td>čas</td>
				<td><?php echo $kski?></td>
				<td class="rightb"><?php echo $ksug?></td>
				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
				<td>1</td>
				<td>X</td>
				<td class="rightb">2</td>
				<?php }?>
				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
				<td>3+</td>
				<?php }?>
				<td class="leftrightb"></td>				
			</tr>
		<?php } $code=$mat['code']; $st= new DateTime($mat['start_time']); $start_date= $st -> format('d.m') ;$start_time = $st -> format('H:i'); 
					$home_team=$mat['home_team']; $visitor_team=$mat['visitor_team']; $fav = $mat['fav']; 
					if($mat['vt_value']>0){$vt=$mat['vt_value'];} else {$vt=1.01;}; $tip=$mat['tip'];?>
			<tr class="row<?php echo($j++ & 1 )?>">
				<td class="leftb"><?php echo $code?></td>
				<td><?php echo $start_date?></td>
				<td><?php echo $start_time?></td>
				<td class="bold"><?php echo $home_team?></td>
				<td class="bold"><?php echo $visitor_team?></td>
				<?php for($i=0; $i<=$numBookmakers; $i++) {
							$ki1= $mat['odd_1'.$i];
							$kix= $mat['odd_2'.$i];
							$ki2= $mat['odd_3'.$i];
					?>
				<td class="<?php echo ($fav == 1 && !empty($ki1) && $maxOdds[$code] == (double) $ki1) ? 'biggestl' : 'leftb'; ?>"><?php echo $ki1?></td>
				<td val="<?php echo $fav?>"><?php echo $kix?></td>
				<td class="<?php echo ($fav == 3 && !empty($ki2) && $maxOdds[$code] == (double) $ki2) ? 'biggestr' : 'rightb'; ?>"><?php echo $ki2?></td>
				<?php }?>
				<?php for($i=0; $i<=$numBookmakers; $i++) {$Tg=$mat['odd_4'.$i];?>
				<td class="<?php echo (!empty($Tg) && $maxTG[$code] == (double) $Tg) ? 'threeplus' : ''; ?>"><?php echo $Tg?></td>
				<?php }  ?>
				<td class="<?php echo ($tip == 3) ? 'vt' : 'leftrightb'; ?>"><?php echo $vt?></td>
			</tr>
			
		
		
		<?php }?>
		</tbody>
	</table>
</body>
</html>