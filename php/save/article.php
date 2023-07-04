<?php

require_once "../controller/Database.php";
require_once "../model/Article.php";
require_once "../controller/ArticleController.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


if (!empty($_POST)) {

	$articleController = new ArticleController();
	$article = new Article();
	$msg = "";

	$article->setName(trim($_POST["name"]))->setPrice(trim($_POST["price"]))
		->setDepotId(intval($_POST["depot_id"]))->setBackup($_POST["backup"])->setUserId(intval($_POST["user_id"]))
		->setArticleNumber(intval($_POST["article_number"]))->setEan($_POST["ean"])->setNotice($_POST["notice"]);

	if (!empty(trim($_POST["article_id"]))) {
		try {
			$articleController->update($article, trim($_POST["article_id"]));
			$msg ="updated";
		} catch (mysqli_sql_exception $e) {
			if($e->getCode()==1062)
				$msg = "error_duplicata";
			else
				$msg = "error";
		}
	} else {
		try {
			$articleController->insert($article);
			$msg = "added";
		} catch (mysqli_sql_exception $e) {
			if($e->getCode()==1062)
				$msg = "error_duplicata";
			else
				$msg = "error";

		}
	}
	echo json_encode(["msg"=>$msg]);
	$articleController->dbClose();
}
?>
