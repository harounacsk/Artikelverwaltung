<?php


class Article 
{
  private string $name;
  private float $price;
  private int $depotId;
  private bool $backup;
  private int $articleNumber;
  private string $ean;
  private string $notice;
  private int $userId;
  

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  public function setPrice(float $price): self
  {
    $this->price = $price;

    return $this;
  }

  public function getDepotId(): int
  {
    return $this->depotId;
  }
  public function setDepotId(int $depotId): self
  {
    $this->depotId = $depotId;

    return $this;
  }

  public function isBackup(): bool
  {
    return $this->backup;
  }

  public function setBackup(bool $backup): self
  {
    $this->backup = $backup;

    return $this;
  }

  public function getArticleNumber(): int
  {
    return $this->articleNumber;
  }

  public function setArticleNumber(int $articleNumber): self
  {
    $this->articleNumber = $articleNumber;

    return $this;
  }

  public function getEan(): string
  {
    return $this->ean;
  }

  public function setEan(string $ean): self
  {
    $this->ean = $ean;

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

  public function getUserId(): int
  {
    return $this->userId;
  }

  public function setUserId(int $userId): self
  {
    $this->userId = $userId;

    return $this;
  }
}