<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Razno</title>

<link rel="stylesheet" type="text/css" href="uporedna.css">

</head>
<body>




	<!-------------------------------------------------Naslovni red------------------------------------------------->

	<table  class="table"	 cellpadding=3 cellspacing=0 BORDERCOLOR=black>
		<tr class="kladze" >
			<th colspan="3">Kladionice</th>
			<th colspan="3">Soccer</th>
			<th colspan="3">Balkanbet</th>
			
		</tr>


		
		
		<tr bgcolor=#F60909 >
			<td class="head" colspan="1"><strong>sifra</strong></td>
			<td class="head" colspan="1"><strong>Domacin</strong></td>
			<td class="head" colspan="1"><strong>Gost</strong></td>
			<td class="head" colspan="1"><strong>Č</strong></td>
			<td class="head" colspan="1"><strong>Ć</strong></td>
			<td class="head" colspan="1"><strong>Ž</strong></td>
			<td class="head" colspan="1"><strong>Đ</strong></td>
			<td class="head" colspan="1"><strong>X</strong></td>
			<td class="head" colspan="1"><strong>2</strong></td>
			
		</tr>




		<!-------------------------------------------------Prikaz podataka iz uporedne liste------------------------------------------------->



<?php

$con = mysql_connect("192.168.0.76:3306","proske","proske1989");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("latinica", $con);

$result = mysql_query ( "select * from names" ) or die ( $myQuery . "<br/><br/>" . mysql_error () );
;
$liga1 = "";
while ( $row = mysql_fetch_array ( $result ) ) 

{
	$liga = $row [1];


	?>


	<tr>
			<td colspan="19" class="liga"><?php echo $liga ?></td>



		</tr>	

<?php
	}
	

mysql_close ( $con );
?>

</table>


</body>
</html>
