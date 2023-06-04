<?php

class StockController extends Database{
	public function insert(Stock $stock)
	{
		$data = $this->getData($stock);
	
		$sql = "INSERT INTO stock(article_id,quantity,notice) VALUES(?,?,?)";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("iis", $data["articleId"], $data["quantity"], $data["notice"]);
		return $stmt->execute();
	}
	
	public function getArticleByEan($ean)
	{
		$sql = "SELECT * FROM article WHERE ean=? LIMIT 1";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("s", $ean);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_array();
	}
	
	private function getData(Stock $stock){
		return [
			"articleId" => $stock->getArticleId(),
			"quantity" => $stock->getQuantity(),
			"notice" => $stock->getNotice()
		];
	} 
}

