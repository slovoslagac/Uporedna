<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administracija mečeva</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/admin_spajanje.css">
</head>
<?php 
$i=1;
$Data1= array();
$Data2= array();
include '../query/adminSelectNonMatchMatches.php';
$Data1=$resultNMM;

include '../query/adminMozzartMatch.php';
$Data2=$resultMZMCH;
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
	if ($source != $srSource['src_source_name']) {
		$source = $srSource['src_source_name']; ?>
		<form method="post" action="adminSaveMatch.php">					
			<tr class="naslov">
				<td colspan="2"><?php echo $source?><input type="submit" value="Pošalji" /></td>
			</tr> 
		<?php } 
		if ($liga != $srSource['mozz_cmp_name']){
			$liga = $srSource['mozz_cmp_name']; $liga_id = $srSource['mozz_cmp_id'] ?>
			
			
			<tr class="podnaslov">
			<td colspan="2"><?php echo $liga?></td>
			</tr> 

<?php } ?>
			<tr  class="row<?php echo($i++ & 1 )?>">
				<td  style="display:none;"><input type="hidden" name="src_home_id[]" value="<?php echo $srSource['src_home_team_id']?>"></td>
				<td  style="display:none;"><input type="hidden" name="src_visitor_id[]" value="<?php echo $srSource['src_visitor_team_id']?>"></td>
				<td><input type ="hidden" name="src_match[]" value="<?php echo $srSource['src_match_id']  ?>"><?php echo $srSource['src_home_team_name'] . " - " .  $srSource['src_visitor_team_name']?></td>
			<td  class="dropdown"><input type="hidden" >
					<select name="mozz_match[]">
					<option value="0">Popuniti</option>
					<?php
					foreach($Data2 as $mozz) { 
					if ($liga_id==$mozz['mozz_cmp_id']) {
						$home_team_name = $mozz['mozz_home_team_name']; $visitor_team_name=$mozz['mozz_visitor_team_name']?>
							
					<option value="<?php echo $mozz['mozz_match_id']?>"><?php echo $home_team_name . " - " .  $visitor_team_name?></option> <?php } }?>
				</select>
			</td>
			<td  style="display:none;"><input type="hidden" name="moz_home_id[]" value="<?php echo $srSource['src_home_team_id']?>"></td>
			
			</tr>
<?php }?>
		</tbody>
	</table>
</form>	
</body>
</html>