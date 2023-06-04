<!DOCTYPE html>
<html>

<head>
	<title>Artikel lieferanten</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">

	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/inputform.css">
	<script type="text/javascript" src="../js/reset_form.js" defer></script>
	<script type="text/javascript" src="../js/article_supplier.js" defer></script>
	<script src="../js/dist/sweetalert2.all.min.js"></script>

</head>

<body>

	<?php
	require_once "nav.php";
	require_once "../php/model/ArticleSupplier.php";
	require_once "../php/controller/ArticleSupplierController.php";
	$articleSupplierController = new ArticleSupplierController();
	$row = [];
	/**
	 * Die per Link gesendete Data "art_lief_id" kommt aus seite/ergebnis_preise.php
	 */
	if (!empty($_GET["_article_supplier_id"])) :
		$row = (!empty($articleSupplierController->getarticleSupplierById(trim( $_GET["_article_supplier_id"])))) ? $articleSupplierController->getArticleSupplierById(trim( $_GET["_article_supplier_id"])) :[];
		$articleId = $row["article_id"];
	endif;

	/**
	 * Die per Link gesendete Data "_article_id" kommt aus vue/home.php(Spalte Neuer Preis)
	 */
	if (!empty($_GET["_article_id"])) :
		$articleId = $_GET["_article_id"];
	endif;

	

	?>

	<aside id="asd">
		<div id="divform" class="w3-container">
			<center>
				<h4>Neuer Preis</h4>
			</center>
		</div>
		<form class="w3-container" method="post">
			<label><i>Artikel-Nummer : <span class='rot'>*</span> </i></label>
			<!--artikel_id kommt von dem Icon-bearbeiten(ergebnis_preis.php)oder der link ,,Neuer Preis"-->
			<input class='w3-input' type='text' id="article_id" name='article_id' value="<?= $articleId ?>" readonly>
			<label><i>Lieferanten-Nummer :</i><span class="rot">* </span></label>
			<select class="w3-select w3-border" id="supplier_id" name="supplier_id" required>
				<option hidden></option>
			<?php $suppliers = $articleSupplierController->fetchAllSupplier();
				if (!empty($suppliers)) :
					foreach ($suppliers as $supplier) :
						$ttle = $supplier['supplier_id'] . ' ' . $supplier['name'];
						echo ($supplier["supplier_id"] == $row["supplier_id"]) ? '<option selected value="' . $supplier["supplier_id"] . '">' . $ttle . '</option>' : '<option value="' . $supplier["supplier_id"] . '">' . $ttle . '</option>';
					endforeach;
				endif;
			?>
			</select>
			<label><i>Netto :</i><span class="rot">*</span></label>
			<input class="w3-input" type="number" id="price_net" name="price_net" step="0.01" max="100000000" min="2" value="<?= (!empty($row["price_net"])) ? $row["price_net"] : ""; ?>" required>
			<label><i>Steuer :</i><span class="rot">* </span></label>
			<select class="w3-select w3-border" id="tax" name="tax" required>
				<option hidden></option>
				<option value="0.15" <?= ((!empty($row["tax"])) && $row["tax"] == 0.15) ? "selected" : ""; ?>>15%</option>
				<option value="0.07" <?= ((!empty($row["tax"])) && $row["tax"] == 0.07) ? "selected" : ""; ?>>7%</option>
			</select>
			<input type="hidden" name="article_supplier_id" value="<?= ((!empty($row["article_supplier_id"]))) ? $row["article_supplier_id"] : ""; ?>">
			<?php
			if (!empty($suppliers) && !empty($articleId)) :
				echo "<center><button type='submit' class='w3-btn bblue' type='submit' name='btnSave'>Eintragen</button></center>";
			else :
				echo "<center><i><h6 class='rot'>Es gibt noch keine Lieferanten, bitte fügen Sie einen ein.</h6></i></center>";
			endif;
			$articleSupplierController->dbClose();
			?>
		</form>
	</aside>
</body>

</html>