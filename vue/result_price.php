<!DOCTYPE html>
<html>

<head>
	<title>Ergenis Preis</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/w3.css">

	<link rel="stylesheet" type="text/css" href="../css/resp_table.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
</head>

<body>
	<?php
	require_once "nav.php";
	require_once '../php/model/ArticleSupplier.php';
	require_once '../php/controller/ArticleSupplierController.php';
	?>
	<aside class="aside_width">
		<h4 align='right'><i>Preise von Artikeln</i></h4>

		<?php
		$articleSupplierController = new ArticleSupplierController();
		if (!empty($_GET["_article_id"])) :
			/*Speichern der eingelesen artikel_id in der Variable artikel_id*/
			$articleId = $_GET["_article_id"];
			if (!empty($rows = $articleSupplierController->getArticlePrice($articleId))) :
		?>
				<table>
					<thead>
						<tr>
							<th>Artikel Nr</th>
							<th>Lieferant-Name</th>
							<th>Netto Preis</th>
							<th>Brutto Preis</th>
							<th>Bearbeiten</th>
						</tr>
					</thead>
					<?php foreach ($rows as $row) :?>
						<tr>
							<td data-label="Artikel Nr"><?=  $row['article_id'] ?></td>
							<td data-label="Lieferant-Name"><?=  $row['name'] ?></td>
							<td data-label="Netto Preis"><?=  ArticleSupplierController::getPriceformat($row['price_net']) ?></td>
							<td data-label="Brutto Preis"><?= ArticleSupplierController::getPriceformat($row['price_brutto']) ?></td>
							<td data-label="Bearbeiten"><a href="<?= "article_supplier.php?_article_supplier_id=".$row['article_supplier_id'] ?>"><img class="img_icon" src="../img/modify.png" alt="" srcset=""></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php
			else :
			echo " <br><br><center><h3><font color='#F57D26'><i>Es gibt noch kein Preis für den ausgewählten Artikel.</i></font></font></h3></center>";
			endif;
		endif; ?>
		<center>
			<div>
				<br><span><a class='link' href="<?=  "home.php?_article_id=$articleId" ?>"> Hier zurück zur Ergebnisseite</a></span>
				<?php
				if (!empty($_GET["_article_id"])) : ?>
					<span><a class="link" href="<?= "article_supplier.php?_article_id=". $_GET["_article_id"] ?>">Neuer Preis</a></span>
				<?php
				endif;
				$articleSupplierController->dbClose(); ?>
			</div>
		</center>
	</aside>
</body>

</html>