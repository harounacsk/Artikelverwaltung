<?php


class Stock  
{
	private int $article_id;
	private int $quantity;
	private string $notice;

	
	public function getArticleId(): int
	{
		return $this->article_id;
	}

	
	public function setArticleId(int $article_id): self
	{
		$this->article_id = $article_id;

		return $this;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	public function setQuantity(int $quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}

	public function getNotice(): string
	{
		return $this->notice;
	}

	public function setNotice(string $notice): self
	{
		$this->notice = $notice;

		return $this;
	}
}