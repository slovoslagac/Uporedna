<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Liga</title>

<link rel="stylesheet" type="text/css" href="css/liga.css">

</head>

<body>
<?php 
$liga=$_GET['liga'];

?>
<table>
<tr>
	<td class="naslov" colspan=11><a href="naslovna.php"><?php echo $liga?></a></td>
</tr>

<colgroup>
   <col width="23%">
   <col width="23%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
   <col width="6%">
 </colgroup>

<tr>
	<td class = "podnaslov2">DOMAĆIN</td>
	<td class = "podnaslov2">GOST</td>
	<td class = "podnaslov2" >Ki 1</td>
	<td class = "podnaslov2" >Ki X</td>
	<td class = "podnaslov2" >Ki 2</td>
	<td class = "podnaslov2" >0-2</td>
	<td class = "podnaslov2" >3+</td>
	<td class = "podnaslov2" >MAX ki 1</td>
	<td class = "podnaslov2" >MAX ki X</td>
	<td class = "podnaslov2" >MAX ki 2</td>
	<td class = "podnaslov2" >Br. kladionica</td>
</tr>


<?php 
include ('/query/KvoteLiga.php');
$j=0;
while ( $row = mysql_fetch_array ( $result ) )

{
$dom=$row[2];
$gost=$row[3];
$ki1=$row[4];
$kix=$row[5];	
$ki2=$row[6];
$nd=$row[7];
$tp=$row[8];
$mki1=$row[10];
$mkix=$row[11];	
$mki2=$row[12];
$brkl=$row[9];

?>
<tr class="row<?php echo($j++ & 1 )?>">
	<td><?php echo $dom?></td>
	<td><?php echo $gost?></td>
	<td><?php echo number_format($ki1,2)?></td>
	<td><?php echo number_format($kix,2)?></td>
	<td><?php echo number_format($ki2,2)?></td>
	<td><?php echo number_format($nd,2)?></td>
	<td><?php echo number_format($tp,2)?></td>
	<td><?php echo number_format($mki1,2)?></td>
	<td><?php echo number_format($mkix,2)?></td>
	<td><?php echo number_format($mki2,2)?></td>
	<td>(<?php echo $brkl?>)</td>
</tr>



<?php }?>

</table>
</body>
</html>
