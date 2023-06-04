<?php
require_once "../controller/Database.php";
require_once "../model/Stock.php";
require_once "../controller/StockController.php";

if (!empty($_POST["article_id"])) {
	$stockController = new StockController();
	$stock = new Stock();
	$msg= "error";

	$articleName = $_POST["name"];
	$stock->setArticleId(intval($_POST["article_id"]))->setQuantity(intval(trim($_POST["quantity"])))->setNotice(trim($_POST["notice"]));
	if ($stockController->insert($stock) === true){
		$msg="success";
	}

	echo json_encode(["msg" => $msg]);
	$stockController->dbClose();
}

?>