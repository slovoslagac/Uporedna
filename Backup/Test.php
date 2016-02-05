<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administracija</title>
<link rel="stylesheet" type="text/css" href="../css/admin_spajanje.css">
</head>
<?php
$i=1;
$Data1= array();
$Data2= array();
include '../query/adminSelectNonMatchData.php';
$Data1=$resultNM;  ///Da li on ovde kreira lokalni niz objekata ili je to samo replicirana lista koja se dobija izvrsavanjem upita?

include '../query/adminMozzartCompetition.php';
$Data2=$resultMZCMP;
?>
	<body>
	<table>
		<thead>
		</thead>
		<tbody>
<?php
$source = "";
$liga = "";
foreach ($Data1 as $srSource) {
if ($source != $srSource['source_name']) {
$source = $srSource['source_name'];
?>
					
			<tr>
				<td colspan="2" class="naslov"><?php echo$srSource['source_name']?></td>
			</tr> 
<?php
}	if ($liga != $srSource['competition_name']){
$liga = $srSource['competition_name']; 
?>
			<tr>
				<td class="podnaslov" id="<?php echo $liga?>"><?php echo $liga?></td>
				
<?php 
if($srSource['competition_mapping_id'] == NULL)
{?>				<td class="podnaslov">
					<select>
						<option>Treba spojiti</option>
<?php 
foreach($Data2 as $cmpt) 
{?>
						<option><?php echo $cmpt['competition_name']?></option>
					
<?php } ?>
					</select>
				</td>
<?php } else {?>
				<td class="podnaslov" id="<?php echo $srSource['competition_mapping_id']?>"><?php $srSource['competition_mapping_id']?></td>	
<?php } ?>				
			</tr>
<?php } ?>
					
			<tr class="row<?php echo($i++ & 1 )?>">
				<td><?php echo $srSource['home_team_name'] . " - " . $srSource['visitor_team_name']?></td>
				<td></td>
			</tr>
			
<?php } ?>
			
		</tbody>
	</table>
</body>
</html>
