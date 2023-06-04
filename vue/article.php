<!DOCTYPE html>
<html lang="de">

<head>
	<title>Artikel Seite</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">

	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/inputform.css">
	<script type="text/javascript" src="../js/reset_form.js" defer></script>
	<script type="text/javascript" src="../js/article.js" defer></script>
	<script src="../js/dist/sweetalert2.all.min.js"></script>
</head>

<body>


	<?php
	require_once "nav.php";
	require_once "../php/model/Article.php";
	require_once "../php/controller/ArticleController.php";

	$articleController = new ArticleController();
	$row =[];

	/** 
	 * Der Wert von id_artikel wird per link geschickt aus der Seite ergebnis.php 
	 */
	if (!empty($_GET)) :
		$row = (!empty($articleController->getArticleById(trim($_GET["_article_id"])))) ? $articleController->getArticleById(trim($_GET["_article_id"])) : [];
	endif;
	?>

	<aside id="asd">
		<div id="divform" class="w3-container">
			<center>
				<h4>Artikel einfügen </h4>
			</center>
		</div>
		<form id="form" class="w3-container" method="Post">
			<label><i>Name :</i><span class="rot">* </span></label>
			<input type="text" id="name" class="w3-input" name="name" value="<?= (!empty($row["name"])) ? $row["name"] : ""; ?>" required>
			<input type="hidden" name="article_id" value="<?= !empty($row["article_id"]) ? $row["article_id"] : ""; ?>" required>
			<label><i>Preis :</i><span class="rot">*</span></label>
			<input type="number" class="w3-input" step="0.01" name="price" value="<?= (!empty($row["price"])) ? $row["price"] : ""; ?>" max="100000000" min="2" required><br />
			<select class="w3-select w3-border" name="depot_id" required>
				<option value="" disabled selected>Wählen Sie ein Lagertyp *</option>

				<?php
				$depots = $articleController->fetchAllDepot();
				if (!empty($depots)) :
					foreach ($depots as $depot) :
						$title = $depot['depot_id'] . ' ' . $depot['description'];
						echo ($depot['depot_id'] ==  $row["depot_id"]) ? "<option selected value='". $depot["depot_id"]."'>" . $title . "</option>" : "<option value='" . $depot["depot_id"] . "'>" . $title . "</option>";
					endforeach;
				endif;
				?>
			</select>
			<?php
			$articleController->dbClose();
			?>
			<input type="hidden" name="backup" value="0">
			<p><input class="w3-check" type="checkbox" id="checkbox" name="backup" value="1" <?= (!empty($row["backup"]) && $row["backup"] == "1") ? "checked" : ""; ?>>
				<label><i> Backup :</i></label>
			</p>
			<label><i>Nummer :</i><span class="rot">* </span></label>
			<input type="number" class="w3-input" name="article_number" value="<?= (!empty($row["article_number"])) ?  $row["article_number"] : ""; ?>" required>
			<label><i>EAN :<span class="rot">* </span></label>
			<input type="text" class="w3-input" name="ean" value="<?= (!empty($row["ean"])) ?  $row["ean"] : ""; ?>" required>
			<label><i>Bemerkung :</i></label>
			<textarea class="w3-input" name="notice" rows="2"><?= (!empty($row["notice"])) ? $row["notice"] : ""; ?></textarea>
			<!--Übergebe der Benutzer_id    -->
			<input type="hidden" name="user_id" value=<?= UserController::getCurrentUserId(); ?>>
			<center>
				<button type="submit"  class="w3-btn" id="btnSave" name="btnSave">Speichern</button>
			</center>
		</form>
	</aside>
</body>

</html>