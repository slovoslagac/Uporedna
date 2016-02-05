<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Meč</title>

<link rel="stylesheet" type="text/css" href="css/utakmica.css">

</head>

<body>
<?php 
$sifra=$_GET['sifra'];
$liga=$_GET['liga'];
$dom=$_GET['dom'];
$gost=$_GET['gost'];

?>
<table>
<tr>
	<td class="naslov" colspan=4><?php echo $liga?></td>
</tr>
<tr>
	<td  class="podnaslov" colspan=4><?php echo $dom?> : <?php echo $gost?></td>
</tr>
<tr>
	<td class = "podnaslov2" colspan=1>Kladionica</td>
	<td class = "podnaslov2" >Ki 1</td>
	<td class = "podnaslov2" >Ki X</td>
	<td class = "podnaslov2" >Ki 2</td>
</tr>


<?php 
include ('/query/KvoteUtakmica.php');
$j=0;
while ( $row = mysql_fetch_array ( $result ) )

{
$klad=$row[0];
$ki1=$row[1];
$kix=$row[2];	
$ki2=$row[3];

?>
<tr class="row<?php echo($j++ & 1 )?>">
	<td><?php echo $klad?></td>
	<td><?php echo $ki1?></td>
	<td><?php echo $kix?></td>
	<td><?php echo $ki2?></td>
</tr>



<?php }?>

</table>
</body>
</html>
