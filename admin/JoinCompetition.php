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
$Data1= array();
$Data2= array();
$source_id = 2;
$source= '';
include '../query/adminSelectNonMatchCompetition.php';
$Data1=$resultNMCMP;

include '../query/adminMozzartCompetition.php';
$Data2=$resultMZCMP;

?>
<body>
	<table>
		<thead>
		</thead>
		<tbody>

<?php

foreach ($Data1 as $srSource) {
	if ($source != $srSource['src_name']) {
		$source = $srSource['src_name']; $source_id = $srSource['src_id']?>

		<form method="post" action="adminSaveCompetition.php">					
			<tr class="naslov">
				<td><?php echo $source?></td>
				<td><input type="submit" value="Pošalji" /></td>
			</tr> 
			<tr class="naslov">
				<td colspan="2"> Takmičenja kladionice <?php echo $source?></td>
			</tr>

							
			<?php } $liga =  $srSource['cmp_name']; $liga_id = $srSource['cmp_id']?>
			

			<tr class="row<?php echo($i++ & 1 )?>">
				<td colspan="1"> <input type="hidden" name="src_comp[]" value="<?php echo $liga_id?>"><?php echo $srSource['cmp_name']?></td>
			 
			<td class="dropdown"><input type="hidden" >
					<select name="mozz_comp[]">
					<option value="0">Treba spojiti</option>
					<?php
					foreach($Data2 as $cmpt) { $src_cmp_id = $cmpt['competition_id']; $src_cmp_name = $cmpt['competition_name'];?>
							
					<option value="<?php echo $src_cmp_id?>"><?php echo $src_cmp_name?></option> <?php } ?>
				</select>
			</td>
			</tr>
	<?php  }?>
			
		</tbody>
	</table>
</form>	
</body>
</html>

