<?php


class Stock  
{
	private int $article_id;
	private int $quantity;
	private string $notice;

	


	/**
	 * Get the value of article_id
	 */
	public function getArticleId(): int
	{
		return $this->article_id;
	}

	/**
	 * Set the value of article_id
	 */
	public function setArticleId(int $article_id): self
	{
		$this->article_id = $article_id;

		return $this;
	}

	/**
	 * Get the value of quantity
	 */
	public function getQuantity(): int
	{
		return $this->quantity;
	}

	/**
	 * Set the value of quantity
	 */
	public function setQuantity(int $quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}

	/**
	 * Get the value of notice
	 */
	public function getNotice(): string
	{
		return $this->notice;
	}

	/**
	 * Set the value of notice
	 */
	public function setNotice(string $notice): self
	{
		$this->notice = $notice;

		return $this;
	}
}