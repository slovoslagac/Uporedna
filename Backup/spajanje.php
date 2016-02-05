<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administracija</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/admin_spajanje.css">
</head>
<?php
$i=1;
$Data1= array();
$Data2= array();
include '../query/adminSelectNonMatchData.php';
$Data1=$resultNM; 

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
		$source = $srSource['source_name'];?>
					
			<tr>
				<td colspan="2" class="naslov"><?php echo $srSource['source_name']?></td>
			</tr> 
			
			<?php }	
			if ($liga != $srSource['competition_name']){
				$liga = $srSource['competition_name'];
				$ligaconn = $srSource['competition_mapping_id']; ?>
			
			<tr>
				<td class="podnaslov" ><?php echo $liga?></td>
				<a ></a>

			<?php 
				if($srSource['competition_mapping_id'] == NULL) {?>				
				
				<td class="podnaslov">
					<select>
						<option>Treba spojiti</option>
				<?php
					foreach($Data2 as $cmpt) {?>
					
						<option value="<?php echo $cmpt['competition_id']?>" data-src-competition-id="<?php echo $srSource['src_competition_id']?>" data-rel="<?php echo $liga?>" data-link="<?php echo $liga?>"><?php echo $cmpt['competition_name']?></option> <?php } ?>
					</select>
				</td>

				<?php } else {?>

				<td class="podnaslov" id="<?php echo $liga?>"><form><text><?php echo $srSource['competition_mapping_id']?></text></form></td>	<?php } ?>				
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

<script>
	$(function() {
		$(document).on('blur', '.competitionList', function(e) {
			e.preventDefault();
			var competitionId = $(this).val();
			var srcCompetitionId = $('option:selected', this).data('src-competition-id');
			var rel = $('option:selected', this).data('rel');
			var link = $('option:selected', this).data('link');
			console.log (link)
			
			if (srcCompetitionId > 0){
			$.ajax({
				url: '/uporedna/query/adminInsertCompetition.php',
				type: 'POST',
				data: { takmicenjeId: competitionId, srcCompetitionId: srcCompetitionId, rel: rel },
				success: function(data) {
					//window.location = document.URL + '#' + rel
					//window.location.reload();
					window.location.href="/uporedna/admin/spajanje.php#" + link;

				} 
			}); }
		});
	});
	
</script>
