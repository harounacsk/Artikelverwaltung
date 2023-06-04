<?php

class ArticleSupplierController extends Database
{

	public function getData(ArticleSupplier $articleSupplier)
	{
		return [
			"supplierId" =>  $articleSupplier->getSupplierId(),
			"articleId"   =>  $articleSupplier->getArticleId(),
			"priceNet"  =>  $articleSupplier->getPriceNet(),
			"tax"       =>  $articleSupplier->getTax()
		];
	}

	public	function update(ArticleSupplier $articleSupplier, $article_supplier_id)
	{
		$data = $this->getData($articleSupplier);
		$sql = " UPDATE article_supplier SET supplier_id=?, article_id=?, price_net=?, tax=?	WHERE article_supplier_id=?";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("iiddi", $data["supplierId"], $data["articleId"], $data["priceNet"], $data["tax"], $article_supplier_id);
		return $stmt->execute();
	}

	public function insert(ArticleSupplier $articleSupplier)
	{
		$data = $this->getData($articleSupplier);
		$sql = "INSERT INTO article_supplier(supplier_id,article_id,price_net,tax) VALUES(?,?,?,?)";

		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("iidd",  $data["supplierId"], $data["articleId"], $data["priceNet"], $data["tax"]);
		return $stmt->execute();
	}


	public function getArticleSupplierById($article_supplier_id)
	{
		$sql = " SELECT * FROM article_supplier WHERE article_supplier_id=?";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("i", $article_supplier_id);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_array();
	}


	public function getArticlePrice($article_id)
	{
		$sql = "SELECT article_supplier.article_supplier_id, article_supplier.article_id,supplier.name, article_supplier.price_net,
		cast((article_supplier.price_net*(1+article_supplier.tax)) As decimal(8,2)) As price_brutto FROM article_supplier
		INNER JOIN supplier ON article_supplier.supplier_id=supplier.supplier_id WHERE article_supplier.article_id=? ";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("i", $article_id);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}


	public function fetchAllSupplier()
	{
		return $this->select("supplier");
	}
}
