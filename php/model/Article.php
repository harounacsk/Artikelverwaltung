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
  

  


  /**
   * Get the value of name
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Set the value of name
   */
  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of price
   */
  public function getPrice(): float
  {
    return $this->price;
  }

  /**
   * Set the value of price
   */
  public function setPrice(float $price): self
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get the value of depotId
   */
  public function getDepotId(): int
  {
    return $this->depotId;
  }

  /**
   * Set the value of depotId
   */
  public function setDepotId(int $depotId): self
  {
    $this->depotId = $depotId;

    return $this;
  }

  /**
   * Get the value of back_up
   */
  public function isBackup(): bool
  {
    return $this->backup;
  }

  /**
   * Set the value of back_up
   */
  public function setBackup(bool $backup): self
  {
    $this->backup = $backup;

    return $this;
  }

  /**
   * Get the value of articleNumber
   */
  public function getArticleNumber(): int
  {
    return $this->articleNumber;
  }

  /**
   * Set the value of articleNumber
   */
  public function setArticleNumber(int $articleNumber): self
  {
    $this->articleNumber = $articleNumber;

    return $this;
  }

  /**
   * Get the value of ean
   */
  public function getEan(): string
  {
    return $this->ean;
  }

  /**
   * Set the value of ean
   */
  public function setEan(string $ean): self
  {
    $this->ean = $ean;

    return $this;
  }

  /**
   * Get the value of bemernoticekung
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

  /**
   * Get the value of userId
   */
  public function getUserId(): int
  {
    return $this->userId;
  }

  /**
   * Set the value of user_id
   */
  public function setUserId(int $userId): self
  {
    $this->userId = $userId;

    return $this;
  }
}