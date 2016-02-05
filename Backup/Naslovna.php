<!DOCTYPE html>
<html>
<head>
<?php 
$r=4;

?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Naslovna strana</title>
	<link rel="stylesheet" type="text/css" href="uporedna.css">

</head>
	<body>
		<table>
			<tr> <?php $sirin=$r*3+2?>
				<td class="naslov" colspan=<?php echo $sirin?> >Uporedna lista</td>
			</tr>
			<colgroup>
   				<col width="20%">
   				<col width="20%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
   				<col width="5%">
 			</colgroup>
<?php 

include ('KvoteNaslovna.php');

$maxOdds = array();
while ( $row = mysql_fetch_object ( $result ) ) {
	// fetch favorite
	$fav = $row->fav;
	$gameId = $row->utk_id;
	
	// get max odd
	$columnNames = array(
		'u1_ki' . $fav,
		'u2_ki' . $fav,
		'u3_ki' . $fav,
		'u4_ki' . $fav,
	);
	
	//print_r($columnName);
	
	$maxOdd = 0;
	foreach($columnNames as $columnName) {
		$maxOdd =  ( (double) $row->$columnName > (double) $maxOdd) ? $row->$columnName  : $maxOdd;
	}
	$maxOdds[$gameId] = (double) $maxOdd;
}
mysql_free_result($result);
include ('KvoteNaslovna.php');

$liga = "";
$j=1;
while ( $row = mysql_fetch_array ( $result ) )

{
	// set game and favorites
	$gameId = $row['utk_id'];
	$fav = $row['fav'];
	
if ($row [0] != $liga) {
	$liga = $row [0];
	
	
	
	
	
	
	($j++ & 1 );

	if (file_exists("pictures/leagues/".$liga.".png")){
		$slika = "pictures/leagues/".$liga.".png";
	} else {
		$slika = "pictures/leagues/fifa.png";
	}

	
?>	



			<tr>
				<td class = "liga"><img src="<?php echo $slika?>" style="width:30px;height:15px" /></td>
				<td class = "liga"><a href="Liga.php?liga=<?php echo $liga?>" metod = "get"><?php echo $row [0]?></td>
				<?php for($k=1;$k<=$r;$k++) {?>
				<td colspan="3" class = "podnaslov" ><?php echo $row [4*$k] ?></td>
				<?php }?>
				
			</tr>
			<tr>
				<td colspan="2" class = "podnaslov2"></td><?php for($k=1;$k<=$r;$k++){?>
				
				<td class = "podnaslov2" >Ki 1</td>
				<td class = "podnaslov2" >Ki X</td>
				<td class = "podnaslov2" >Ki 2</td>
				<?php 
				}?>
				
			</tr>
				<?php
				} 

				$dom=$row[1];
				$gost=$row[2];
				$sifra=$row[3];

				?>
				<tr class="row<?php echo($j++ & 1 )?>">
					<td><a href="Utakmica.php?sifra=<?php echo $sifra?>&amp;dom=<?php echo $dom?>&amp;gost=<?php echo $gost?>&amp;liga=<?php echo $liga?>" metod = "get"><?php echo $dom?></td>
					<td><a href="Utakmica.php?sifra=<?php echo $sifra?>&amp;dom=<?php echo $dom?>&amp;gost=<?php echo $gost?>&amp;liga=<?php echo $liga?>" metod = "get"><?php echo $gost?></td>

		 		<?php 
				for ($i=1;$i<=$r;$i++) {
					// set column names
					$ki1 = "u{$i}_ki1";
					$kix = "u{$i}_kix";
					$ki2 = "u{$i}_ki2";
				?>
				
				<td class="<?php echo ($fav == 1 && !empty($row[$ki1]) && $maxOdds[$gameId] == (double) $row[$ki1]) ? 'biggestl' : 'leftb'; ?>"> <?php echo $row[$ki1];?></td>
				<td><?php echo $row[$kix];?></td>
				<td class="<?php echo ($fav == 2 && !empty($row[$ki2]) && $maxOdds[$gameId] == (double) $row[$ki2]) ? 'biggestr' : 'rightb'; ?>"><?php echo $row[$ki2];?></td>
				<?php }?>
					
			</tr>
				<?php 
				}
				mysql_close ( $con );
				?>
		</table>
	</body>
</html>