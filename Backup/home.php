<!DOCTYPE HTML>
<html>

<head>
<title>Uporedna</title>

<link rel="stylesheet" type="text/css" href="uporedna.css">

</head>
<body>


<?php

$br_red=27;

$boja_red=1;
$rez = fmod($boja_red,2)

?>
	<!-------------------------------------------------Naslovni red------------------------------------------------->

	<table border=5px text-align=center fontcolour=white align=center
		 cellpadding=3 BORDERCOLOR=black>
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




		<tr align=center bgcolor=#F60909>
			<td class="head" colspan="1"><strong>sifra</td>
			<td class="head" colspan="1"><strong>datum</td>
			<td class="head" colspan="1"><strong>vreme</td>
			<td class="head" colspan="1"><strong>Domacin</td>
			<td class="head" colspan="1"><strong>Gost</td>
			
			<?php for ($i=1 ; $i<=$br_red/3; $i++ ) {?>
			
			<td class="head" colspan="1"><strong>1</td>
			<td class="head" colspan="1"><strong>X</td>
			<td class="head" colspan="1"><strong>2</td>


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
	
		<tr align=center id="podaci">
		
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

			<td class="mec"><?php echo $row [1] ?></td>
			<td class="mec"><?php echo $row [2] ?></td>
			<td class="mec"><?php echo $row [3] ?></td>
			<td class="mec"><?php echo $row [4] ?></td>
			<td class="mec"><?php echo $row [5] ?></td>
			
			<?php for ($i=0 ; $i<$br_red/3; $i++ ) {?>
			
			<?php 
			$kec=$row [6+3*$i];
			$iks=$row[6+3*$i+1];
			$dva=$row [6+3*$i+2];
			
			?>
			<td class="mec"><strong><?php echo $kec ?></font></td>
			<td class="mec"><?php echo $iks ?></font></td>
			<td class="mec"><?php echo $dva ?></font></td>
		
			
			<?php } $boja_red = $boja_red +1;
			$rez = fmod($boja_red,2) ?>


		</tr>
	
 
<?php
}

mysql_close ( $con );
?>

</table>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#podaci td.mec').each(function(){
         if ( $rez == 0 ) {
        	 bgcolor=#F60909; 
		}  
    });
});

</script>



</body>
</html>
