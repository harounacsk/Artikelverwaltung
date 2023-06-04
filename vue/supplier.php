<!DOCTYPE html>
<html lang="de">

<head>
	<title>Lieferenten</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/suchform.css">
	<link rel="stylesheet" type="text/css" href="../css/resp_table.css">

</head>

<body>
	<?php
	require_once "nav.php";
	require_once "../php/model/Supplier.php";
	require_once "../php/controller/SupplierController.php";?>
	<aside class="aside_width">
		<br>
		<center>
			<form method="get" action="">
				<i>Suche:</i><input type="text" list="lieferanten" name="_suche_lieferant" placeholder="Lieferanten eingeben" required />
				<button class="w3-btn " type="submit" name="btnean"><i><img class="search" src="../img/search.png"></i></button>

				<datalist id="lieferanten">
					<?php
					$supplierController = new SupplierController();
					$suppliers = $supplierController->fetchAllSupplier();
					if (!empty($suppliers)) :
						foreach ($suppliers as $supplier) :
							echo '<option value="' . $supplier["name"] . '">';
						endforeach;
					endif;

					?>
				</datalist>
			</form>
		</center>

		<center>
			<a class="link" href="supplier_detail.php">Neuen Lieferanten einfügen</a>
		</center>

		<?php

		$supplierName = "";
		if (!empty($_GET["_suche_lieferant"])) :
			$supplierName = trim($_GET["_suche_lieferant"]);
		endif;

		if (!empty($supplierName)) :
			if (!empty($rows = $supplierController->getSupplierByName($supplierName))) : ?>
				<h4 align="right"><i>Lieferantenliste</i></h4>
				<center>
					<table>
						<thead>
							<tr>
								<th>lieferant-Nummer</th>
								<th>lieferant-Name</th>
								<th>Bearbeiten</th>
							</tr>
						</thead>
						<?php foreach ($rows as $row) : ?>
							<tr>
								<td data-label="lieferant Nummer"><?= $row['supplier_id'] ?></td>
								<td data-label="lieferant name"><?= $row['name'] ?></td>
								<td data-label="Bearbeiten"><a href="<?= " supplier_detail.php?_supplier_id=" . $row['supplier_id'] ?>"><img class="img_icon" src="../img/modify.png" alt="" srcset=""></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</center>
			<?php else : ?>
				<br>
				<center>
					<h4>
						<font color="#051e4e"><i>Der Lieferant: <span><b><font color="red"><?= $supplierName ?></font></b></span> ist leider nicht vorhanden. </i></font>
					</h4>
				</center>
		<?php
			endif;
		endif;
		$supplierController->dbClose();
		?>
	</aside>
</body>

</html>