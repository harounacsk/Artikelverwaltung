<?php


class ArticleSupplier  
{

	private int $supplierId;
	private int $articleId;
	private float $priceNet;
	private float $tax;
	

	

	/**
	 * Get the value of supplierId
	 */
	public function getSupplierId(): int
	{
		return $this->supplierId;
	}

	/**
	 * Set the value of supplierId
	 */
	public function setSupplierId(int $supplierId): self
	{
		$this->supplierId = $supplierId;

		return $this;
	}

	/**
	 * Get the value of articleId
	 */
	public function getArticleId(): int
	{
		return $this->articleId;
	}

	/**
	 * Set the value of articleId
	 */
	public function setArticleId(int $articleId): self
	{
		$this->articleId = $articleId;

		return $this;
	}

	/**
	 * Get the value of priceNet
	 */
	public function getPriceNet(): float
	{
		return $this->priceNet;
	}

	/**
	 * Set the value of priceNet
	 */
	public function setPriceNet(float $priceNet): self
	{
		$this->priceNet = $priceNet;

		return $this;
	}

	/**
	 * Get the value of tax
	 */
	public function getTax(): float
	{
		return $this->tax;
	}

	/**
	 * Set the value of tax
	 */
	public function setTax(float $tax): self
	{
		$this->tax = $tax;

		return $this;
	}
}
