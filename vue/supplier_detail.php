<!DOCTYPE html>
<html lang="de">

<head>
	<title>Lieferant Seite</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/fontawesome.min.css">
	<link rel="stylesheet" href="../css/w3.css">

	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/inputform.css">
	<script type="text/javascript" src="../js/reset_form.js" defer></script>
	<script type="text/javascript" src="../js/supplier.js" defer></script>
	<script src="../js/dist/sweetalert2.all.min.js"></script>

</head>

<body>

	<?php
	require_once "nav.php";
	require_once "../php/model/Supplier.php";
	require_once "../php/controller/SupplierController.php";

	$supplierController = new SupplierController();
	$row =[];
	if (!empty($_GET["_supplier_id"])) :
		$supplier_id = trim($_GET["_supplier_id"]);
		$row =(!empty($supplierController->getSupplierById($supplier_id)))? $supplierController->getSupplierById($supplier_id) : [];
	endif;	
	$supplierController->dbClose(); 
	?>
	<aside id="asd">
		<div id="divform" class="w3-container">
			<center>
				<h4>Lieferanten einfügen </h4>
			</center>
		</div>
		<form class="w3-container" method="Post">
			<label><i>Name :</i><span class="rot">* </span></label>
			<input class="w3-input" type="text" id="name" name="name" value="<?= (!empty($row["name"]))? $row["name"]: ""; ?>" required>
			<label><i>Strasse :</i><span class="rot">* </span></label>
			<input class="w3-input" type="text" id="street" name=" street" value="<?=(!empty($row["street"]))? $row["street"]: ""; ?>" required>
			<label><i>Ort :</i><span class="rot">* </span></label>
			<input class="w3-input" type="text" id="city" name="city" value="<?= (!empty($row["city"]))? $row["city"]: ""; ?>" required>
			<label><i>PLZ :</i><span class="rot">*</span></label>
			<input class="w3-input" class="w3-input" id="code" type="text" name="code" value="<?=(!empty($row["code"]))? $row["code"]: ""; ?>" required>
			<label><i>Tel :</i><span class="rot">*</span></label>
			<input class="w3-input" type="text" id="tel" name="tel" value="<?=(!empty($row["tel"]))? $row["tel"]: ""; ?>" required>
			<label><i>Fax :</i><span class="rot">*</span></label>
			<input class="w3-input" type="text" id="fax" name="fax" value="<?=(!empty($row["fax"]))? $row["fax"]: ""; ?>" required>
			<label><i>Email :</i><span class="rot">*</span></label>
			<input class="w3-input" type="email" id="mail" name="mail" value="<?=(!empty($row["mail"]))? $row["mail"]: ""; ?>" required>

			<input type="hidden" name="supplier_id" value="<?= (!empty($row["supplier_id"])) ? $row["supplier_id"] : "" ?>" required redonly>
			<p />
			<center>
				<button class="w3-btn" type="submit" name="btnSave">Speichern</button>
			</center>

		</form>
	</aside>
</body>

</html>