<!DOCTYPE html>
<html lang="de">

<head>
	<title>Seite Eingang</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">

	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/inputform.css">
	<script type="text/javascript" src="../js/stock.js" defer></script>
	<script src="../js/dist/sweetalert2.all.min.js"></script>

</head>

<body>

	<?php
	require_once "nav.php";
	require_once '../php/model/Stock.php';
	require_once '../php/controller/StockController.php';	?>
	<aside id="asd">
		<div id="divform" class="w3-container">
			<center>
				<h4>Artikel Eingang </h4>
			</center>
		</div>
		<form class="w3-container" method="post">
			<center>
				<?php
				$stock = new Stock();
				$stockController = new StockController();
				if (!empty($_GET["_ean"])) :
					$ean = trim($_GET["_ean"]);
					if (!empty($row = $stockController->getArticleByEan($ean))) :
						echo htmlspecialchars("Artikelname :" . $row['name']);
					else :
						echo " <p><i>Die eingegebene EAN:<b><span><font color='#DC143C'> $ean </font></span></b>ist leider nicht vorhanden.</i></p>";
					endif;
				endif;

				$stockController->dbClose();
				?>

			</center>
			<input type="hidden" name="article_id" value="<?= (!empty($row["article_id"])) ? $row["article_id"] : "" ?>">
			<label><i>Menge :</i><span class="rot">*</span></label>
			<input type="number" class="w3-input" id="quantity" name="quantity" min="-10000" max="10000" required>
			<label><i>Bemerkung :</i></label>
			<textarea class="w3-input" name="notice" rows="2"></textarea>
			<input type="hidden" id="name" name="name" value="<?= (!empty($row['name'])) ? $row['name'] : ""; ?>">
			<?php
			if (!empty($row)) :
				echo "<center><button class='w3-btn bblue' type='submit'>Eintragen</button></center>";
			else :
				echo "<font color='#DC143C'> &#9888;<b><i> : Bitte wählen Sie einen Artikel um die Menge einzufügen.</i></b></font>";
			endif; ?>
		</form>
		<br>
	</aside>
</body>

</html>