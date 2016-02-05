<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Naslovna strana</title>

<link rel="stylesheet" type="text/css" href="naslovna.css">

</head>
<body>
	<div class="centered">
		<table class="meni" border=5px align="center">
	<th align="left">

			<form action="<?php $_SERVER['PHP_SELF']?>" metod="post" >
				Mozzart <input type="checkbox" name="klad1" value="Mozzart"> 
				Pwin365 <input type="checkbox" name="klad1" value="Pwin365">
				Meridian <input type="checkbox" name="klad1" value="Meridian">
				Soccer <input type="checkbox" name="klad1" value="Soccer"><br>
				<br>
				BalkanBet <input type="checkbox" name="klad1" value="Balkanbet"><br>
				<br>
				<div class="left"><input type="checkbox" onClick="toggle(this)" />Odaberi sve</div>
				<div class="centered"><input type="submit" value="Izaberi"></div>
			</form>
	</th>
		</table>
	</div>
</body>
</html>

<<script type="text/javascript">



function toggle(source) {
  checkboxes = document.getElementsByName('klad1');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

</script>