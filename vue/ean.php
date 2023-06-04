<!DOCTYPE html>
<html lang="de">

<head>
	<title>Seite EAN</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/suchform.css">
</head>

<body>
	<?php require_once "nav.php"; ?>
	<aside class="aside_width">
		<br>
		<center>
			<form method="get" action="stock.php">
				<i>EAN:</i><input type="text" placeholder="EAN" name="_ean" required />
				<button class="w3-btn " type="submit" name="btnean"><img class="search" src="../img/search.png"></button>
			</form>
		</center>
	</aside>
</body>

</html>