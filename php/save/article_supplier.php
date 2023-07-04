<?php
require_once "../controller/Database.php";
require_once "../model/ArticleSupplier.php";
require_once "../controller/ArticleSupplierController.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


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
		} catch (mysqli_sql_exception $e) {
			if($e->getCode()==1062)
				$msg="error_duplicata";
			else
				$msg = "error";
		}
	} else {
		try {
			$articleSupplierController->insert($articleSupplier);
			$msg = "added";
		} catch (mysqli_sql_exception $e) {
			if($e->getCode()==1062)
				$msg="error_duplicata";
			else
				$msg = "error";		}
	}

	echo json_encode(["msg" => $msg]);
	$articleSupplierController->dbClose();
}
