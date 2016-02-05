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
//$Data2= array();
include '../query/adminSelectNonMatchCompetition.php';
$Data1=$resultNMCMP;

//include '../query/adminMozzartCompetition.php';
//$Data2=$resultMZCMP;

?>
<body>
	<table>
		<thead>
		</thead>
		<tbody>

<form action="test2.php" method="post">
	<?php foreach ($Data1 as $srSource) { 
			$liga=$srSource['cmp_name'];
	?>
	<tr> <input type="hidden" name="league[]" value="<?php echo $liga?>"><?php echo $liga?></tr>
	<?php }?>
   <p>First name: <input type="hidden" name="firstname[]" value="bla1"/>bla</p>
   <p>Last name: <input type="hidden" name="lastname[]" value = "11"/>1</p>
    <p>First name: <input type="hidden" name="firstname[]" value="bla11"/>bla1</p>
   <p>Last name: <input type="hidden" name="lastname[]" value = "111"/>11</p>
   <input type="submit" name="submit" value="Submit" />
</form>
			
		</tbody>
	</table>
</form>	
</body>
</html>
