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
$path = join(DIRECTORY_SEPARATOR, array('query', 'SelectAgregateLeaguesMatches.php'));
include $path;
$Data1 = $ShowAggMatches;
$numBookmakers=2;
$percent=50;



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
				if($mat['competition'] == 'ENGLESKA  1') 
					//$liga=$mat['competition']; $liga_id=$mat['competition_id'];
					?>

			<tr class="naslov">
				<td class="liga" colspan="5" value="<?php echo $liga_id?>"><?php echo $liga?></a></td>
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
				<td>Domaćin</td>
				<td class="rightb">Gost</td>
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
				<td><?php echo $ki1?></td>
				<td><?php echo $kix?></td>
				<td><?php echo $ki2?></td>
				<?php }?>
				<?php for($i=0; $i<=$numBookmakers; $i++) {$Tg=$mat['odd_4'.$i];?>
				<td><?php echo $Tg?></td>
				<?php }  ?>
				<td><?php echo $vt?></td>
			</tr>
			
		
		
		<?php ?>
		</tbody>
	</table>
</body>
</html>