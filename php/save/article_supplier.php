<?php
require_once "../controller/Database.php";
require_once "../model/ArticleSupplier.php";
require_once "../controller/ArticleSupplierController.php";

/**
 * Die POST-Daten kommen aus der Seite : seite/artikel_lieferanten.php 
 */
if(!empty($_POST)){
	
	$articleSupplier = new ArticleSupplier();
	$articleSupplierController = new ArticleSupplierController();
	$msg = "Es ist ein Fehler aufgetreten .";

	$articleSupplier->setArticleId(intval(trim($_POST['article_id'])))->setSupplierId(intval(trim($_POST["supplier_id"])))
	->setPriceNet(floatval((trim($_POST["price_net"]))))->setTax(floatval(trim($_POST["tax"])));

	if(!empty(trim($_POST["article_supplier_id"]))){
		if($articleSupplierController->update($articleSupplier, trim($_POST["article_supplier_id"])) === true)
			$msg = "updated";
	}
	else{
		if($articleSupplierController->insert($articleSupplier) === true)
			$msg = "added";		
	}
	echo json_encode(["msg"=>$msg]);
	$articleSupplierController->dbClose();
}

?>