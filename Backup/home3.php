<!DOCTYPE html>
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
		<tr class="kladze" >
			<td colspan="5">Kladionice</th>
			<td colspan="3">Mozzart</th>
			<td colspan="3">PlanetWin365</th>
			<td colspan="3">Soccer</th>
			<td colspan="3">Pinbet</th>
			<td colspan="3">Balkanbet</th>
			<td colspan="3">Meridian</th>
			<td colspan="3">Maxbet</th>
			<td colspan="3">Supersport</th>
			<td colspan="3">Germanija</th>

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
		
			<?php 
			$sifra = $row [1];
			$dan = $row [2];
			$vreme = $row [3];
			$dom = $row [4];
			$gost = $row [5];
			
			
			switch ($dan){
				case "Mon":
					$dan = "Pon";  
					break;
				case "Tue":
					$dan = "Uto";
					break;
				case "Wed":
					$dan = "Sre";
					break;
				case "Thu":
					$dan = "Cet";
					break;
				case "Fri":
					$dan = "Pet";
					break;
				case "Sat":
					$dan = "Sub";
					break;
				case "Sun":
					$dan = "Ned";
					break;
				default:
					$dan=$dan;
					break;
			}
		
			?>
		
			<td colspan="1"><?php echo $sifra ?></td>
			<td colspan="1"><?php echo $dan ?></td>
			<td colspan="1"><?php echo $vreme ?></td>
			<td colspan="1"><?php echo $dom ?></td>
			<td colspan="1"><?php echo $gost ?></td>
			
			<?php for ($i=0 ; $i<$br_red/3; $i++ ) {?>
			
			<?php 
			$kec=$row [6+3*$i];
			$iks=$row[6+3*$i+1];
			$dva=$row [6+3*$i+2];
			
			?>
			<td colspan="1"><b><?php echo $kec ?></b></td>
			<td colspan="1"><?php echo $iks ?></td>
			<td colspan="1"><?php echo $dva ?></td>
		
			
			<?php } $boja_red = $boja_red +1;
			$rez = fmod($boja_red,2) ?>
		<!---	<td><?php echo $boja_red ?></font></td> 
			<td><?php echo $rez ?></font></td> -->
		
		</tr>
	
 
<?php
}

mysql_close ( $con );
?>

</table>
		



<script>
	
	document.getElementByClassName("podnaslov").style.backgroundColour = "blue";
	
</script>




</body>
</html>
