<!DOCTYPE HTML>
<html>

<head>
<title>Uporedna</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="uporedna.css">

</head>
<body>


<?php

$br_red=27;

$boja_red=1;
$rez = fmod($boja_red,2)

?>
	<!-------------------------------------------------Naslovni red------------------------------------------------->

	<table >
		<tr class="kladze" align=center>
			<th colspan="5">Kladionice</th>
			<th colspan="3">Mozzart</th>
			<th colspan="3">PlanetWin365</th>
			<th colspan="3">Soccer</th>
			<th colspan="3">Pinbet</th>
			<th colspan="3">Balkanbet</th>
			<th colspan="3">Meridian</th>
			<th colspan="3">Maxbet</th>
			<th colspan="3">Supersport</th>
			<th colspan="3">Germanija</th>

		</tr>




		<tr class="podnaslov">
			<td colspan="1"><strong>sifra</td>
			<td colspan="1"><strong>datum</td>
			<td colspan="1"><strong>vreme</td>
			<td colspan="1"><strong>Domacin</td>
			<td colspan="1"><strong>Gost</td>
			
			<?php for ($i=1 ; $i<=$br_red/3; $i++ ) {?>
			
			<td colspan="1"><strong>1</td>
			<td colspan="1"><strong>X</td>
			<td colspan="1"><strong>2</td>


			<?php } ?>
			
			

		</tr>




		<!-------------------------------------------------Prikaz podataka iz uporedne liste------------------------------------------------->



<?php
include ('query/mozzart.php');

$liga = "";
while ( $row = mysql_fetch_array ( $result ) ) 

{
	
	?>
 
<?php
	
	if ($row [0] != $liga) {
		$liga = $row [0];
		?> 
	<tr>
			<td  colspan="32" class="liga"><?php echo $row [0] ?></td>



		</tr>	

<?php
	}
	
	?>
	
		<tr class = "tekme">
		
			<td ><?php echo $row [1] ?></td>
			<td ><?php echo $row [2] ?></td>
			<td ><?php echo $row [3] ?></td>
			<td ><?php echo $row [4] ?></td>
			<td ><?php echo $row [5] ?></td>
			
			<?php for ($i=0 ; $i<$br_red/3; $i++ ) {?>
			
			<?php 
			$kec=$row [6+3*$i];
			$iks=$row[6+3*$i+1];
			$dva=$row [6+3*$i+2];
			
			?>
			<td><b><?php echo $kec ?></b></td>
			<td><?php echo $iks ?></td>
			<td><?php echo $dva ?></td>
		
			
			<?php } $boja_red = $boja_red +1;
			$rez = fmod($boja_red,2) ?>
			<td><?php echo $boja_red ?></font></td> 
			<td><?php echo $rez ?></font></td>
		
		</tr>
	
 
<?php
}

mysql_close ( $con );
?>

</table>



<script>
	
	document.getElementByClassName("").style.color = "red";
	
</script>




</body>
</html>
