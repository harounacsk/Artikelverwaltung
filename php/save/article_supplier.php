<?php
require_once "../controller/Database.php";
require_once "../model/ArticleSupplier.php";
require_once "../controller/ArticleSupplierController.php";


if (!empty($_POST)) {

	$articleSupplier = new ArticleSupplier();
	$articleSupplierController = new ArticleSupplierController();
	$msg = "";

	$articleSupplier->setArticleId(intval(trim($_POST['article_id'])))->setSupplierId(intval(trim($_POST["supplier_id"])))
		->setPriceNet(floatval((trim($_POST["price_net"]))))->setTax(floatval(trim($_POST["tax"])));

	if (!empty(trim($_POST["article_supplier_id"]))) {
		try {
			$articleSupplierController->update($articleSupplier, trim($_POST["article_supplier_id"]));
			$msg = "updated";
		} catch (Exception $e) {
			$msg = "error";
		}
	} else {
		try {
			$articleSupplierController->insert($articleSupplier);
			$msg = "added";
		} catch (Exception $e) {
			$msg = "error";
		}
	}

	echo json_encode(["msg" => $msg]);
	$articleSupplierController->dbClose();
}
