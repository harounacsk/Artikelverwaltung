<?php
require_once "../controller/Database.php";
require_once "../model/Article.php";
require_once "../controller/ArticleController.php";


if (!empty($_POST)) {

	$articleController = new ArticleController();
	$article = new Article();
	$msg = "error";

	$article->setName(trim($_POST["name"]))->setPrice(trim($_POST["price"]))
		->setDepotId(intval($_POST["depot_id"]))->setBackup($_POST["backup"])->setUserId(intval($_POST["user_id"]))
		->setArticleNumber(intval($_POST["article_number"]))->setEan($_POST["ean"])->setNotice($_POST["notice"]);

	if (!empty(trim($_POST["article_id"]))) {
		if ($articleController->update($article, trim($_POST["article_id"])) === true)
			$msg ="updated";
	} else {
		if ($articleController->insert($article) === true)
		$msg = "added";
	}
	echo json_encode(["msg"=>$msg]);
	$articleController->dbClose();
}
?>
