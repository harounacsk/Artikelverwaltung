<?php


class ArticleSupplier  
{

	private int $supplierId;
	private int $articleId;
	private float $priceNet;
	private float $tax;
	
	

	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	public function setSupplierId(int $supplierId): self
	{
		$this->supplierId = $supplierId;

		return $this;
	}

	public function getArticleId(): int
	{
		return $this->articleId;
	}

	public function setArticleId(int $articleId): self
	{
		$this->articleId = $articleId;

		return $this;
	}

	public function getPriceNet(): float
	{
		return $this->priceNet;
	}


	public function setPriceNet(float $priceNet): self
	{
		$this->priceNet = $priceNet;

		return $this;
	}

	public function getTax(): float
	{
		return $this->tax;
	}

	public function setTax(float $tax): self
	{
		$this->tax = $tax;

		return $this;
	}
}
