<!DOCTYPE html>
<html>
<head>
	<title>Uporedna</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" href="img/mozzart.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/osnova1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
</head>
<body>
<?php 
date_default_timezone_set('Europe/Belgrade');
$i=1;
$j=1;
$Data1= array();
$path = join(DIRECTORY_SEPARATOR, array('query', 'SelectLeaguesMatches.php'));
$path1 = join(DIRECTORY_SEPARATOR, array('includes', 'functions.php'));
include $path;
include $path1;
$Data1 = $ShowMatches;
$numBookmakers=5;
$percent=70;
$liga="";

?>


<div class="container">
	<table class="table table-striped">
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
			<h1 class="header">Uporedna lista kladionice Mozzart</h1>
			<?php foreach ($Data1 as $mat) { 
				if($mat['competition'] != $liga){ $liga=$mat['competition']; $liga_id=$mat['competition_id'];
					if($mat['ki1'] != "") {
						$kski = $mat['ki1'].", ".$mat['ki2'].", ".$mat['ki3'] ;$ksug = $mat['ug1'].", ".$mat['ug2'].", ".$mat['ug3'] ;
						} else {
						$kski = ""; $ksug="";	
					}
					;
					?>
			<tr>
				<td class="liga" colspan="5" value="<?php echo $liga_id?>"><a href="league.php?id=<?php echo $liga_id?>&amp;league=<?php echo $liga?>"><?php echo $liga?></a></td>
				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
				<td class="rightb" colspan="3"><?php echo $mat['klad_1'.$i]?></td>
				<?php }?>
				<?php for($i=0; $i<=$numBookmakers; $i++) {?>
				<td colspan="1"><?php echo substr($mat['klad_1'.$i], 0,3)?></td>
				<?php } ?>
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
			<?php }?>
		</thead>
		<tbody>
			<?php }?>
		</tbody>
	</table>
</div>

</body>
</html>