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
$bookie = 'Soccer';
$bookies = array('Soccer', 'Balkanbet');

if (isset ( $_GET ["bookie_id"] ) != "") {
	$source_id = $_GET ["bookie_id"];
	$bookie = $bookies[$source_id - 2];

}
// echo $bookie;

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
			<tr class="naslov">
			<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
				<td>
					<select name="bookie_id">
						<option value="2" <?php if(2==$source_id) {echo 'selected="selected"';}?>>Soccer</option>
						<option value="3" <?php if(3==$source_id) {echo 'selected="selected"';}?>>Balkanbet</option>
					</select>
				</td>
				<td>
					<input type="Submit" value="Osveži odabranu kladionicu"/>
				</td>
			</form>
			</tr> 
			<tr class="naslov">
				<td colspan="2">Nespojena takmičenja kladionice <?php echo $bookie?></td>
			</tr>
			<form method="post" action="adminSaveCompetition.php">

			<input type="hidden" name="source" value="<?php echo $bookie ?>">
			
			<?php
			foreach ($Data1 as $srSource) {

				if ($bookie != $srSource['src_name']) {
					$source = $srSource['src_name']; $source_id = $srSource['src_id']; echo $source?>

					





					<?php } $liga =  $srSource['cmp_name']; $liga_id = $srSource['cmp_id']?>


					<tr class="row<?php echo($i++ & 1 )?>">
						<td colspan="1"> <input type="hidden" name="src_comp[]" value="<?php echo $liga_id."__".$srSource['cmp_name']?>"><?php echo $srSource['cmp_name']?></td>

						<td class="dropdown"><input type="hidden" >
							<select name="mozz_comp[]">
								<option value="0">Treba spojiti</option>
								<?php
								foreach($Data2 as $cmpt) { $src_cmp_id = $cmpt['competition_id']; $src_cmp_name = $cmpt['competition_name'];?>

								<option value="<?php echo $src_cmp_id."__".$src_cmp_name?>"><?php echo $src_cmp_name?></option> <?php } ?>
							</select>
						</td>
					</tr>

					<?php  }?>
					
					<tr class="naslov">
						<td class="button" colspan="2"><input type="submit" value="Pošalji" /></td>
					</tr>

			</form>
		</tbody>	
	</table>
</body>
</html>

